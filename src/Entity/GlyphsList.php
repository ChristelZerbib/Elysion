<?php

namespace App\Entity;

use App\Repository\GlyphsListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GlyphsListRepository::class)
 */
class GlyphsList
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Rarity::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $rarity;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=IngredientTypes::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingredient_type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isunique;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bought;

    /**
     * @ORM\Column(type="boolean")
     */
    private $used;

    /**
     * @ORM\ManyToOne(targetEntity=Characters::class, inversedBy="glyph")
     * @ORM\JoinColumn(nullable=false)
     */
    private $characters;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $effect;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $support;

    /**
     * @ORM\ManyToMany(targetEntity=UpFeature::class)
     */
    private $up_feature;

    public function __construct()
    {
        $this->up_feature = new ArrayCollection();
    }


 
    public function getId(): ?int
    {
        return $this->id;
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

    public function getRarity(): ?Rarity
    {
        return $this->rarity;
    }

    public function setRarity(?Rarity $rarity): self
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
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

    public function getIsunique(): ?bool
    {
        return $this->isunique;
    }

    public function setIsunique(bool $isunique): self
    {
        $this->isunique = $isunique;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBought(): ?bool
    {
        return $this->bought;
    }

    public function setBought(bool $bought): self
    {
        $this->bought = $bought;

        return $this;
    }

    public function getUsed(): ?bool
    {
        return $this->used;
    }

    public function setUsed(bool $used): self
    {
        $this->used = $used;

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

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(string $effect): self
    {
        $this->effect = $effect;

        return $this;
    }

    public function getSupport(): ?string
    {
        return $this->support;
    }

    public function setSupport(string $support): self
    {
        $this->support = $support;

        return $this;
    }

    public function getUpFeature(): ?UpFeature
    {
        return $this->up_feature;
    }

    public function addUpFeature(UpFeature $upFeature): self
    {
        if (!$this->up_feature->contains($upFeature)) {
            $this->up_feature[] = $upFeature;
        }

        return $this;
    }

    public function removeUpFeature(UpFeature $upFeature): self
    {
        if ($this->up_feature->contains($upFeature)) {
            $this->up_feature->removeElement($upFeature);
        }

        return $this;
    }

}
