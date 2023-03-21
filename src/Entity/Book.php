<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("music:read")]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    #[Groups("music:read")]
    private ?string $title = null;


    #[ORM\Column(length: 255)]
    #[Groups("music:read")]
    private ?string $author = null;


    #[ORM\Column]
    #[Groups("music:read")]
    private ?int $isbn = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups("music:read")]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups("music:read")]
    private ?Box $box = null;

    #[ORM\Column]
    #[Groups("music:read")]
    private ?bool $isAvailable = null;


    #[ORM\Column(length: 255)]
    #[Groups("music:read")]
    private ?string $cover = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups("music:read")]
    private ?string $resume = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function setIsbn(int $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getBox(): ?Box
    {
        return $this->box;
    }

    public function setBox(?Box $box): self
    {
        $this->box = $box;

        return $this;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }
}