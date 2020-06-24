<?php

namespace App\Entity;

use App\Repository\ObjectsListRepository;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity(repositoryClass=ObjectsListRepository::class)
 */
class ObjectsList
{

    const SHOP = ["Boutique des essentiels","Boutique des objets communs", "Boutique des objets rares", "Capitainerie"
    ];

    const TYPES = ["Armes","Armures", "Vêtements", "Bijoux et accessoires", "Objets", "Consommables", "Animaux et dragons", "Capitainerie"
    ];
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Titles::class, cascade={"persist", "remove"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity=ObjectTypes::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $subtype;
   

    /**
     * @ORM\OneToOne(targetEntity=AlloysList::class, cascade={"persist", "remove"})
     */
    private $alloy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shop;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Rarity::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $rarity;

    /**
     * @ORM\OneToOne(targetEntity=ObjectLegend::class, inversedBy="object", cascade={"persist", "remove"})
     */
    private $legend;

    /**
     * @ORM\ManyToOne(targetEntity=Characters::class, inversedBy="objects")
     */
    private $characters;

    /**
     * @ORM\ManyToOne(targetEntity=Boats::class)
     */
    private $boat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_number;

    /**
     * @ORM\Column(type="boolean")
     */
    private $personalization;

    /**
     * @ORM\ManyToOne(targetEntity=GlyphsList::class)
     */
    private $glyph1;

    /**
     * @ORM\ManyToOne(targetEntity=GlyphsList::class)
     */
    private $glyph2;

    /**
     * @ORM\ManyToOne(targetEntity=GlyphsList::class)
     */
    private $glyph3;

    /**
     * @ORM\ManyToOne(targetEntity=GlyphsList::class)
     */
    private $glyph4;

    /**
     * @ORM\ManyToOne(targetEntity=GlyphsList::class)
     */
    private $glyph5;

    /**
     * @ORM\ManyToOne(targetEntity=GlyphsList::class)
     */
    private $glyph6;

    /**
     * @ORM\ManyToOne(targetEntity=GlyphsList::class)
     */
    private $glyph7;

    /**
     * @ORM\ManyToOne(targetEntity=GlyphsList::class)
     */
    private $glyph8;

    /**
     * @ORM\ManyToOne(targetEntity=GlyphsList::class)
     */
    private $glyph9;

    /**
     * @ORM\ManyToOne(targetEntity=GlyphsList::class)
     */
    private $glyph10;

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

    public function getTitle(): ?Titles
    {
        return $this->title;
    }

    public function setTitle(?Titles $title): self
    {
        $this->title = $title;

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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getSubtype(): ?ObjectTypes
    {
        return $this->subtype;
    }

    public function setSubtype(?ObjectTypes $subtype): self
    {
        $this->subtype = $subtype;

        return $this;
    }

   

    public function getAlloy(): ?AlloysList
    {
        return $this->alloy;
    }

    public function setAlloy(?AlloysList $alloy): self
    {
        $this->alloy = $alloy;

        return $this;
    }

    public function getShop(): ?string
    {
        return $this->shop;
    }

    public function setShop(string $shop): self
    {
        $this->shop = $shop;

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

    public function getRarity(): ?Rarity
    {
        return $this->rarity;
    }

    public function setRarity(?Rarity $rarity): self
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getLegend(): ?ObjectLegend
    {
        return $this->legend;
    }

    public function setLegend(?ObjectLegend $legend): self
    {
        $this->legend = $legend;

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

    public function getBoat(): ?Boats
    {
        return $this->boat;
    }

    public function setBoat(?Boats $boat): self
    {
        $this->boat = $boat;

        return $this;
    }

    public function getMaxNumber(): ?int
    {
        return $this->max_number;
    }

    public function setMaxNumber(?int $max_number): self
    {
        $this->max_number = $max_number;

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

    public function getGlyph1(): ?GlyphsList
    {
        return $this->glyph1;
    }

    public function setGlyph1(?GlyphsList $glyph1): self
    {
        $this->glyph1 = $glyph1;

        return $this;
    }

    public function getGlyph2(): ?GlyphsList
    {
        return $this->glyph2;
    }

    public function setGlyph2(?GlyphsList $glyph2): self
    {
        $this->glyph2 = $glyph2;

        return $this;
    }

    public function getGlyph3(): ?GlyphsList
    {
        return $this->glyph3;
    }

    public function setGlyph3(?GlyphsList $glyph3): self
    {
        $this->glyph3 = $glyph3;

        return $this;
    }

    public function getGlyph4(): ?GlyphsList
    {
        return $this->glyph4;
    }

    public function setGlyph4(?GlyphsList $glyph4): self
    {
        $this->glyph4 = $glyph4;

        return $this;
    }

    public function getGlyph5(): ?GlyphsList
    {
        return $this->glyph5;
    }

    public function setGlyph5(?GlyphsList $glyph5): self
    {
        $this->glyph5 = $glyph5;

        return $this;
    }

    public function getGlyph6(): ?GlyphsList
    {
        return $this->glyph6;
    }

    public function setGlyph6(?GlyphsList $glyph6): self
    {
        $this->glyph6 = $glyph6;

        return $this;
    }

    public function getGlyph7(): ?GlyphsList
    {
        return $this->glyph7;
    }

    public function setGlyph7(?GlyphsList $glyph7): self
    {
        $this->glyph7 = $glyph7;

        return $this;
    }

    public function getGlyph8(): ?GlyphsList
    {
        return $this->glyph8;
    }

    public function setGlyph8(?GlyphsList $glyph8): self
    {
        $this->glyph8 = $glyph8;

        return $this;
    }

    public function getGlyph9(): ?GlyphsList
    {
        return $this->glyph9;
    }

    public function setGlyph9(?GlyphsList $glyph9): self
    {
        $this->glyph9 = $glyph9;

        return $this;
    }

    public function getGlyph10(): ?GlyphsList
    {
        return $this->glyph10;
    }

    public function setGlyph10(?GlyphsList $glyph10): self
    {
        $this->glyph10 = $glyph10;

        return $this;
    }
}
