<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AdresslivType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('email')
            // ->add('password')
            ->add('nom',TextType::class)
            ->add('Prenom',TextType::class)
            ->add('adresse',TextType::class)
            ->add('cp',NumberType::class)
            ->add('ville',TextType::class)
            // ->add('adressfact')
            // ->add('cpfact')
            // ->add('villefact')
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
