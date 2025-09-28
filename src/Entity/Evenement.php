<?php
 
namespace App\Entity;
 
use App\Repository\EvenementRepository;
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

}