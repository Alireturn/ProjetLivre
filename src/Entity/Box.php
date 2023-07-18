<?php

namespace App\Entity;

use App\Repository\BoxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BoxRepository::class)]
class Box
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("music:read")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("music:read")]
    private ?string $street = null;

    #[ORM\Column]
    #[Groups("music:read")]
    private ?int $zipcode = null;

    #[ORM\Column]
    #[Groups("music:read")]
    private ?int $city = null;

    #[ORM\Column(type: Types::ARRAY)]
    #[Groups("music:read")]
    private array $geo_loc = [];

    #[ORM\Column]
    #[Groups("music:read")]
    private ?int $capacity = null;

    #[ORM\OneToMany(mappedBy: 'box', targetEntity: Book::class)]
    private Collection $books;


    public function __toString(): string
    {
        return $this->street;
    }

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?int
    {
        return $this->city;
    }

    public function setCity(int $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getGeoLoc(): array
    {
        return $this->geo_loc;
    }

    public function setGeoLoc(array $geo_loc): self
    {
        $this->geo_loc = $geo_loc;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->setBox($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getBox() === $this) {
                $book->setBox(null);
            }
        }

        return $this;
    }
}