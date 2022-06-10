<?php

namespace App\Controller\Admin;

use App\Entity\Adresselivraison;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdresselivraisonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adresselivraison::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
