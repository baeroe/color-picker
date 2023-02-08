<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColorRepository::class)]
class Color
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $red = null;

    #[ORM\Column]
    private ?int $green = null;

    #[ORM\Column]
    private ?int $blue = null;

    #[ORM\Column(length: 10)]
    private ?string $hexcode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRed(): ?int
    {
        return $this->red;
    }

    public function setRed(int $red): self
    {
        $this->red = $red;

        return $this;
    }

    public function getGreen(): ?int
    {
        return $this->green;
    }

    public function setGreen(int $green): self
    {
        $this->green = $green;

        return $this;
    }

    public function getBlue(): ?int
    {
        return $this->blue;
    }

    public function setBlue(int $blue): self
    {
        $this->blue = $blue;

        return $this;
    }

    public function getHexcode(): ?string
    {
        return $this->hexcode;
    }

    public function setHexcode(string $hexcode): self
    {
        $this->hexcode = $hexcode;

        return $this;
    }
}
