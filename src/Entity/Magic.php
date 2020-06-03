<?php

namespace App\Entity;

use App\Repository\MagicRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MagicRepository::class)
 */
class Magic
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FluxTypes::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $flux_type;

    /**
     * @ORM\OneToOne(targetEntity=features::class, cascade={"persist", "remove"})
     */
    private $feature;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFluxType(): ?FluxTypes
    {
        return $this->flux_type;
    }

    public function setFluxType(?FluxTypes $flux_type): self
    {
        $this->flux_type = $flux_type;

        return $this;
    }

    public function getFeature(): ?features
    {
        return $this->feature;
    }

    public function setFeature(?features $feature): self
    {
        $this->feature = $feature;

        return $this;
    }
}
