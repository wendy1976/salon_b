<?php
// Création du controleur d'authentification JWT
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class AuthController extends AbstractController
{
    private $jwtManager;

    public function __construct(JWTTokenManagerInterface $jwtManager)
    {
        $this->jwtManager = $jwtManager;
    }

    public function login(Request $request, UserInterface $user)
    {
        // Vous pouvez personnaliser cette logique d'authentification.
        // Si l'authentification réussit, générez un token JWT.
        $token = $this->jwtManager->create($user);

        return new JsonResponse(['token' => $token]);
    }
}
