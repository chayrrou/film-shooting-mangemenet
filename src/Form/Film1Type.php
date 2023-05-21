<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FileType;
class Film1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', null, [
                'attr' => [
                    'placeholder' => 'Titre']
                ])
            ->add('photo',FileType::class,[
                'mapped'=>false,
                'attr' => ['class' => 'custom-file-input']
            ])
            ->add('genre', null, [
                'attr' => [
                    'placeholder' => 'Genre : action-horror-comedie..']
                ])
            ->add('langue', null, [
                'attr' => [
                    'placeholder' => 'language']
                ])
            ->add('typeDeTournage', null, [
                'attr' => [
                    'placeholder' => 'Movie-Serie']
                ])
            ->add('societeDeProduction')
            ->add('realisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
