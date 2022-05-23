<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AdresslivType;
use App\Form\AdressfactType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdresseController extends AbstractController
{
    /**
     * @Route("/adresse", name="app_adresseliv")
     */
    public function adressliv(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_connexion');
        }

        $formulaire = $this->createForm(AdresslivType::class,);
        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {

            $this->getUser()
                ->setAdressliv($formulaire->get('adresse')->getData())
                ->setCpliv($formulaire->get('cp')->getData())
                ->setVilleliv($formulaire->get('ville')->getData());

            // $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_adressefact');
        }

        return $this->render('adresse/index.html.twig', [
            'titre' => 'Nouvelle adresse',
            'form' => $formulaire->createView()
        ]);
    }

     /**
     * @Route("/adresse/fact", name="app_adressefact")
     */
    public function facturation(Request $request, UserRepository $user, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_connexion');
        }
        $formulaire = $this->createForm(AdressfactType::class,);
        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $this->getUser()
                ->setAdressfact($formulaire->get('adresse')->getData())
                ->setCpfact($formulaire->get('cp')->getData())
                ->setVillefact($formulaire->get('ville')->getData());

            // $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('adresse/fact.html.twig', [
            'titre' => 'adresse facturation',
            'form' => $formulaire->createView()
        ]);
    }
}