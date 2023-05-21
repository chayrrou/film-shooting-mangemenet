<?php

namespace App\Form;

use App\Entity\SocieteDeProduction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocieteDeProductionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'attr' => [
                    'placeholder' => 'Nom Societe de production']
                ])
            ->add('adresse', null, [
                'attr' => [
                    'placeholder' => 'Adresse de societe de production']
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SocieteDeProduction::class,
        ]);
    }
}
