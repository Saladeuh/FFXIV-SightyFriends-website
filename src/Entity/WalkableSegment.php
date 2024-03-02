<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\WalkableSegmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WalkableSegmentRepository::class)]
#[ApiResource]
class WalkableSegment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $x1 = null;

    #[ORM\Column]
    private ?int $y1 = null;

    #[ORM\Column]
    private ?int $z1 = null;

    #[ORM\Column]
    private ?int $x2 = null;

    #[ORM\Column]
    private ?int $y2 = null;

    #[ORM\Column]
    private ?int $z2 = null;

    #[ORM\ManyToOne(inversedBy: 'walkableSegments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Map $map = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getX1(): ?int
    {
        return $this->x1;
    }

    public function setX1(int $x1): static
    {
        $this->x1 = $x1;

        return $this;
    }

    public function getY1(): ?int
    {
        return $this->y1;
    }

    public function setY1(int $y1): static
    {
        $this->y1 = $y1;

        return $this;
    }

    public function getZ1(): ?int
    {
        return $this->z1;
    }

    public function setZ1(int $z1): static
    {
        $this->z1 = $z1;

        return $this;
    }

    public function getX2(): ?int
    {
        return $this->x2;
    }

    public function setX2(int $x2): static
    {
        $this->x2 = $x2;

        return $this;
    }

    public function getY2(): ?int
    {
        return $this->y2;
    }

    public function setY2(int $y2): static
    {
        $this->y2 = $y2;

        return $this;
    }

    public function getZ2(): ?int
    {
        return $this->z2;
    }

    public function setZ2(int $z2): static
    {
        $this->z2 = $z2;

        return $this;
    }

    public function getMap(): ?Map
    {
        return $this->map;
    }

    public function setMap(?Map $map): static
    {
        $this->map = $map;

        return $this;
    }
}
