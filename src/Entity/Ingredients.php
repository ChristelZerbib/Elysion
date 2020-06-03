<?php

namespace App\Entity;

use App\Repository\IngredientsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientsRepository::class)
 */
class Ingredients
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=IngredientTypes::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingredient_type;

    /**
     * @ORM\ManyToOne(targetEntity=Characters::class, inversedBy="ingredient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $characters;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIngredientType(): ?IngredientTypes
    {
        return $this->ingredient_type;
    }

    public function setIngredientType(?IngredientTypes $ingredient_type): self
    {
        $this->ingredient_type = $ingredient_type;

        return $this;
    }

    public function getCharacters(): ?Characters
    {
        return $this->characters;
    }

    public function setCharacters(?Characters $characters): self
    {
        $this->characters = $characters;

        return $this;
    }
}
