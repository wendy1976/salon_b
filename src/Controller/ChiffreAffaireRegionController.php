<?php

namespace App\Controller;

use App\Entity\ChiffreAffaireRegion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ChiffreAffaireRegionRepository;

class ChiffreAffaireRegionController extends AbstractController
{
    #[Route('/chiffre_affaire_region', name: 'chiffre_affaire_region_index')]
    public function index(ChiffreAffaireRegionRepository $repository): Response
    {
        // Utilisez directement le repository injecté dans la méthode
        $chiffresAffaires = $repository->findAll();

        // Calculer la somme du chiffre d'affaires par région
        $totalCAByRegion = ChiffreAffaireRegion::calculateTotalCAByRegion($chiffresAffaires);

        // Calculer la moyenne du chiffre d'affaires par région
        $averageCAByRegion = ChiffreAffaireRegion::calculateAverageCAByRegion($chiffresAffaires);

        // Afficher les résultats
        return $this->render('ChiffreAffaireRegion/index.html.twig', [
            'totalCAByRegion' => $totalCAByRegion,
            'averageCAByRegion' => $averageCAByRegion,
        ]);
        // ... retourner une réponse appropriée ou afficher les résultats sur votre interface
    }
}
