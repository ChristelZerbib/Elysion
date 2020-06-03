<?php

namespace App\Entity;

use App\Repository\ObjectsListRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjectsListRepository::class)
 */
class ObjectsList
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
     * @ORM\OneToOne(targetEntity=GlyphsList::class, cascade={"persist", "remove"})
     */
    private $glyphe1;

    /**
     * @ORM\OneToOne(targetEntity=GlyphsList::class, cascade={"persist", "remove"})
     */
    private $glyph2;

    /**
     * @ORM\OneToOne(targetEntity=GlyphsList::class, cascade={"persist", "remove"})
     */
    private $glyph3;

    /**
     * @ORM\OneToOne(targetEntity=GlyphsList::class, cascade={"persist", "remove"})
     */
    private $glyph4;

    /**
     * @ORM\OneToOne(targetEntity=GlyphsList::class, cascade={"persist", "remove"})
     */
    private $glyph_sup1;

    /**
     * @ORM\OneToOne(targetEntity=GlyphsList::class, cascade={"persist", "remove"})
     */
    private $glyph_sup2;

    /**
     * @ORM\OneToOne(targetEntity=GlyphsList::class, cascade={"persist", "remove"})
     */
    private $glyph_sup3;

    /**
     * @ORM\OneToOne(targetEntity=GlyphsList::class, cascade={"persist", "remove"})
     */
    private $glyph_sup4;

    /**
     * @ORM\OneToOne(targetEntity=GlyphsList::class, cascade={"persist", "remove"})
     */
    private $glyph_sup5;

    /**
     * @ORM\OneToOne(targetEntity=GlyphsList::class, cascade={"persist", "remove"})
     */
    private $glyph_sup6;

    /**
     * @ORM\OneToOne(targetEntity=AlloysList::class, cascade={"persist", "remove"})
     */
    private $alloy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shop;

    /**
     * @ORM\Column(type="boolean")
     */
    private $boat;

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

    public function getGlyphe1(): ?GlyphsList
    {
        return $this->glyphe1;
    }

    public function setGlyphe1(?GlyphsList $glyphe1): self
    {
        $this->glyphe1 = $glyphe1;

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

    public function getGlyphSup1(): ?GlyphsList
    {
        return $this->glyph_sup1;
    }

    public function setGlyphSup1(?GlyphsList $glyph_sup1): self
    {
        $this->glyph_sup1 = $glyph_sup1;

        return $this;
    }

    public function getGlyphSup2(): ?GlyphsList
    {
        return $this->glyph_sup2;
    }

    public function setGlyphSup2(?GlyphsList $glyph_sup2): self
    {
        $this->glyph_sup2 = $glyph_sup2;

        return $this;
    }

    public function getGlyphSup3(): ?GlyphsList
    {
        return $this->glyph_sup3;
    }

    public function setGlyphSup3(?GlyphsList $glyph_sup3): self
    {
        $this->glyph_sup3 = $glyph_sup3;

        return $this;
    }

    public function getGlyphSup4(): ?GlyphsList
    {
        return $this->glyph_sup4;
    }

    public function setGlyphSup4(?GlyphsList $glyph_sup4): self
    {
        $this->glyph_sup4 = $glyph_sup4;

        return $this;
    }

    public function getGlyphSup5(): ?GlyphsList
    {
        return $this->glyph_sup5;
    }

    public function setGlyphSup5(?GlyphsList $glyph_sup5): self
    {
        $this->glyph_sup5 = $glyph_sup5;

        return $this;
    }

    public function getGlyphSup6(): ?GlyphsList
    {
        return $this->glyph_sup6;
    }

    public function setGlyphSup6(?GlyphsList $glyph_sup6): self
    {
        $this->glyph_sup6 = $glyph_sup6;

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

    public function getBoat(): ?bool
    {
        return $this->boat;
    }

    public function setBoat(bool $boat): self
    {
        $this->boat = $boat;

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
}
