<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="app_produit")
     */
    public function index(ProduitRepository $produit): Response
    {
        $produits = $produit->findAll();

        return $this->render('produit/index.html.twig', [
            'produit' => $produits,

        ]);
    }
    /**
     * @Route("/produit/detail{id}", name="app_detailproduit")
     */
    public function detailproduit($id, ProduitRepository $produit): Response
    {
        $produits = $produit->find($id);

        return $this->render('produit/detail.html.twig', [
            'produit' => $produits,

        ]);
    }
      /**
     * @Route("/produit/prod50ml", name="app_prod50ml")
     */
    public function produit50ml(ProduitRepository $produit): Response
    {
        $produits = $produit->findAll();

        return $this->render('produit/prod50ml.html.twig', [
            'produit' => $produits,

        ]);
    }
      /**
     * @Route("/produit/prod100ml", name="app_prod100ml")
     */
    public function produit100ml(ProduitRepository $produit): Response
    {
        $produits = $produit->findAll();

        return $this->render('produit/prod100ml.html.twig', [
            'produit' => $produits,

        ]);
    }
      /**
     * @Route("/produit/prod200ml", name="app_prod200ml")
     */
    public function produit200ml(ProduitRepository $produit): Response
    {
        $produits = $produit->findAll();

        return $this->render('produit/prod200ml.html.twig', [
            'produit' => $produits,

        ]);
    }

}
