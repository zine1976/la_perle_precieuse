<?php

namespace App\Form;

use App\Entity\Adressefacturation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdressefacturationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('numero')
            ->add('rue')
            ->add('cp')
            ->add('ville')
            ->add('pays')
            ->add('info')
            ->add('societe')
            ->add('tel')
            ->add('nom_prenom')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adressefacturation::class,
        ]);
    }
}
