<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MapRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MapRepository::class)]
#[ApiResource(operations: [])
]
class Map
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $gameId = null;

    #[ORM\OneToMany(targetEntity: WalkablePoint::class, mappedBy: 'map')]
    private Collection $walkablePoints;

    #[ORM\OneToMany(targetEntity: WalkableSegment::class, mappedBy: 'map')]
    private Collection $walkableSegments;

    #[ORM\Column(length: 255)]
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

    public function getGameId(): ?int
    {
        return $this->gameId;
    }

    public function setGameId(int $gameId): static
    {
        $this->gameId = $gameId;

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
    public function getWalkableSegments(): Collection
    {
        return $this->walkableSegments;
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
