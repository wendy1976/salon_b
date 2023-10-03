<?php

namespace App\Controller;

use App\Entity\ChiffreAffaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ChiffreAffaireRepository;

class ChiffreAffaireController extends AbstractController
{
    #[Route('/chiffre_affaire', name: 'chiffre_affaire_index')]
    public function index(ChiffreAffaireRepository $chiffreAffaireRepository): Response
    {
        // Obtenez les chiffres d'affaires depuis votre modèle (remplacez cette ligne par votre logique)
        $chiffresAffaire = $chiffreAffaireRepository->findAll();

        // Calculez la moyenne et la somme
        $moyenne = $this->calculateMoyenne($chiffresAffaire);
        $somme = $this->calculateSomme($chiffresAffaire);

        return $this->render('ChiffreAffaire/index.html.twig', [
            'moyenne' => $moyenne,
            'somme' => $somme,
        ]);
    }

    private function calculateMoyenne($chiffresAffaire)
    {
        $total = 0;
        $count = 0;

        foreach ($chiffresAffaire as $ca) {
            // Ajoutez le chiffre d'affaires de chaque mois à la somme
            $total += $ca->getJanvier() + $ca->getFevrier() + $ca->getMars() + $ca->getAvril() + $ca->getMai() + $ca->getJuin() + $ca->getJuillet() + $ca->getAout();
            $count += 8; // Nombre de mois à inclure dans le calcul de la moyenne
        }

        return $count > 0 ? $total / $count : null;
    }

    private function calculateSomme($chiffresAffaire)
    {
        $total = 0;

        foreach ($chiffresAffaire as $ca) {
            // Ajoutez le chiffre d'affaires de chaque mois à la somme
            $total += $ca->getJanvier() + $ca->getFevrier() + $ca->getMars() + $ca->getAvril() + $ca->getMai() + $ca->getJuin() + $ca->getJuillet() + $ca->getAout();
        }

        return $total;
    }
}