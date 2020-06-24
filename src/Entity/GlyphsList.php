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

    const EFFECTS = ["Défensif","Esthétique", "Offensif", "Soutien"
    ];
    const SUPPORTS = ["Armures", "Armes", "Bijoux et accessoires", "Vêtements", "Chaussures et bijou de cheville", "Navires","Animalerie et Dragonerie", "Objets Divers", "Projectiles", "Tout objet"
    ];
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

    /**
     * @ORM\Column(type="boolean")
     */
    private $special;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $support_2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $support_3;

    /**
     * @ORM\Column(type="integer")
     */
    private $evol_salary;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1, nullable=true)
     */
    private $evol_maintenance;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1, nullable=true)
     */
    private $evol_staff;

    /**
     * @ORM\Column(type="boolean")
     */
    private $personalization;

    /**
     * @ORM\ManyToOne(targetEntity=Characters::class, inversedBy="glyphs")
     */
    private $characters;

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

    public function getUpFeature(): ?Collection
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

    public function getSpecial(): ?bool
    {
        return $this->special;
    }

    public function setSpecial(bool $special): self
    {
        $this->special = $special;

        return $this;
    }

    public function getSupport2(): ?string
    {
        return $this->support_2;
    }

    public function setSupport2(?string $support_2): self
    {
        $this->support_2 = $support_2;

        return $this;
    }

    public function getSupport3(): ?string
    {
        return $this->support_3;
    }

    public function setSupport3(?string $support_3): self
    {
        $this->support_3 = $support_3;

        return $this;
    }

    public function getEvolSalary(): ?int
    {
        return $this->evol_salary;
    }

    public function setEvolSalary(int $evol_salary): self
    {
        $this->evol_salary = $evol_salary;

        return $this;
    }

    public function getEvolMaintenance(): ?string
    {
        return $this->evol_maintenance;
    }

    public function setEvolMaintenance(?string $evol_maintenance): self
    {
        $this->evol_maintenance = $evol_maintenance;

        return $this;
    }

    public function getEvolStaff(): ?string
    {
        return $this->evol_staff;
    }

    public function setEvolStaff(?string $evol_staff): self
    {
        $this->evol_staff = $evol_staff;

        return $this;
    }

    public function getPersonalization(): ?bool
    {
        return $this->personalization;
    }

    public function setPersonalization(bool $personalization): self
    {
        $this->personalization = $personalization;

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
