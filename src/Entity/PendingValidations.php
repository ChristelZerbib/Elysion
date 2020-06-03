<?php

namespace App\Entity;

use App\Repository\PendingValidationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PendingValidationsRepository::class)
 */
class PendingValidations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $request_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity=Characters::class, inversedBy="pending_validation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRequestId(): ?string
    {
        return $this->request_id;
    }

    public function setRequestId(?string $request_id): self
    {
        $this->request_id = $request_id;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getOwner(): ?Characters
    {
        return $this->owner;
    }

    public function setOwner(?Characters $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
