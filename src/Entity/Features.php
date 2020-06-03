<?php

namespace App\Entity;

use App\Repository\FeaturesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FeaturesRepository::class)
 */
class Features
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FeatureTypes::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $feature_type;

    /**
     * @ORM\ManyToOne(targetEntity=FeatureLevels::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $feature_level;

    /**
     * @ORM\ManyToOne(targetEntity=Characters::class, inversedBy="feature")
     * @ORM\JoinColumn(nullable=false)
     */
    private $characters;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFeatureType(): ?FeatureTypes
    {
        return $this->feature_type;
    }

    public function setFeatureType(?FeatureTypes $feature_type): self
    {
        $this->feature_type = $feature_type;

        return $this;
    }

    public function getFeatureLevel(): ?FeatureLevels
    {
        return $this->feature_level;
    }

    public function setFeatureLevel(?FeatureLevels $feature_level): self
    {
        $this->feature_level = $feature_level;

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
