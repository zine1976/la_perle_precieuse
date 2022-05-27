<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [

         
            TextField::new('Nom'),
            NumberField::new('Stock'),
            NumberField::new('Prix'),
            NumberField::new('qte'),
            NumberField::new('Taux_tva'),
          
            TextField::new('noteDeFond'),
            TextField::new('noteDeCoeur'),
            TextField::new('noteDeTete'),

            TextField::new('caractere'),
            TextEditorField::new('description'),
            ImageField::new('image')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
    
        ];
    }
    
}
