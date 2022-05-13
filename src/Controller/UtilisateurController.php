<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UtilisateurController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * 
     * @Route("/utilisateur", name="app_utilisateur")
     */
    public function index(UserRepository $utilisateur): Response
    {
        $utilisateurs = $utilisateur->findAll();
        return $this->render('utilisateur/index.html.twig', [
            'utilisateur' => $utilisateurs,
        ]);
    }
}
