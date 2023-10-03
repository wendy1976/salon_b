<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class UtilisateurController extends AbstractController
{
    #[Route('/formutilisateur', name: 'formutilisateur')]
    public function index(Request $request, ManagerRegistry $doctrine)//Request permet de récupérer les données
//Manager Registry: pour permettre d'insérer les données du formulaire dans la BDD
{
    $utilisateur = new Utilisateur(); //instance de l'entité
    //Méthode pour afficher le formulaire, avec une variable $contractform qui stocke le formulaire
    //et la méthode CreateForm
    $utilisateurform = $this->createForm(UtilisateurType::class, $utilisateur);
    //Pour récupérer les infos tapées dans le formulaire
    $utilisateurform->handleRequest($request);


    //Condition pour vérifier que les données sont valides et pouvoir les insérer dans une BDD
    if($utilisateurform->isSubmitted() && $utilisateurform->isValid())
    {
        //afficher les informations du formulaire:
        //dump($request->request->all());

        //Méthodes qui permettent de récupérer les infos du formulaire et de les insérer dans la BDD
        $entitymanager = $doctrine->getManager();
        $utilisateur = $utilisateurform->getData();

        $entitymanager->persist($utilisateur);
        $entitymanager->flush();
    }

    return $this->render('utilisateur/index.html.twig', [
        //Passe la variable dans le template twig, et permet l'affichage avec createView
        'utilisateurform' => $utilisateurform->createView()
    ]);
}
}

