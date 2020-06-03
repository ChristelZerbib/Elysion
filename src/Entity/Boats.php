<?php

namespace App\Entity;

use App\Repository\BoatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoatsRepository::class)
 */
class Boats
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=ObjectsList::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $object;

    /**
     * @ORM\Column(type="integer")
     */
    private $maintenance;

    /**
     * @ORM\Column(type="integer")
     */
    private $staff;

    /**
     * @ORM\Column(type="integer")
     */
    private $glyph_max;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObject(): ?ObjectsList
    {
        return $this->object;
    }

    public function setObject(ObjectsList $object): self
    {
        $this->object = $object;

        return $this;
    }

    public function getMaintenance(): ?int
    {
        return $this->maintenance;
    }

    public function setMaintenance(int $maintenance): self
    {
        $this->maintenance = $maintenance;

        return $this;
    }

    public function getStaff(): ?int
    {
        return $this->staff;
    }

    public function setStaff(int $staff): self
    {
        $this->staff = $staff;

        return $this;
    }

    public function getGlyphMax(): ?int
    {
        return $this->glyph_max;
    }

    public function setSGlyphMax(int $glyph_max): self
    {
        $this->glyph_max = $glyph_max;

        return $this;
    }
}
