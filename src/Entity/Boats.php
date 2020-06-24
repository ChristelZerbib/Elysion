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

    /**
     * @ORM\ManyToOne(targetEntity=FeatureLevels::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $required_skill;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRequiredSkill(): ?FeatureLevels
    {
        return $this->required_skill;
    }

    public function setRequiredSkill(?FeatureLevels $required_skill): self
    {
        $this->required_skill = $required_skill;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
