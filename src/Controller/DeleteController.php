<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteController extends AbstractController
{
    /**
     * @Route("/delete/{id}", name="app_delete")
     */
    public function index($id, ProduitRepository $prod): Response
    { $produit = $prod->find($id);

        
            $prod->remove($produit);
            $this->addFlash('success',   ' a été correctement supprimé.');
        //  else $this->addFlash('errors', 'On ne peut pas supprimer un produit');
        return $this->redirectToRoute('app_produit');
}
 /**
     * @Route("/delete/{id}", name="app_delete")
     */
    public function indexListe($id, UserRepository $us): Response
    { $user = $us->find($id);

        
            $us->remove($user);
            $this->addFlash('success',   ' a été correctement supprimé.');
        //  else $this->addFlash('errors', 'On ne peut pas supprimer un user');
        return $this->redirectToRoute('app_userliste');
}
}