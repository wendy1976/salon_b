<?php


namespace App\Controller;

use App\Repository\SalonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//Création de la page pour afficher les données du salon
class SalonController extends AbstractController
{
    #[Route('/salon', name: 'salon')]
    public function salon(SalonRepository $salonRepository): Response
    {
        // Récupérer les données depuis le repository
        $salon = $salonRepository->find(1);

        // Rendre la vue avec les données du salon
        return $this->render('salon/index.html.twig', [
            'salon' => $salon,
        ]);
    }
}