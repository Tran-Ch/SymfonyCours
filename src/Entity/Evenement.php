<?php
 
namespace App\Entity;
 
use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
 
#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
 
    #[ORM\Column(length: 255)]
    private ?string $nom = null;
 
    #[ORM\Column]
    private ?\DateTime $dateDebut = null;
 
    #[ORM\Column]
    private ?\DateTime $dateFin = null;
 
    #[ORM\Column(length: 255)]
    private ?string $lieu = null;
 
    #[ORM\Column(length: 255)]
    private ?string $categorie = null;
 
    #[ORM\Column]
    private ?float $prix = null;
 
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'evenement')]
    private Collection $reservations;

    /**
     * @var Collection<int, Story>
     */
    #[ORM\ManyToMany(targetEntity: Story::class, mappedBy: 'evenements')]
    private Collection $stories;

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\ManyToMany(targetEntity: Utilisateur::class, mappedBy: 'evenements')]
    private Collection $utilisateurs;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->stories = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
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
 
    public function getNom(): ?string
    {
        return $this->nom;
    }
 
    public function setNom(string $nom): static
    {
        $this->nom = $nom;
 
        return $this;
    }
 
    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }
 
    public function setDateDebut(\DateTime $dateDebut): static
    {
        $this->dateDebut = $dateDebut;
 
        return $this;
    }
 
    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }
 
    public function setDateFin(\DateTime $dateFin): static
    {
        $this->dateFin = $dateFin;
 
        return $this;
    }
 
    public function getLieu(): ?string
    {
        return $this->lieu;
    }
 
    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;
 
        return $this;
    }
 
    public function getCategorie(): ?string
    {
        return $this->categorie;
    }
 
    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;
 
        return $this;
    }
 
    public function getPrix(): ?float
    {
        return $this->prix;
    }
 
    public function setPrix(?float $prix): static
    {
        $this->prix = $prix;
 
        return $this;
    }
 
    public function getImage(): ?string
    {
        return $this->image;
    }
 
    public function setImage(?string $image): static
    {
        $this->image = $image;
 
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
            $reservation->setEvenement($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getEvenement() === $this) {
                $reservation->setEvenement(null);
            }
        }

        return $this;
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
            $story->addEvenement($this);
        }

        return $this;
    }

    public function removeStory(Story $story): static
    {
        if ($this->stories->removeElement($story)) {
            $story->removeEvenement($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->addEvenement($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): static
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            $utilisateur->removeEvenement($this);
        }

        return $this;
    }

 

}