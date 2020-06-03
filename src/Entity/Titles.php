<?php

namespace App\Entity;

use App\Repository\TitlesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TitlesRepository::class)
 */
class Titles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $clan_vampire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $alliance;

    /**
     * @ORM\Column(type="boolean")
     */
    private $royaume;

    /**
     * @ORM\Column(type="boolean")
     */
    private $confrerie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $graarh;

    /**
     * @ORM\Column(type="boolean")
     */
    private $neutre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Characters::class, inversedBy="title")
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

    public function getClanVampire(): ?bool
    {
        return $this->clan_vampire;
    }

    public function setClanVampire(bool $clan_vampire): self
    {
        $this->clan_vampire = $clan_vampire;

        return $this;
    }

    public function getAlliance(): ?bool
    {
        return $this->alliance;
    }

    public function setAlliance(bool $alliance): self
    {
        $this->alliance = $alliance;

        return $this;
    }

    public function getRoyaume(): ?bool
    {
        return $this->royaume;
    }

    public function setRoyaume(bool $royaume): self
    {
        $this->royaume = $royaume;

        return $this;
    }

    public function getConfrerie(): ?bool
    {
        return $this->confrerie;
    }

    public function setConfrerie(bool $confrerie): self
    {
        $this->confrerie = $confrerie;

        return $this;
    }

    public function getGraarh(): ?bool
    {
        return $this->graarh;
    }

    public function setGraarh(bool $graarh): self
    {
        $this->graarh = $graarh;

        return $this;
    }

    public function getNeutre(): ?bool
    {
        return $this->neutre;
    }

    public function setNeutre(bool $neutre): self
    {
        $this->neutre = $neutre;

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
