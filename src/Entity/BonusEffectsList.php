<?php

namespace App\Entity;

use App\Repository\BonusEffectsListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BonusEffectsListRepository::class)
 */
class BonusEffectsList
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
     * @ORM\ManyToOne(targetEntity=Ranks::class)
     * @ORM\JoinColumn(nullable=false) 
     */
    private $rank;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isunique;

    /**
     * @ORM\Column(type="boolean")
     */
    private $israre;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $add_glyph_place;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bought;

    /**
     * @ORM\Column(type="boolean")
     */
    private $special;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $evol_salary;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $evol_maintenance;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $evol_staff;

    /**
     * @ORM\ManyToMany(targetEntity=UpFeature::class)
     */
    private $upFeature;

    public function __construct()
    {
        $this->upFeature = new ArrayCollection();
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

    public function getRank(): ?Ranks
    {
        return $this->rank;
    }

    public function setRank(?Ranks $rank): self
    {
        $this->rank = $rank;

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

        public function getIsrare(): ?bool
    {
        return $this->israre;
    }

    public function setIsrare(bool $israre): self
    {
        $this->israre = $israre;

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

    public function getAddGlyphPlace(): ?int
    {
        return $this->add_glyph_place;
    }

    public function setAddGlyphPlace(int $add_glyph_place): self
    {
        $this->add_glyph_place = $add_glyph_place;

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

    public function getSpecial(): ?bool
    {
        return $this->special;
    }

    public function setSpecial(bool $special): self
    {
        $this->special = $special;

        return $this;
    }

    public function getEvolSalary(): ?int
    {
        return $this->evol_salary;
    }

    public function setEvolSalary(?int $evol_salary): self
    {
        $this->evol_salary = $evol_salary;

        return $this;
    }

    public function getEvolMaintenance(): ?float
    {
        return $this->evol_maintenance;
    }

    public function setEvolMaintenance(?float $evol_maintenance): self
    {
        $this->evol_maintenance = $evol_maintenance;

        return $this;
    }

    public function getEvolStaff(): ?float
    {
        return $this->evol_staff;
    }

    public function setEvolStaff(?float $evol_staff): self
    {
        $this->evol_staff = $evol_staff;

        return $this;
    }

    /**
     * @return Collection|UpFeature[]
     */
    public function getUpFeature(): Collection
    {
        return $this->upFeature;
    }

    public function addUpFeature(UpFeature $upFeature): self
    {
        if (!$this->upFeature->contains($upFeature)) {
            $this->upFeature[] = $upFeature;
        }

        return $this;
    }

    public function removeUpFeature(UpFeature $upFeature): self
    {
        if ($this->upFeature->contains($upFeature)) {
            $this->upFeature->removeElement($upFeature);
        }

        return $this;
    }


}
