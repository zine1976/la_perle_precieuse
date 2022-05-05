<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AjoutController extends AbstractController
{
    /**
     * @Route("/ajout", name="app_ajout")
     */
    public function index(Request $request, ProduitRepository $produit): Response
    {
        $produits = new Produit;
        $formulaire = $this->createForm(ProduitType::class, $produits);
        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $produit->add($produits);
            return $this->redirectToRoute('app_produit');
        }

        return $this->render('ajout/index.html.twig', [
            'titre' => 'Nouveau produit',
            'form' => $formulaire->createView()
        ]);
    }
}
