<?php

namespace App\Entity;

use App\Repository\PeripheryGrindingTime2dToolRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeripheryGrindingTime2dToolRepository::class)]
class PeripheryGrindingTime2dTool
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?ToolGeometry $toolGeometry = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToolGeometry(): ?ToolGeometry
    {
        return $this->toolGeometry;
    }

    public function setToolGeometry(ToolGeometry $toolGeometry): static
    {
        $this->toolGeometry = $toolGeometry;

        return $this;
    }
}
