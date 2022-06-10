<?php

namespace App\Controller\Admin;

use App\Entity\Adressefacturation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdressefacturationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adressefacturation::class;
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
