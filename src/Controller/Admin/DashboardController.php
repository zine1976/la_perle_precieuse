<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Repository\CommandeRepository;
use App\Repository\ProduitRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use ProxyManager\ProxyGenerator\ValueHolder\MethodGenerator\Constructor;

class DashboardController extends AbstractDashboardController
{

    protected $userRepository;
    protected $commandeRepository;
    protected $produitRepository;

    public function __construct(
        UserRepository $userRepository,
        CommandeRepository $commandeRepository,
        ProduitRepository $produitRepository
    ) {
        $this->userRepository = $userRepository;
        $this->commandeRepository = $commandeRepository;
        $this->produitRepository = $produitRepository;
    }



    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'countUser' => $this->userRepository->countAllUser(),
            'countCommande' => $this->commandeRepository->countAllCommande(),
            'produits' => $this->produitRepository->findAll()
        ]);
        // return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('La Perle Precieuse');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Produit', 'fas fa-list', Produit::class);
        yield MenuItem::linkToCrud('Commande', 'fas fa-list', Commande::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);

        yield MenuItem::linkToRoute('back to the site', 'fa fa-home', 'app_accueil');

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
