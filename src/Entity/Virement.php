<?php

namespace App\Entity;

use App\Repository\VirementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VirementRepository::class)]
class Virement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_virement = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_virement = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_benef = null;

    #[ORM\Column(length: 255)]
    private ?string $rib_benef = null;

    public function getId(): ?int
    {
        return $this->id_virement;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateVirement(): ?\DateTimeInterface
    {
        return $this->date_virement;
    }

    public function setDateVirement(\DateTimeInterface $date_virement): self
    {
        $this->date_virement = $date_virement;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrenomBenef(): ?string
    {
        return $this->prenom_benef;
    }

    public function setPrenomBenef(string $prenom_benef): self
    {
        $this->prenom_benef = $prenom_benef;

        return $this;
    }

    public function getRibBenef(): ?string
    {
        return $this->rib_benef;
    }

    public function setRibBenef(string $rib_benef): self
    {
        $this->rib_benef = $rib_benef;

        return $this;
    }
}
