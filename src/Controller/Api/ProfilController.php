<?php
// src/Controller/Api/ProfilController.php

namespace App\Controller\Api;

use App\Entity\Salon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/profil', name: 'api_profil')]
class ProfilController
{
    private EntityManagerInterface $entityManager;
    private SerializerInterface $serializer;

    public function __construct(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
    }

    public function getProfil()
    {
        // Récupérez les données du salon, par exemple en utilisant le repository
        $salonRepository = $this->entityManager->getRepository(Salon::class);
        $salon = $salonRepository->find(1); // Supposons que l'ID du salon est 1

        // Créez un tableau associatif avec les données que vous souhaitez renvoyer
        $data = [
            'Nom du salon' => $salon->getNom(),
            'Adresse' => $salon->getAdresse(),
            'Date ouverture' => $salon->getDateOuverture(),
            'Employes' => $salon->getEmployes(),
            'Nom du gerant' => $salon->getNomGerant(),
            'Prenom du gerant' => $salon->getPrenomGerant(),
            
            
            // Ajoutez d'autres champs ici
        ];

        // Utilisez le Serializer pour formater les données en JSON
        $jsonData = $this->serializer->serialize($data, 'json');

        // Créez une réponse JSON avec les données formatées
        $response = new JsonResponse($jsonData, 300, [], true);

        return $response;
    }
}