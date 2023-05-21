<?php

namespace App\Form;

use App\Entity\Tournage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TournageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('dateDebut', null, [
            'attr' => [
                'placeholder' => 'Date de début -> DD-MM-YYYY'
            ]
        ])
        ->add('dateFin', null, [
            'attr' => [
                'placeholder' => 'Date de fin -> DD-MM-YYYY'
            ]
        ])
            ->add('film')
            ->add('lieu')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tournage::class,
        ]);
    }
}
