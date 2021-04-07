<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $envoyeur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureEnvoie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recepteur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureReception;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureAttente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnvoyeur(): ?string
    {
        return $this->envoyeur;
    }

    public function setEnvoyeur(string $envoyeur): self
    {
        $this->envoyeur = $envoyeur;

        return $this;
    }

    public function getHeureEnvoie(): ?\DateTimeInterface
    {
        return $this->heureEnvoie;
    }

    public function setHeureEnvoie(\DateTimeInterface $heureEnvoie): self
    {
        $this->heureEnvoie = $heureEnvoie;

        return $this;
    }

    public function getRecepteur(): ?string
    {
        return $this->recepteur;
    }

    public function setRecepteur(string $recepteur): self
    {
        $this->recepteur = $recepteur;

        return $this;
    }

    public function getHeureReception(): ?\DateTimeInterface
    {
        return $this->heureReception;
    }

    public function setHeureReception(\DateTimeInterface $heureReception): self
    {
        $this->heureReception = $heureReception;

        return $this;
    }

    public function getHeureAttente(): ?\DateTimeInterface
    {
        return $this->heureAttente;
    }

    public function setHeureAttente(\DateTimeInterface $heureAttente): self
    {
        $this->heureAttente = $heureAttente;

        return $this;
    }

}
