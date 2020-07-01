<?php

namespace App\Entity;

use App\Repository\CharactersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharactersRepository::class)
 */
class Characters
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=PendingValidations::class, mappedBy="owner", orphanRemoval=true)
     */
    private $pending_validation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Jobs::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apperance_age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $faction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etnic_group;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $smallfaction;

    /**
     * @ORM\Column(type="boolean")
     */
    private $immunity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legal_statut;

    /**
     * @ORM\Column(type="string", length=3000, nullable=true)
     */
    private $history;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $character_traits;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $physical;

    /**
     * @ORM\ManyToMany(targetEntity=Rp::class, inversedBy="character_id")
     */
    private $rp;

    /**
     * @ORM\OneToMany(targetEntity=Links::class, mappedBy="characters")
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avatar_url;

    /**
     * @ORM\Column(type="float")
     */
    private $xp;

    /**
     * @ORM\Column(type="integer")
     */
    private $po;

    /**
     * @ORM\OneToMany(targetEntity=Spells::class, mappedBy="characters", orphanRemoval=true)
     */
    private $spell;

    /**
     * @ORM\ManyToOne(targetEntity=Talents::class)
     */
    private $talent;

    /**
     * @ORM\ManyToMany(targetEntity=Totems::class, inversedBy="characters")
     */
    private $totem;

    /**
     * @ORM\OneToMany(targetEntity=Features::class, mappedBy="characters", orphanRemoval=true)
     */
    private $feature;

    /**
     * @ORM\OneToOne(targetEntity=Magic::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $magic;

    /**
     * @ORM\OneToMany(targetEntity=Awards::class, mappedBy="characters", orphanRemoval=true)
     */
    private $award;

    /**
     * @ORM\OneToOne(targetEntity=Boats::class, cascade={"persist", "remove"})
     */
    private $boat;

    /**
     * @ORM\OneToMany(targetEntity=ObjectsList::class, mappedBy="characters")
     */
    private $objects;

    /**
     * @ORM\OneToMany(targetEntity=Titles::class, mappedBy="characters")
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Ingredients::class, mappedBy="characters", orphanRemoval=true)
     */
    private $ingredient;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="characters")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Features::class)
     */
    private $bonus_ethnique;

    /**
     * @ORM\OneToMany(targetEntity=GlyphsList::class, mappedBy="characters")
     */
    private $glyphs;

    public function __construct()
    {
        $this->pending_validation = new ArrayCollection();
        $this->rp = new ArrayCollection();
        $this->link = new ArrayCollection();
        $this->spell = new ArrayCollection();
        $this->totem = new ArrayCollection();
        $this->feature = new ArrayCollection();
        $this->award = new ArrayCollection();
        $this->objects = new ArrayCollection();
        $this->title = new ArrayCollection();
        $this->ingredient = new ArrayCollection();
        $this->glyph = new ArrayCollection();
        $this->glyphs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|PendingValidations[]
     */
    public function getPendingValidation(): Collection
    {
        return $this->pending_validation;
    }

    public function addPendingValidation(PendingValidations $pendingValidation): self
    {
        if (!$this->pending_validation->contains($pendingValidation)) {
            $this->pending_validation[] = $pendingValidation;
            $pendingValidation->setOwner($this);
        }

        return $this;
    }

    public function removePendingValidation(PendingValidations $pendingValidation): self
    {
        if ($this->pending_validation->contains($pendingValidation)) {
            $this->pending_validation->removeElement($pendingValidation);
            // set the owning side to null (unless already changed)
            if ($pendingValidation->getOwner() === $this) {
                $pendingValidation->setOwner(null);
            }
        }

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

    public function getJob(): ?Jobs
    {
        return $this->job;
    }

    public function setJob(?Jobs $job): self
    {
        $this->job = $job;

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getApperanceAge(): ?string
    {
        return $this->apperance_age;
    }

    public function setApperanceAge(?string $apperance_age): self
    {
        $this->apperance_age = $apperance_age;

        return $this;
    }

    public function getFaction(): ?string
    {
        return $this->faction;
    }

    public function setFaction(string $faction): self
    {
        $this->faction = $faction;

        return $this;
    }

    public function getEtnicGroup(): ?string
    {
        return $this->etnic_group;
    }

    public function setEtnicGroup(?string $etnic_group): self
    {
        $this->etnic_group = $etnic_group;

        return $this;
    }

    public function getSmallfaction(): ?string
    {
        return $this->smallfaction;
    }

    public function setSmallfaction(?string $smallfaction): self
    {
        $this->smallfaction = $md;

        return $this;
    }

    public function getImmunity(): ?bool
    {
        return $this->immunity;
    }

    public function setImmunity(bool $immunity): self
    {
        $this->immunity = $immunity;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getLegalStatut(): ?string
    {
        return $this->legal_statut;
    }

    public function setLegalStatut(?string $legal_statut): self
    {
        $this->legal_statut = $legal_statut;

        return $this;
    }

    public function getHistory(): ?string
    {
        return $this->history;
    }

    public function setHistory(?string $history): self
    {
        $this->history = $history;

        return $this;
    }

    public function getCharacterTraits(): ?string
    {
        return $this->character_traits;
    }

    public function setCharacterTraits(?string $character_traits): self
    {
        $this->character_traits = $character_traits;

        return $this;
    }

    public function getPhysical(): ?string
    {
        return $this->physical;
    }

    public function setPhysical(?string $physical): self
    {
        $this->physical = $physical;

        return $this;
    }

    /**
     * @return Collection|rp[]
     */
    public function getRp(): Collection
    {
        return $this->rp;
    }

    public function addRp(rp $rp): self
    {
        if (!$this->rp->contains($rp)) {
            $this->rp[] = $rp;
        }

        return $this;
    }

    public function removeRp(rp $rp): self
    {
        if ($this->rp->contains($rp)) {
            $this->rp->removeElement($rp);
        }

        return $this;
    }

    /**
     * @return Collection|Links[]
     */
    public function getLink(): Collection
    {
        return $this->link;
    }

    public function addLink(Links $link): self
    {
        if (!$this->link->contains($link)) {
            $this->link[] = $link;
            $link->setCharacters($this);
        }

        return $this;
    }

    public function removeLink(Links $link): self
    {
        if ($this->link->contains($link)) {
            $this->link->removeElement($link);
            // set the owning side to null (unless already changed)
            if ($link->getCharacters() === $this) {
                $link->setCharacters(null);
            }
        }

        return $this;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }

    public function setAvatarUrl(string $avatar_url): self
    {
        $this->avatar_url = $avatar_url;

        return $this;
    }

    public function getXp(): ?float
    {
        return $this->xp;
    }

    public function setXp(float $xp): self
    {
        $this->xp = $xp;

        return $this;
    }

    public function getPo(): ?int
    {
        return $this->po;
    }

    public function setPo(int $po): self
    {
        $this->po = $po;

        return $this;
    }

    /**
     * @return Collection|Spells[]
     */
    public function getSpell(): Collection
    {
        return $this->spell;
    }

    public function addSpell(Spells $spell): self
    {
        if (!$this->spell->contains($spell)) {
            $this->spell[] = $spell;
            $spell->setCharacters($this);
        }

        return $this;
    }

    public function removeSpell(Spells $spell): self
    {
        if ($this->spell->contains($spell)) {
            $this->spell->removeElement($spell);
            // set the owning side to null (unless already changed)
            if ($spell->getCharacters() === $this) {
                $spell->setCharacters(null);
            }
        }

        return $this;
    }

    public function getTalent(): ?Talents
    {
        return $this->talent;
    }

    public function setTalent(?Talents $talent): self
    {
        $this->talent = $talent;

        return $this;
    }

    /**
     * @return Collection|Totems[]
     */
    public function getTotem(): Collection
    {
        return $this->totem;
    }

    public function addTotem(Totems $totem): self
    {
        if (!$this->totem->contains($totem)) {
            $this->totem[] = $totem;
        }

        return $this;
    }

    public function removeTotem(Totems $totem): self
    {
        if ($this->totem->contains($totem)) {
            $this->totem->removeElement($totem);
        }

        return $this;
    }

    /**
     * @return Collection|Features[]
     */
    public function getFeature(): Collection
    {
        return $this->feature;
    }

    public function addFeature(Features $feature): self
    {
        if (!$this->feature->contains($feature)) {
            $this->feature[] = $feature;
            $feature->setCharacters($this);
        }

        return $this;
    }

    public function removeFeature(Features $feature): self
    {
        if ($this->feature->contains($feature)) {
            $this->feature->removeElement($feature);
            // set the owning side to null (unless already changed)
            if ($feature->getCharacters() === $this) {
                $feature->setCharacters(null);
            }
        }

        return $this;
    }

    public function getMagic(): ?Magic
    {
        return $this->magic;
    }

    public function setMagic(Magic $magic): self
    {
        $this->magic = $magic;

        return $this;
    }

    /**
     * @return Collection|Awards[]
     */
    public function getAward(): Collection
    {
        return $this->award;
    }

    public function addAward(Awards $award): self
    {
        if (!$this->award->contains($award)) {
            $this->award[] = $award;
            $award->setCharacters($this);
        }

        return $this;
    }

    public function removeAward(Awards $award): self
    {
        if ($this->award->contains($award)) {
            $this->award->removeElement($award);
            // set the owning side to null (unless already changed)
            if ($award->getCharacters() === $this) {
                $award->setCharacters(null);
            }
        }

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

    /**
     * @return Collection|ObjectsList[]
     */
    public function getObjects(): Collection
    {
        return $this->objects;
    }

    public function addObject(ObjectsList $object): self
    {
        if (!$this->objects->contains($object)) {
            $this->objects[] = $object;
            $object->setCharacters($this);
        }

        return $this;
    }

    public function removeObject(ObjectsList $object): self
    {
        if ($this->objects->contains($object)) {
            $this->objects->removeElement($object);
            // set the owning side to null (unless already changed)
            if ($object->getCharacters() === $this) {
                $object->setCharacters(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Titles[]
     */
    public function getTitle(): Collection
    {
        return $this->title;
    }

    public function addTitle(Titles $title): self
    {
        if (!$this->title->contains($title)) {
            $this->title[] = $title;
            $title->setCharacters($this);
        }

        return $this;
    }

    public function removeTitle(Titles $title): self
    {
        if ($this->title->contains($title)) {
            $this->title->removeElement($title);
            // set the owning side to null (unless already changed)
            if ($title->getCharacters() === $this) {
                $title->setCharacters(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ingredients[]
     */
    public function getIngredient(): Collection
    {
        return $this->ingredient;
    }

    public function addIngredient(Ingredients $ingredient): self
    {
        if (!$this->ingredient->contains($ingredient)) {
            $this->ingredient[] = $ingredient;
            $ingredient->setCharacters($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredients $ingredient): self
    {
        if ($this->ingredient->contains($ingredient)) {
            $this->ingredient->removeElement($ingredient);
            // set the owning side to null (unless already changed)
            if ($ingredient->getCharacters() === $this) {
                $ingredient->setCharacters(null);
            }
        }

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUsers(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBonusEtnique(): ?Features
    {
        return $this->bonus_ethnique;
    }

    public function setBonusEtnique(?Features $bonus_etnique): self
    {
        $this->bonus_ethnique = $bonus_ethnique;

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
            $glyph->setCharacters($this);
        }

        return $this;
    }

    public function removeGlyph(GlyphsList $glyph): self
    {
        if ($this->glyphs->contains($glyph)) {
            $this->glyphs->removeElement($glyph);
            // set the owning side to null (unless already changed)
            if ($glyph->getCharacters() === $this) {
                $glyph->setCharacters(null);
            }
        }

        return $this;
    }
}
