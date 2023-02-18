<?php

namespace App\Entity;

use App\Repository\PretRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PretRepository::class)]
class Pret
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column(length: 255)]
    private ?string $raison = null;

    #[ORM\Column]
    private ?int $poste = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $debut_travail = null;

    #[ORM\Column]
    private ?float $revenu = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $duree = null;

    #[ORM\Column]
    private ?float $Taux = null;

    public function getId(): ?int
    {
        return $this->id;
    }

   
    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): self
    {
        $this->raison = $raison;

        return $this;
    }

    public function getPoste(): ?int
    {
        return $this->poste;
    }

    public function setPoste(int $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getDebutTravail(): ?\DateTimeInterface
    {
        return $this->debut_travail;
    }

    public function setDebutTravail(\DateTimeInterface $debut_travail): self
    {
        $this->debut_travail = $debut_travail;

        return $this;
    }

    public function getRevenu(): ?float
    {
        return $this->revenu;
    }

    public function setRevenu(float $revenu): self
    {
        $this->revenu = $revenu;

        return $this;
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

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getTaux(): ?float
    {
        return $this->Taux;
    }

    public function setTaux(float $Taux): self
    {
        $this->Taux = $Taux;

        return $this;
    }
}
