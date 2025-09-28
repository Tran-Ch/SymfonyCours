<?php

namespace App\Entity;

use App\Repository\WishlistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WishlistRepository::class)]
class Wishlist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $utilisateurId = null;

    #[ORM\Column]
    private ?int $evenementId = null;

    public function getUtilisateurId(): ?int
    {
        return $this->utilisateurId;
    }

    public function setUtilisateurId(int $utilisateurId): static
    {
        $this->utilisateurId = $utilisateurId;

        return $this;
    }

    public function getEvenementId(): ?int
    {
        return $this->evenementId;
    }

    public function setEvenementId(int $evenementId): static
    {
        $this->evenementId = $evenementId;

        return $this;
    }
}
