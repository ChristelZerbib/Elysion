<?php

namespace App\Entity;

use App\Repository\LotteriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotteriesRepository::class)
 */
class Lotteries
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=Prizes::class, mappedBy="lotteries", orphanRemoval=true)
     */
    private $prizes;

    public function __construct()
    {
        $this->prizes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Prizes[]
     */
    public function getPrizes(): Collection
    {
        return $this->prizes;
    }

    public function addPrize(Prizes $prize): self
    {
        if (!$this->prizes->contains($prize)) {
            $this->prizes[] = $prize;
            $prize->setLotteries($this);
        }

        return $this;
    }

    public function removePrize(Prizes $prize): self
    {
        if ($this->prizes->contains($prize)) {
            $this->prizes->removeElement($prize);
            // set the owning side to null (unless already changed)
            if ($prize->getLotteries() === $this) {
                $prize->setLotteries(null);
            }
        }

        return $this;
    }
}
