<?php

namespace App\Controller;

use App\Entity\Adresselivraison;
use App\Form\AdresselivraisonType;
use App\Repository\AdresselivraisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adresselivraison")
 */
class AdresselivraisonController extends AbstractController
{
    /**
     * @Route("/", name="app_adresselivraison_index", methods={"GET"})
     */
    public function index(AdresselivraisonRepository $adresselivraisonRepository): Response
    {
        return $this->render('adresselivraison/index.html.twig', [
            'adresselivraisons' => $adresselivraisonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_adresselivraison_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AdresselivraisonRepository $adresselivraisonRepository): Response
    {
        $adresselivraison = new Adresselivraison();
        $form = $this->createForm(AdresselivraisonType::class, $adresselivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adresselivraisonRepository->add($adresselivraison);
            return $this->redirectToRoute('app_adresselivraison_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adresselivraison/new.html.twig', [
            'adresselivraison' => $adresselivraison,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_adresselivraison_show", methods={"GET"})
     */
    public function show(Adresselivraison $adresselivraison): Response
    {
        return $this->render('adresselivraison/show.html.twig', [
            'adresselivraison' => $adresselivraison,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_adresselivraison_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Adresselivraison $adresselivraison, AdresselivraisonRepository $adresselivraisonRepository): Response
    {
        $form = $this->createForm(AdresselivraisonType::class, $adresselivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adresselivraisonRepository->add($adresselivraison);
            return $this->redirectToRoute('app_adresselivraison_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adresselivraison/edit.html.twig', [
            'adresselivraison' => $adresselivraison,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_adresselivraison_delete", methods={"POST"})
     */
    public function delete(Request $request, Adresselivraison $adresselivraison, AdresselivraisonRepository $adresselivraisonRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adresselivraison->getId(), $request->request->get('_token'))) {
            $adresselivraisonRepository->remove($adresselivraison);
        }

        return $this->redirectToRoute('app_adresselivraison_index', [], Response::HTTP_SEE_OTHER);
    }
}
