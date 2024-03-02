<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MapRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MapRepository::class)]
#[ApiResource]
class Map
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $gameId = null;

    #[ORM\OneToMany(targetEntity: Walkable::class, mappedBy: 'map')]
    private Collection $walkables;

    public function __construct()
    {
        $this->walkables = new ArrayCollection();
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
     * @return Collection<int, Walkable>
     */
    public function getWalkables(): Collection
    {
        return $this->walkables;
    }

    public function addWalkable(Walkable $walkable): static
    {
        if (!$this->walkables->contains($walkable)) {
            $this->walkables->add($walkable);
            $walkable->setMap($this);
        }

        return $this;
    }

    public function removeWalkable(Walkable $walkable): static
    {
        if ($this->walkables->removeElement($walkable)) {
            // set the owning side to null (unless already changed)
            if ($walkable->getMap() === $this) {
                $walkable->setMap(null);
            }
        }

        return $this;
    }
}
