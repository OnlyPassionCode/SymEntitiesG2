<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(options: [
        "unsigned" => true
    ])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $postDatePublished = null;

    #[ORM\Column(insertable: false, options: [
        "default" => false
    ])]
    private bool $postPublished = false;

    #[ORM\Column(length: 160)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $postText = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, insertable: false, options: [
        "default" => "CURRENT_TIMESTAMP"
    ])]
    private ?\DateTimeInterface $postDateCreated = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostDatePublished(): ?\DateTimeInterface
    {
        return $this->postDatePublished;
    }

    public function setPostDatePublished(?\DateTimeInterface $postDatePublished): static
    {
        $this->postDatePublished = $postDatePublished;

        return $this;
    }

    public function isPostPublished(): bool
    {
        return $this->postPublished;
    }

    public function setPostPublished(bool $postPublished): static
    {
        $this->postPublished = $postPublished;

        return $this;
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

    public function getPostText(): ?string
    {
        return $this->postText;
    }

    public function setPostText(string $postText): static
    {
        $this->postText = $postText;

        return $this;
    }

    public function getPostDateCreated(): ?\DateTimeInterface
    {
        return $this->postDateCreated;
    }

    public function setPostDateCreated(\DateTimeInterface $postDateCreated): static
    {
        $this->postDateCreated = $postDateCreated;

        return $this;
    }
}
