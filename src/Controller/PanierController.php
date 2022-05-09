<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * @IsGranted("ROLE_USER")
 * @Route("/panier")
 */
class PanierController extends AbstractController
{
    /**
     * @Route("/add-panier/{produit}", name="add_panier")
     */
    public function index(Produit $produit, SessionInterface $session, Request $request): Response
    {
        $quantite = $request->request->get('qtte');
        if ($quantite <= 0) throw new BadRequestHttpException;

        $panier = $session->get('panier', []);

        if (!empty($panier[$produit->getId()]))
         $panier[$produit->getId()] =
          min(
              $quantite
              + $panier[$produit->getId()], 
              $produit->getStock());
        else $panier[$produit->getId()] = min($quantite, $produit->getStock());

        $session->set('panier', $panier);

        return $this->redirectToRoute('app_accueil');
}
/**
     * @Route("/panier", name="app_panier")
     */
    public function show(SessionInterface $session, ProduitRepository $pr): Response
    {
        $panier = $session->get('panier', []);

        $ids = array_keys($panier);
        $produits = $pr->getAllProduits($ids);

        $tva = 0;
        $total = 0;
        $printablePanier = [];
        foreach ($panier as $id => $quantite) {
            $produit = $produits[$id];
            $tva += $produit->getPrix() * $quantite * $produit->getTauxTva() / 100;
            $total += $produit->getPrix() * $quantite;

            $printablePanier[$id] = [
                'quantite' => $quantite,
                'produit' => $produit
            ];
        }

        return $this->render('panier/index.html.twig', [
            'panier' => $printablePanier,
            'total' => $total,
            'tva' => $tva,
        ]);
    }

    /**
     * @Route("/vider-panier", name="app_vider_panier")
     */
    public function vider(SessionInterface $session): Response
    {
        $session->set('panier', []);

        return $this->redirectToRoute('app_accueil');
    }
}