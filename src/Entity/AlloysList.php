<?php

namespace App\Entity;

use App\Repository\AlloysListRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlloysListRepository::class)
 */
class AlloysList
{
    const TYPES = ["Alliage métalique","Essence de bois & laque", "Tissu & cuir", "Alliage pour navire"
    ];
    const SUPPORTS = ["Armures", "Armes", "Armes de trait", "Toute arme sauf armes de traits", "Tout objet sauf arme", "Bijoux", "Vêtements", "Tout objet", "Coque","Voiles", "Poupe & Proue", "Autres parties du navire"
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
     * @ORM\Column(type="boolean")
     */
    private $isunique;

    /**
     * @ORM\Column(type="string", length=3000)
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
    private $type;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $support;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $support_3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $support_2;

    /**
     * @ORM\ManyToOne(targetEntity=BonusEffectsList::class)
     */
    private $bonus_1;

    /**
     * @ORM\ManyToOne(targetEntity=BonusEffectsList::class)
     */
    private $bonus_2;

    /**
     * @ORM\ManyToOne(targetEntity=BonusEffectsList::class)
     */
    private $bonus_3;

    /**
     * @ORM\ManyToOne(targetEntity=BonusEffectsList::class)
     */
    private $bonus_4;

    /**
     * @ORM\ManyToOne(targetEntity=BonusEffectsList::class)
     */
    private $malus_1;

    /**
     * @ORM\ManyToOne(targetEntity=BonusEffectsList::class)
     */
    private $malus_2;

    /**
     * @ORM\ManyToOne(targetEntity=BonusEffectsList::class)
     */
    private $malus_3;

    /**
     * @ORM\ManyToOne(targetEntity=BonusEffectsList::class)
     */
    private $effect_1;

    /**
     * @ORM\ManyToOne(targetEntity=BonusEffectsList::class)
     */
    private $effect_2;

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

     public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getSupport3(): ?string
    {
        return $this->support_3;
    }

    public function setSupport3(?string $support_3): self
    {
        $this->support_3 = $support_3;

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

    public function getBonus1(): ?BonusEffectsList
    {
        return $this->bonus_1;
    }

    public function setBonus1(?BonusEffectsList $bonus_1): self
    {
        $this->bonus_1 = $bonus_1;

        return $this;
    }

    public function getBonus2(): ?BonusEffectsList
    {
        return $this->bonus_2;
    }

    public function setBonus2(?BonusEffectsList $bonus_2): self
    {
        $this->bonus_2 = $bonus_2;

        return $this;
    }

    public function getBonus3(): ?BonusEffectsList
    {
        return $this->bonus_3;
    }

    public function setBonus3(?BonusEffectsList $bonus_3): self
    {
        $this->bonus_3 = $bonus_3;

        return $this;
    }

    public function getBonus4(): ?BonusEffectsList
    {
        return $this->bonus_4;
    }

    public function setBonus4(?BonusEffectsList $bonus_4): self
    {
        $this->bonus_4 = $bonus_4;

        return $this;
    }

    public function getMalus1(): ?BonusEffectsList
    {
        return $this->malus_1;
    }

    public function setMalus1(?BonusEffectsList $malus_1): self
    {
        $this->malus_1 = $malus_1;

        return $this;
    }

    public function getMalus2(): ?BonusEffectsList
    {
        return $this->malus_2;
    }

    public function setMalus2(?BonusEffectsList $malus_2): self
    {
        $this->malus_2 = $malus_2;

        return $this;
    }

    public function getMalus3(): ?BonusEffectsList
    {
        return $this->malus_3;
    }

    public function setMalus3(?BonusEffectsList $malus_3): self
    {
        $this->malus_3 = $malus_3;

        return $this;
    }

    public function getEffect1(): ?BonusEffectsList
    {
        return $this->effect_1;
    }

    public function setEffect1(?BonusEffectsList $effect_1): self
    {
        $this->effect_1 = $effect_1;

        return $this;
    }

    public function getEffect2(): ?BonusEffectsList
    {
        return $this->effect_2;
    }

    public function setEffect2(?BonusEffectsList $effect_2): self
    {
        $this->effect_2 = $effect_2;

        return $this;
    }
}
