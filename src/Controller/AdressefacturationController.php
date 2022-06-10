<?php

namespace App\Controller;

use App\Entity\Adressefacturation;
use App\Form\AdressefacturationType;
use App\Repository\AdressefacturationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adressefacturation")
 */
class AdressefacturationController extends AbstractController
{
    /**
     * @Route("/", name="app_adressefacturation_index", methods={"GET"})
     */
    public function index(AdressefacturationRepository $adressefacturationRepository): Response
    {
        return $this->render('adressefacturation/index.html.twig', [
            'adressefacturations' => $adressefacturationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_adressefacturation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AdressefacturationRepository $adressefacturationRepository): Response
    {
        $adressefacturation = new Adressefacturation();
        $form = $this->createForm(AdressefacturationType::class, $adressefacturation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adressefacturationRepository->add($adressefacturation);
            return $this->redirectToRoute('app_adressefacturation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adressefacturation/new.html.twig', [
            'adressefacturation' => $adressefacturation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_adressefacturation_show", methods={"GET"})
     */
    public function show(Adressefacturation $adressefacturation): Response
    {
        return $this->render('adressefacturation/show.html.twig', [
            'adressefacturation' => $adressefacturation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_adressefacturation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Adressefacturation $adressefacturation, AdressefacturationRepository $adressefacturationRepository): Response
    {
        $form = $this->createForm(AdressefacturationType::class, $adressefacturation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adressefacturationRepository->add($adressefacturation);
            return $this->redirectToRoute('app_adressefacturation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adressefacturation/edit.html.twig', [
            'adressefacturation' => $adressefacturation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_adressefacturation_delete", methods={"POST"})
     */
    public function delete(Request $request, Adressefacturation $adressefacturation, AdressefacturationRepository $adressefacturationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adressefacturation->getId(), $request->request->get('_token'))) {
            $adressefacturationRepository->remove($adressefacturation);
        }

        return $this->redirectToRoute('app_adressefacturation_index', [], Response::HTTP_SEE_OTHER);
    }
}
