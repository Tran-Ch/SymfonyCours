<?php

namespace App\Entity;

use App\Repository\StoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Evenement;
use App\Entity\Utilisateur;
use App\Entity\Comment;
use App\Entity\StoryLike;

#[ORM\Entity(repositoryClass: StoryRepository::class)]
class Story
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Le contenu ne peut pas être vide')]
    #[Assert\Length(
        min: 10,
        max: 5000,
        minMessage: 'Le contenu doit faire au moins {{ limit }} caractères',
        maxMessage: 'Le contenu ne peut pas dépasser {{ limit }} caractères'
    )]
    private ?string $contenu = null;

    /**
     * @var Collection<int, Evenement>
     */
    #[ORM\ManyToMany(targetEntity: Evenement::class, inversedBy: 'stories')]
    private Collection $evenements;

    #[ORM\ManyToOne(inversedBy: 'stories')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    #[Assert\NotNull(message: 'Un auteur doit être sélectionné', groups: ['anonymous'])]
    private ?Utilisateur $utilisateur = null;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(mappedBy: 'story', targetEntity: Comment::class, orphanRemoval: true)]
    private Collection $comments;

    /**
     * @var Collection<int, StoryLike>
     */
    #[ORM\OneToMany(mappedBy: 'story', targetEntity: StoryLike::class, orphanRemoval: true)]
    private Collection $likes;

    // === Story public / privé ===
    #[ORM\Column(type: 'boolean')]
    private bool $isPublic = true;

    // === NOUVEAU: image de la story ===
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
        $this->comments   = new ArrayCollection();
        $this->likes      = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;
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

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;
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
            $comment->setStory($this);
        }
        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            if ($comment->getStory() === $this) {
                $comment->setStory(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, StoryLike>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(StoryLike $like): static
    {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->setStory($this);
        }
        return $this;
    }

    public function removeLike(StoryLike $like): static
    {
        if ($this->likes->removeElement($like)) {
            if ($like->getStory() === $this) {
                $like->setStory(null);
            }
        }
        return $this;
    }

    public function getLikesCount(): int
    {
        return $this->likes->count();
    }

    public function isLikedByUser(?Utilisateur $user): bool
    {
        if (!$user) {
            return false;
        }
        foreach ($this->likes as $like) {
            if ($like->getUtilisateur() === $user) {
                return true;
            }
        }
        return false;
    }

    public function isPublic(): bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): static
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    // === GET/SET image ===
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;
        return $this;
    }
}
