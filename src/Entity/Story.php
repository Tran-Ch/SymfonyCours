<?php

namespace App\Entity;

use App\Repository\StoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StoryRepository::class)]
class Story
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $auteurld = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    
    /**
     * @var Collection<int, Evenement>
     */
    #[ORM\ManyToMany(targetEntity: Evenement::class, inversedBy: 'stories')]
    private Collection $evenements;

    #[ORM\ManyToOne(inversedBy: 'stories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(mappedBy: 'story', targetEntity: Comment::class, orphanRemoval: true)]
    private Collection $comments;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    public function getAuteurld(): ?int
    {
        return $this->auteurld;
    }

    public function setAuteurld(int $auteurld): static
    {
        $this->auteurld = $auteurld;

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
            // set the owning side to null (unless already changed)
            if ($comment->getStory() === $this) {
                $comment->setStory(null);
            }
        }

        return $this;
    }
}
