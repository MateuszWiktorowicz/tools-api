<?php

namespace App\Entity;

use App\Repository\CoatingPriceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoatingPriceRepository::class)]
class CoatingPrice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Coating $coating = null;

    #[ORM\Column]
    private ?int $diameter = null;

    #[ORM\Column]
    private ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoating(): ?Coating
    {
        return $this->coating;
    }

    public function setCoating(?Coating $coating): static
    {
        $this->coating = $coating;

        return $this;
    }

    public function getDiameter(): ?int
    {
        return $this->diameter;
    }

    public function setDiameter(int $diameter): static
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }
}
