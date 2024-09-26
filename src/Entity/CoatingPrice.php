<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CoatingPriceRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CoatingPriceRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['coating_price:read']]
)]
class CoatingPrice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'coatingPrices')]
    #[Groups(['coating_price:read'])]
    private ?CoatingType $coating = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['coating_price:read'])]
    private ?int $diameter = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['coating_price:read'])]
    private ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCoating(): ?CoatingType
    {
        return $this->coating;
    }

    public function setCoating(?CoatingType $coating): static
    {
        $this->coating = $coating;

        return $this;
    }

    public function getDiameter(): ?int
    {
        return $this->diameter;
    }

    public function setDiameter(?int $diameter): static
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): static
    {
        $this->price = $price;

        return $this;
    }
}
