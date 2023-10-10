<?php
// Entité des chiffres d'affaires mensuels de tous les départements de France
namespace App\Entity;

use App\Repository\ChiffreAffaireDepartementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChiffreAffaireDepartementRepository::class)]
class ChiffreAffaireDepartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $departements = null;

    #[ORM\Column(length: 255)]
    private ?string $mois = null;

    #[ORM\Column]
    private ?int $ca = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartements(): ?string
    {
        return $this->departements;
    }

    public function setDepartements(string $departements): static
    {
        $this->departements = $departements;

        return $this;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): static
    {
        $this->mois = $mois;

        return $this;
    }

    public function getCa(): ?int
    {
        return $this->ca;
    }

    public function setCa(int $ca): static
    {
        $this->ca = $ca;

        return $this;
    }

    //Rajout méthodes pour la moyenne et la somme par département
public static function calculateTotalCAByDepartement(array $chiffresAffaires): array
{
    $totalCAByDepartement = [];

    foreach ($chiffresAffaires as $chiffreAffaire) {
        $departement = $chiffreAffaire->getDepartements();
        $ca = $chiffreAffaire->getCa();

        if (!isset($totalCAByDepartement[$departement])) {
            $totalCAByDepartement[$departement] = 0;
        }

        $totalCAByDepartement[$departement] += $ca;
    }

    return $totalCAByDepartement;
}

// Ajouter une méthode pour calculer la moyenne du chiffre d'affaires par département
public static function calculateAverageCAByDepartement(array $chiffresAffaires): array
{
    $totalCAByDepartement = self::calculateTotalCAByDepartement($chiffresAffaires);
    $averageCAByDepartement = [];

    foreach ($totalCAByDepartement as $departement => $totalCA) {
        $count = count(array_filter($chiffresAffaires, function ($chiffreAffaire) use ($departement) {
            return $chiffreAffaire->getDepartements() === $departement;
        }));

        $averageCAByDepartement[$departement] = $count > 0 ? $totalCA / $count : 0;
    }

    return $averageCAByDepartement;
}


}