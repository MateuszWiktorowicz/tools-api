<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ToolRepository;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ToolRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['tool:read']]
)]
class Tool
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['tool:read'])]
    private ?int $diameter = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['tool:read'])]
    private ?int $flutes_number = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['tool:read'])]
    private ?int $face_grinding_time_minutes = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['tool:read'])]
    private ?int $periphery_grinding_time_minutes_2D = null;

    #[ORM\ManyToOne(inversedBy: 'tools')]
    #[Groups(['tool:read'])]
    private ?ToolType $tool_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getFlutesNumber(): ?int
    {
        return $this->flutes_number;
    }

    public function setFlutesNumber(?int $flutes_number): static
    {
        $this->flutes_number = $flutes_number;

        return $this;
    }

    public function getFaceGrindingTimeMinutes(): ?int
    {
        return $this->face_grinding_time_minutes;
    }

    public function setFaceGrindingTimeMinutes(?int $face_grinding_time_minutes): static
    {
        $this->face_grinding_time_minutes = $face_grinding_time_minutes;

        return $this;
    }

    public function getPeripheryGrindingTimeMinutes2D(): ?int
    {
        return $this->periphery_grinding_time_minutes_2D;
    }

    public function setPeripheryGrindingTimeMinutes2D(?int $periphery_grinding_time_minutes_2D): static
    {
        $this->periphery_grinding_time_minutes_2D = $periphery_grinding_time_minutes_2D;

        return $this;
    }

    public function getToolType(): ?ToolType
    {
        return $this->tool_type;
    }

    public function setToolType(?ToolType $tool_type): static
    {
        $this->tool_type = $tool_type;

        return $this;
    }
}
