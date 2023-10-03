<?php

nameSpace App\Controller;

use Symfony\Component\HttpFoundation\Response;

// Création de la page d'accueil, avec une méthode et son retour
class HomeController {
    public function bonjour() 
    {
        return new Response("Bienvenue sur l'application de Salon B");
    }
}