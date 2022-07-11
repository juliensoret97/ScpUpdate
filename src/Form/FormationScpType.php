<?php

namespace App\Form;

use App\Entity\FormationScp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FormationScpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre de la formation',
                'attr' => [
                    'placeholder' => 'Tapez le Titre Professionel'
                ]
            ])
            ->add('info', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Tapez une description du titre professionel'
                ]
            ])
            ->add('plaquette', TextType::class, [
                'label' => 'Plaquette',
                'attr' => [
                    'placeholder' => 'Tapez le nom du pdf de la plaquette'
                ]
            ])
            ->add('planning', TextType::class, [
                'label' => 'Planning',
                'attr' => [
                    'placeholder' => 'Tapez le nom du pdf du planning'
                ]
            ])
            ->add('prerequis', TextType::class, [
                'label' => 'Prérequis',
                'attr' => [
                    'placeholder' => 'Tapez le prérequis du titre professionel'
                ]
            ])
            ->add('dureeFormation', TextType::class, [
                'label' => 'Durée de la formation',
                'attr' => [
                    'placeholder' => 'Tapez la durée de la formation'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FormationScp::class,
        ]);
    }
}
