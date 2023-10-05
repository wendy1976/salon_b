<?php
// Entité des chiffres d'affaires mensuels de toutes les régions de France
namespace App\Entity;

use App\Repository\ChiffreAffaireRegionRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManagerInterface;


#[ORM\Entity(repositoryClass: ChiffreAffaireRegionRepository::class)]
class ChiffreAffaireRegion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $regions = null;

    #[ORM\Column(length: 255)]
    private ?string $mois = null;

    #[ORM\Column]
    private ?int $ca = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegions(): ?string
    {
        return $this->regions;
    }

    public function setRegions(string $regions): static
    {
        $this->regions = $regions;

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
//Rajout méthodes pour la moyenne et la somme par région
public static function calculateTotalCAByRegion(array $chiffresAffaires): array
{
    $totalCAByRegion = [];

    foreach ($chiffresAffaires as $chiffreAffaire) {
        $region = $chiffreAffaire->getRegions();
        $ca = $chiffreAffaire->getCa();

        if (!isset($totalCAByRegion[$region])) {
            $totalCAByRegion[$region] = 0;
        }

        $totalCAByRegion[$region] += $ca;
    }

    return $totalCAByRegion;
}

// Ajouter une méthode pour calculer la moyenne du chiffre d'affaires par région
public static function calculateAverageCAByRegion(array $chiffresAffaires): array
{
    $totalCAByRegion = self::calculateTotalCAByRegion($chiffresAffaires);
    $averageCAByRegion = [];

    foreach ($totalCAByRegion as $region => $totalCA) {
        $count = count(array_filter($chiffresAffaires, function ($chiffreAffaire) use ($region) {
            return $chiffreAffaire->getRegions() === $region;
        }));

        $averageCAByRegion[$region] = $count > 0 ? $totalCA / $count : 0;
    }

    return $averageCAByRegion;
}


}