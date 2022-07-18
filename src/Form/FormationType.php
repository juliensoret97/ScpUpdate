<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\FormationScp;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Tapez votre nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Tapez votre prénom'
                ]
            ])
            ->add('numero',IntegerType::class, [
                'label' => 'Numéro',
                'attr' => [
                    'placeholder' => 'Tapez votre numéro de téléphone'
                ]
            ])
            ->add('email',TextType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Tapez votre email'
                ]
            ])
            ->add('formationScp', EntityType::class, [
                'label' => 'Choix de la formation',
                'placeholder' => '-- Choisir votre formation --',
                'class' => FormationScp::class,
                'choice_label' => function (FormationScp $formationScp){
                    return strtoupper($formationScp->getTitre());
                }
            ]
            )
            ->add('accepter', CheckboxType::class, ['mapped' => false,
                // 'label' => "<a href='{{asset ('pdf/politique.pdf')}}'>Politique de conf</a>",
            ])
            ->addEventListener(FormEvents::PRE_SUBMIT, function (
                FormEvent $event
            ) {
                $personne = $event->getData();
                if (!isset($personne['accepter']) || !$personne['accepter']) {
                    exit();
                }
            });
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
