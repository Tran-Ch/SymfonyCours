<?php

namespace App\Entity;

use App\Repository\StoryLikeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StoryLikeRepository::class)]
class StoryLike
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'storyLikes')]
    private ?story $story = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStory(): ?story
    {
        return $this->story;
    }

    public function setStory(?story $story): static
    {
        $this->story = $story;

        return $this;
    }
}
