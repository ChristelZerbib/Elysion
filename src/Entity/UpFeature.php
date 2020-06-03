<?php

namespace App\Entity;

use App\Repository\UpFeatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UpFeatureRepository::class)
 */
class UpFeature
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $up_quantity;

    /**
     * @ORM\Column(type="boolean")
     */
    private $temporary;

    /**
     * @ORM\ManyToOne(targetEntity=FeatureTypes::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $feature;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUpQuantity(): ?int
    {
        return $this->up_quantity;
    }

    public function setUpQuantity(int $up_quantity): self
    {
        $this->up_quantity = $up_quantity;

        return $this;
    }

    public function getTemporary(): ?bool
    {
        return $this->temporary;
    }

    public function setTemporary(bool $temporary): self
    {
        $this->temporary = $temporary;

        return $this;
    }

    public function getFeature(): ?FeatureTypes
    {
        return $this->feature;
    }

    public function setFeature(?FeatureTypes $feature): self
    {
        $this->feature = $feature;

        return $this;
    }


}
