<?php

namespace App\Entity;

use App\Repository\RarityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RarityRepository::class)
 */
class Rarity
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
     * @ORM\Column(type="boolean")
     */
    private $marketable;

    /**
     * @ORM\Column(type="boolean")
     */
    private $duplicable;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

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

    public function getMarketable(): ?bool
    {
        return $this->marketable;
    }

    public function setMarketable(bool $marketable): self
    {
        $this->marketable = $marketable;

        return $this;
    }

    public function getDuplicable(): ?bool
    {
        return $this->duplicable;
    }

    public function setDuplicable(bool $duplicable): self
    {
        $this->duplicable = $duplicable;

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
}
