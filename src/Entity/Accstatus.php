<?php

namespace App\Entity;

use App\Repository\AccstatusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccstatusRepository::class)]
class Accstatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\OneToOne(inversedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?Account $account = null;

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount (?Account $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    
}
