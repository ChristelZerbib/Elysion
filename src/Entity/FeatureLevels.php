<?php

namespace App\Entity;

use App\Repository\FeatureLevelsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FeatureLevelsRepository::class)
 */
class FeatureLevels
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
     * @ORM\Column(type="float")
     */
    private $xp_price;

    /**
     * @ORM\Column(type="integer")
     */
    private $rp_price;

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

    public function getXpPrice(): ?float
    {
        return $this->xp_price;
    }

    public function setXpPrice(float $xp_price): self
    {
        $this->xp_price = $xp_price;

        return $this;
    }

    public function getRpPrice(): ?int
    {
        return $this->rp_price;
    }

    public function setRpPrice(int $rp_price): self
    {
        $this->rp_price = $rp_price;

        return $this;
    }
}
