<?php

namespace App\Entity;

use App\Repository\ObjectLegendRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjectLegendRepository::class)
 */
class ObjectLegend
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $partage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fusion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $eveil;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartage(): ?bool
    {
        return $this->partage;
    }

    public function setPartage(bool $partage): self
    {
        $this->partage = $partage;

        return $this;
    }

    public function getFusion(): ?bool
    {
        return $this->fusion;
    }

    public function setFusion(bool $fusion): self
    {
        $this->fusion = $fusion;

        return $this;
    }

    public function getEveil(): ?bool
    {
        return $this->eveil;
    }

    public function setEveil(bool $eveil): self
    {
        $this->eveil = $eveil;

        return $this;
    }

}
