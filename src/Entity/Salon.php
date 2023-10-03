<?php

namespace App\Entity;

use App\Repository\SalonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalonRepository::class)]
class Salon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_ouverture = null;

    #[ORM\Column]
    private ?int $employes = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_gerant = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_gerant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->date_ouverture;
    }

    public function setDateOuverture(\DateTimeInterface $date_ouverture): static
    {
        $this->date_ouverture = $date_ouverture;

        return $this;
    }

    public function getEmployes(): ?int
    {
        return $this->employes;
    }

    public function setEmployes(int $employes): static
    {
        $this->employes = $employes;

        return $this;
    }

    public function getNomGerant(): ?string
    {
        return $this->nom_gerant;
    }

    public function setNomGerant(string $nom_gerant): static
    {
        $this->nom_gerant = $nom_gerant;

        return $this;
    }

    public function getPrenomGerant(): ?string
    {
        return $this->prenom_gerant;
    }

    public function setPrenomGerant(string $prenom_gerant): static
    {
        $this->prenom_gerant = $prenom_gerant;

        return $this;
    }
}
