<?php

namespace App\Entity;

use App\Repository\ToolTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ToolTypeRepository::class)]
class ToolType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    /**
     * @var Collection<int, ToolGeometry>
     */
    #[ORM\OneToMany(targetEntity: ToolGeometry::class, mappedBy: 'toolType')]
    private Collection $toolGeometries;

    public function __construct()
    {
        $this->toolGeometries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, ToolGeometry>
     */
    public function getToolGeometries(): Collection
    {
        return $this->toolGeometries;
    }

    public function addToolGeometry(ToolGeometry $toolGeometry): static
    {
        if (!$this->toolGeometries->contains($toolGeometry)) {
            $this->toolGeometries->add($toolGeometry);
            $toolGeometry->setToolType($this);
        }

        return $this;
    }

    public function removeToolGeometry(ToolGeometry $toolGeometry): static
    {
        if ($this->toolGeometries->removeElement($toolGeometry)) {
            // set the owning side to null (unless already changed)
            if ($toolGeometry->getToolType() === $this) {
                $toolGeometry->setToolType(null);
            }
        }

        return $this;
    }
}
