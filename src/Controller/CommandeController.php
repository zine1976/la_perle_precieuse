<?php

namespace App\Controller;

use App\Repository\CommandeRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="app_commande")
     */
    public function index(CommandeRepository $commande): Response
    {
        $commandes = $commande->findAll();

        return $this->render('commande/index.html.twig', [
            'commandes' => $commandes,

        ]);
    }
}
