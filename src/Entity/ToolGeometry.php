<?php

namespace App\Entity;

use App\Repository\ToolGeometryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ToolGeometryRepository::class)]
class ToolGeometry
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $flutesNumber = null;

    #[ORM\Column]
    private ?int $diameter = null;

    #[ORM\ManyToOne(inversedBy: 'toolGeometries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?toolType $toolType = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFlutesNumber(): ?int
    {
        return $this->flutesNumber;
    }

    public function setFlutesNumber(int $flutesNumber): static
    {
        $this->flutesNumber = $flutesNumber;

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

    public function getToolType(): ?toolType
    {
        return $this->toolType;
    }

    public function setToolType(?toolType $toolType): static
    {
        $this->toolType = $toolType;

        return $this;
    }
}
