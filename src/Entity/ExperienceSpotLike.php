<?php

namespace App\Entity;

use App\Repository\ExperienceSpotLikeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienceSpotLikeRepository::class)]
class ExperienceSpotLike
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?ExperienceSpot $spot = null;

    #[ORM\ManyToOne(inversedBy: 'experienceSpotLikes')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpot(): ?ExperienceSpot
    {
        return $this->spot;
    }

    public function setSpot(?ExperienceSpot $spot): static
    {
        $this->spot = $spot;

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
}
