<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CoatingTypeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CoatingTypeRepository::class)]
#[ApiResource]
class CoatingType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['coating_price:read'])]
    private ?string $coating_composition = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['coating_price:read'])]
    private ?string $mastermet_name = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Groups(['coating_price:read'])]
    private ?string $mastermet_code = null;

    /**
     * @var Collection<int, CoatingPrice>
     */
    #[ORM\OneToMany(targetEntity: CoatingPrice::class, mappedBy: 'coating')]
    private Collection $coatingPrices;

    public function __construct()
    {
        $this->coatingPrices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCoatingComposition(): ?string
    {
        return $this->coating_composition;
    }

    public function setCoatingComposition(?string $coating_composition): static
    {
        $this->coating_composition = $coating_composition;

        return $this;
    }

    public function getMastermetName(): ?string
    {
        return $this->mastermet_name;
    }

    public function setMastermetName(?string $mastermet_name): static
    {
        $this->mastermet_name = $mastermet_name;

        return $this;
    }

    public function getMastermetCode(): ?string
    {
        return $this->mastermet_code;
    }

    public function setMastermetCode(?string $mastermet_code): static
    {
        $this->mastermet_code = $mastermet_code;

        return $this;
    }

    /**
     * @return Collection<int, CoatingPrice>
     */
    public function getCoatingPrices(): Collection
    {
        return $this->coatingPrices;
    }

    public function addCoatingPrice(CoatingPrice $coatingPrice): static
    {
        if (!$this->coatingPrices->contains($coatingPrice)) {
            $this->coatingPrices->add($coatingPrice);
            $coatingPrice->setCoating($this);
        }

        return $this;
    }

    public function removeCoatingPrice(CoatingPrice $coatingPrice): static
    {
        if ($this->coatingPrices->removeElement($coatingPrice)) {
            // set the owning side to null (unless already changed)
            if ($coatingPrice->getCoating() === $this) {
                $coatingPrice->setCoating(null);
            }
        }

        return $this;
    }
}
