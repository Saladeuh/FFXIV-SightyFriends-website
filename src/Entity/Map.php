<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\MapRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: MapRepository::class)]
#[ApiResource(operations: [new Get(), new GetCollection()],
    normalizationContext: ['groups' => ['read']])]
class Map
{
    #[ORM\Id]
    #[ORM\Column]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[Groups(['read'])]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: WalkablePoint::class, mappedBy: 'map')]
    private Collection $walkablePoints;

    #[ORM\OneToMany(targetEntity: WalkableSegment::class, mappedBy: 'map')]
    #[Groups(['read'])]
    private Collection $walkableSegments;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $placeName = null;

    public function __construct()
    {
        $this->walkablePoints = new ArrayCollection();
        $this->walkableSegments = new ArrayCollection();
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

    /**
     * @return Collection<int, WalkablePoint>
     */
    public function getWalkablePoints(): Collection
    {
        return $this->walkablePoints;
    }

    public function addWalkable(WalkablePoint $walkable): static
    {
        if (!$this->walkablePoints->contains($walkable)) {
            $this->walkablePoints->add($walkable);
            $walkable->setMap($this);
        }

        return $this;
    }

    public function removeWalkable(WalkablePoint $walkable): static
    {
        if ($this->walkablePoints->removeElement($walkable)) {
            // set the owning side to null (unless already changed)
            if ($walkable->getMap() === $this) {
                $walkable->setMap(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, WalkableSegment>
     */
    public function getWalkableSegments(): array
    {
        return $this->walkableSegments->getValues();
    }

    public function addWalkableSegment(WalkableSegment $walkableSegment): static
    {
        if (!$this->walkableSegments->contains($walkableSegment)) {
            $this->walkableSegments->add($walkableSegment);
            $walkableSegment->setMap($this);
        }

        return $this;
    }

    public function removeWalkableSegment(WalkableSegment $walkableSegment): static
    {
        if ($this->walkableSegments->removeElement($walkableSegment)) {
            // set the owning side to null (unless already changed)
            if ($walkableSegment->getMap() === $this) {
                $walkableSegment->setMap(null);
            }
        }

        return $this;
    }

    public function getPlaceName(): ?string
    {
        return $this->placeName;
    }

    public function setPlaceName(string $placeName): static
    {
        $this->placeName = $placeName;

        return $this;
    }
}
