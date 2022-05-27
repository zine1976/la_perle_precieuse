<?php

namespace App\Controller;

use Exception;
use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
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
            $image = $formulaire->get('image')->getData();
            $ok = true;

            if ($image) {
                $newName = 'prod_' . uniqid() . '.' . $image->guessExtension(); // Je crée un nouveau nom

                try {
                    // Je déplace l'image vers sa nouvelle destination
                    $image->move(
                        $this->getParameter('image_directory'), // Le dossier de destination
                        $newName // Le nom du fichier à sa nouvelle destination
                    );

                    $produit->setImage($newName);
                } catch (Exception $e) {
                    $this->addFlash('errors', 'Un problème est survenu pendant l\'upload du fichier.');
                    $ok = false;
                }
            }

            if ($ok) {
                $produit->add($produits);
                return $this->redirectToRoute('app_produit');
            }
           
               
        }

        return $this->render('ajout/index.html.twig', [
            'titre' => 'Nouveau produit',
            'form' => $formulaire->createView()
        ]);
       
    }

     /**
     * @Route("/ajout/modif/{id}", name="app_modif")
     */
    public function update(Request $request, produit $produit, ProduitRepository $produitRepository): Response
    {
        // $produits = new Produit;
        $formulaire = $this->createForm(ProduitType::class, $produit);
        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $produitRepository->add($produit);
            return $this->redirectToRoute('app_produit', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ajout/modif.html.twig', [
            'titre' => 'Nouveau produit',
            'form' => $formulaire->createView()
        ]);
    }
}