<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: 'got_character', schema: 'gotreviews')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name:"firtsName", length: 255)]
    private ?string $firtsName = null;

    #[ORM\Column(name:"code")]
    private ?int $code = null;

    #[ORM\Column(name:"lastName",length: 255)]
    private ?string $lastName = null;

    #[ORM\Column( name:"fullName",length: 255)]
    private ?string $fullName = null;

    #[ORM\Column(name:"title",length: 255)]
    private ?string $title = null;

    #[ORM\Column(name:"family",length: 255)]
    private ?string $family = null;

    #[ORM\Column(name:"image",length: 255)]
    private ?string $image = null;

    #[ORM\Column(name:"imageUrl",length: 500)]
    private ?string $imageUrl = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirtsName(): ?string
    {
        return $this->firtsName;
    }

    public function setFirtsName(string $firtsName): static
    {
        $this->firtsName = $firtsName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): static
    {
        $this->fullName = $fullName;

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

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(string $family): static
    {
        $this->family = $family;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(?int $code): void
    {
        $this->code = $code;
    }



}
