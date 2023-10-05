<?php

namespace App\Controller;

use App\Entity\ChiffreAffaireDepartement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ChiffreAffaireDepartementRepository;

class ChiffreAffaireDepartementController extends AbstractController
{
    #[Route('/chiffre_affaire_departement', name: 'chiffre_affaire_departement_index')]
    public function index(ChiffreAffaireDepartementRepository $repository): Response
    {
        // Utilisez directement le repository injecté dans la méthode
        $chiffresAffaires = $repository->findAll();

        // Calculer la somme du chiffre d'affaires par département
        $totalCAByDepartement = ChiffreAffaireDepartement::calculateTotalCAByDepartement($chiffresAffaires);

        // Calculer la moyenne du chiffre d'affaires par département
        $averageCAByDepartement = ChiffreAffaireDepartement::calculateAverageCAByDepartement($chiffresAffaires);

        // Afficher les résultats
        return $this->render('ChiffreAffaireDepartement/index.html.twig', [
            'totalCAByDepartement' => $totalCAByDepartement,
            'averageCAByDepartement' => $averageCAByDepartement,
        ]);
        // ... retourner une réponse appropriée ou afficher les résultats sur votre interface
    }
}
