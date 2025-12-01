<?php

namespace App\Entity;

use App\Repository\ExperienceSpotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienceSpotRepository::class)]
class ExperienceSpot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Tiêu đề hiển thị trên card + trang chi tiết
    #[ORM\Column(length: 255)]
    private ?string $title = null;

    // slug dùng trên URL: ha-giang, sapa, ...
    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    // vùng: nord / centre / sud
    #[ORM\Column(length: 20)]
    private ?string $region = null;

    // loại trang: incroyable / culture / tourisme
    #[ORM\Column(length: 20)]
    private ?string $category = null;

    // Nội dung mô tả: dùng cho card (cắt ngắn) + trang chi tiết
    #[ORM\Column(type: 'text')]
    private ?string $shortDescription = null;

    // Tên file ảnh: hagiang.jpg, sapa.jpg, ...
    #[ORM\Column(length: 255)]
    private ?string $imageFilename = null;

    /**
     * @var Collection<int, ExperienceSpotLike>
     */
    #[ORM\OneToMany(
        mappedBy: 'spot',
        targetEntity: ExperienceSpotLike::class,
        orphanRemoval: true
    )]
    private Collection $likes;

    /**
     * @var Collection<int, ExperienceSpotComment>
     */
    #[ORM\OneToMany(
        mappedBy: 'spot',
        targetEntity: ExperienceSpotComment::class,
        orphanRemoval: true
    )]
    private Collection $comments;

    public function __construct()
    {
        $this->likes    = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;
        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;
        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): static
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    public function getImageFilename(): ?string
    {
        return $this->imageFilename;
    }

    public function setImageFilename(string $imageFilename): static
    {
        $this->imageFilename = $imageFilename;
        return $this;
    }

    /**
     * Đường dẫn ảnh đầy đủ cho Twig: {{ asset(spot.imagePath) }}
     * Giữ cây thư mục:
     *   public/Image/bac/
     *   public/Image/trung/
     *   public/Image/nam/
     */
    public function getImagePath(): string
    {
        $subDir = match ($this->region) {
            'nord'   => 'bac',
            'centre' => 'trung',
            'sud'    => 'nam',
            default  => 'bac',
        };

        return 'Image/' . $subDir . '/' . $this->imageFilename;
    }

    /**
     * @return Collection<int, ExperienceSpotLike>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(ExperienceSpotLike $like): static
    {
        if (!$this->likes->contains($$like)) {
            $this->likes->add($like);
            $like->setSpot($this);
        }

        return $this;
    }

    public function removeLike(ExperienceSpotLike $like): static
    {
        if ($this->likes->removeElement($like)) {
            if ($like->getSpot() === $this) {
                $like->setSpot(null);
            }
        }

        return $this;
    }

    // Đếm tổng số like
    public function getLikesCount(): int
    {
        return $this->likes->count();
    }

    // Kiểm tra 1 user đã like spot này chưa (dùng cho nút J’aime / Je n’aime plus)
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

    /**
     * @return Collection<int, ExperienceSpotComment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(ExperienceSpotComment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setSpot($this);
        }

        return $this;
    }

    public function removeComment(ExperienceSpotComment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            if ($comment->getSpot() === $this) {
                $comment->setSpot(null);
            }
        }

        return $this;
    }
}
