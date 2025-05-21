<?php
// src/Form/IndisponibiliteType.php

namespace App\Form;

use App\Entity\Indisponibilite;
use App\Entity\Personnel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndisponibiliteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('personnel', EntityType::class, [
                'class'       => Personnel::class,
                'choice_label'=> fn(Personnel $p) => $p->getPrenom().' '.$p->getNom(),
                'label'       => 'Personnel'
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label'  => 'Date'
            ])
            ->add('plage', TextType::class, [
                'label' => 'Plage horaire (ex : Matin, 08:00-12:00…)'
            ])
            ->add('raison', TextareaType::class, [
                'required' => false,
                'label'    => 'Raison (facultatif)'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Indisponibilite::class,
        ]);
    }
}
