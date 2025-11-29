<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    // Tên hiển thị mà user chọn
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Story>
     */
    #[ORM\OneToMany(targetEntity: Story::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $stories;

    /**
     * @var Collection<int, Evenement>
     */
    #[ORM\ManyToMany(targetEntity: Evenement::class, inversedBy: 'utilisateurs')]
    private Collection $evenements;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'utilisateur')]
    private Collection $comments;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'utilisateur')]
    private Collection $reservations;

    /**
     * @var Collection<int, ExperienceSpotLike>
     */
    #[ORM\OneToMany(
        targetEntity: ExperienceSpotLike::class,
        mappedBy: 'utilisateur'
    )]
    private Collection $experienceSpotLikes;

    public function __construct()
    {
        $this->stories             = new ArrayCollection();
        $this->evenements          = new ArrayCollection();
        $this->comments            = new ArrayCollection();
        $this->reservations        = new ArrayCollection();
        $this->experienceSpotLikes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        // Dùng email để login
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        // đảm bảo user nào cũng có ít nhất ROLE_USER
        if (!\in_array('ROLE_USER', $roles, true)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        // Trả về đúng hash trong DB
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        // $password đã là dạng hash (do RegistrationController hash)
        $this->password = $password;

        return $this;
    }

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
    public function __serialize(): array
    {
        $data = (array) $this;

        if ($this->password !== null) {
            $data["\0".self::class."\0password"] = hash('crc32c', $this->password);
        }

        return $data;
    }

    public function eraseCredentials(): void
    {
        // Nếu có field $plainPassword thì clear ở đây
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Alias cho compat với Twig cũ dùng "prenom"
     */
    public function getPrenom(): ?string
    {
        return $this->nom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->nom = $prenom;
        return $this;
    }

    /**
     * Tên hiển thị ưu tiên: nom (tên người dùng) -> email -> 'Utilisateur'
     */
    public function getDisplayName(): string
    {
        if ($this->nom !== null && trim($this->nom) !== '') {
            return $this->nom;
        }

        if ($this->email !== null && trim($this->email) !== '') {
            return $this->email;
        }

        return 'Utilisateur';
    }

    /**
     * @return Collection<int, Story>
     */
    public function getStories(): Collection
    {
        return $this->stories;
    }

    public function addStory(Story $story): static
    {
        if (!$this->stories->contains($story)) {
            $this->stories->add($story);
            $story->setUtilisateur($this);
        }

        return $this;
    }

    public function removeStory(Story $story): static
    {
        if ($this->stories->removeElement($story)) {
            if ($story->getUtilisateur() === $this) {
                $story->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): static
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements->add($evenement);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): static
    {
        $this->evenements->removeElement($evenement);

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setUtilisateur($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            if ($comment->getUtilisateur() === $this) {
                $comment->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setUtilisateur($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            if ($reservation->getUtilisateur() === $this) {
                $reservation->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ExperienceSpotLike>
     */
    public function getExperienceSpotLikes(): Collection
    {
        return $this->experienceSpotLikes;
    }

    public function addExperienceSpotLike(ExperienceSpotLike $experienceSpotLike): static
    {
        if (!$this->experienceSpotLikes->contains($experienceSpotLike)) {
            $this->experienceSpotLikes->add($experienceSpotLike);
            $experienceSpotLike->setUtilisateur($this);
        }

        return $this;
    }

    public function removeExperienceSpotLike(ExperienceSpotLike $experienceSpotLike): static
    {
        if ($this->experienceSpotLikes->removeElement($experienceSpotLike)) {
            if ($experienceSpotLike->getUtilisateur() === $this) {
                $experienceSpotLike->setUtilisateur(null);
            }
        }

        return $this;
    }
}
