<?php

namespace App\Entity;

use App\Repository\PrizeTypesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrizeTypesRepository::class)
 */
class PrizeTypes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity=Awards::class, cascade={"persist", "remove"})
     */
    private $award;

    /**
     * @ORM\OneToOne(targetEntity=Ingredients::class, cascade={"persist", "remove"})
     */
    private $ingredient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAward(): ?Awards
    {
        return $this->award;
    }

    public function setAward(?Awards $award): self
    {
        $this->award = $award;

        return $this;
    }

    public function getIngredient(): ?Ingredients
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredients $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }
}
