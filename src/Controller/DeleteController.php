<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\ProduitRepository;
use App\Repository\CommandeRepository;
use App\Repository\CommandeProduitRepository;
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
 /**
     * @Route("/delete/{id}", name="app_delete")
     */
    public function indexcom($id, CommandeProduitRepository $com): Response
    { $commande = $com->find($id);

        
            $com->remove($commande);
            $this->addFlash('success',   ' a été correctement supprimé.');
        //  else $this->addFlash('errors', 'On ne peut pas supprimer une commande');
        return $this->redirectToRoute('app_commande');
}
}