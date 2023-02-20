<?php

namespace App\Entity;

use App\Repository\AccountRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AccountRepository::class)]
class Account
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"NomComplet is required.")]
    private ?string $NomComplet = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"Num Telefone is required.")]
    #[Assert\Length(min:8,max:8,minMessage:" Votre Num Telefone est invalide. ")]
    private ?int $NumTel = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Email is required.")]
    #[Assert\Email(message:" The Email '{{ value }}' is not a valid email. ")]
    private ?string $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Sexe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\GreaterThan('Y +18', message:"La date doit être supérieure à 18")]
    private ?\DateTimeInterface $DateNaiss = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"adresse is required.")]
    private ?string $Adresse = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"adresse is required.")]
    private ?string $Ville = null;

    #[ORM\Column(length: 255)]
    private ?string $Services = null;

    #[ORM\Column(type: 'string')]
    private $brochureFilename = null;

    #[ORM\OneToOne(mappedBy: 'account', cascade: ['persist', 'remove'])]
    private ?Accstatus $etat = null;

   

    public function getBrochureFilename()
    {
        return $this->brochureFilename;
    }

    public function setBrochureFilename($brochureFilename)
    {
        $this->brochureFilename = $brochureFilename;

        return $this;
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->NomComplet;
    }

    public function setNomComplet(string $NomComplet): self
    {
        $this->NomComplet = $NomComplet;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->NumTel;
    }

    public function setNumTel(int $NumTel): self
    {
        $this->NumTel = $NumTel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->DateNaiss;
    }

    public function setDateNaiss(\DateTimeInterface $DateNaiss): self
    {
        $this->DateNaiss = $DateNaiss;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->Services;
    }

    public function setServices(string $Services): self
    {
        $this->Services = $Services;

        return $this;
    }

    public function getEtat(): ?Accstatus
    {
        return $this->etat;
    }

    public function setEtat(?Accstatus $etat): self
    {
        if ($etat === null && $this->etat !== null) {
            $this->etat->setAccount(null);
        }

        if ($etat !== null && $etat->getAccount() !== $this) {
            $etat->setAccount($this);
        }

        $this->etat = $etat;

        return $this;
    }

    

}    

