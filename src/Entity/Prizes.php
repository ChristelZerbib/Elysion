<?php

namespace App\Entity;

use App\Repository\PrizesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrizesRepository::class)
 */
class Prizes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=PrizeTypes::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $prize_type;

    /**
     * @ORM\ManyToOne(targetEntity=Lotteries::class, inversedBy="prizes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lotteries;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrizeType(): ?PrizeTypes
    {
        return $this->prize_type;
    }

    public function setPrizeType(?PrizeTypes $prize_type): self
    {
        $this->prize_type = $prize_type;

        return $this;
    }

    public function getLotteries(): ?Lotteries
    {
        return $this->lotteries;
    }

    public function setLotteries(?Lotteries $lotteries): self
    {
        $this->lotteries = $lotteries;

        return $this;
    }
}
