<?php

namespace App\Entity;

use App\Repository\ObjectsListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToMany(targetEntity=GlyphsList::class)
     */
    private $glyphs;

    public function __construct()
    {
        $this->glyphs = new ArrayCollection();
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

    /**
     * @return Collection|GlyphsList[]
     */
    public function getGlyphs(): Collection
    {
        return $this->glyphs;
    }

    public function addGlyph(GlyphsList $glyph): self
    {
        if (!$this->glyphs->contains($glyph)) {
            $this->glyphs[] = $glyph;
        }

        return $this;
    }

    public function removeGlyph(GlyphsList $glyph): self
    {
        if ($this->glyphs->contains($glyph)) {
            $this->glyphs->removeElement($glyph);
        }

        return $this;
    }
}
