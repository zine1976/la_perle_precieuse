<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/user", name="app_user")
     */
    public function index(UserRepository $user): Response
    {
        $users = $user->findAll();

        return $this->render('user/index.html.twig', [
            'user' => $users,
        ]);
    }
     /**
     * @Route("/user/liste", name="app_userliste")
     */
    public function liste(UserRepository $user): Response
    {
        $users = $user->findAll();

        return $this->render('user/liste.html.twig', [
            'user' => $users,
        ]);
    }
}
