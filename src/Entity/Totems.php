<?php

namespace App\Entity;

use App\Repository\TotemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TotemsRepository::class)
 */
class Totems
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=3000)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Characters::class, mappedBy="totem")
     */
    private $characters;

    /**
     * @ORM\ManyToMany(targetEntity=UpFeature::class)
     */
    private $up_feature;


   

    public function __construct()
    {
        $this->characters = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Characters[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Characters $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->addTotem($this);
        }

        return $this;
    }

    public function removeCharacter(Characters $character): self
    {
        if ($this->characters->contains($character)) {
            $this->characters->removeElement($character);
            $character->removeTotem($this);
        }

        return $this;
    }

    /**
     * @return Collection|UpFeature[]
     */
    public function getUpFeature(): Collection
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
