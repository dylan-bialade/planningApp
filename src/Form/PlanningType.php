<?php

namespace App\Form;

use App\Entity\Planning;
use App\Entity\Personnel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDebut', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('dateFin', DateTimeType::class, [
                'widget' => 'single_text',
            ])
            ->add('personnel', EntityType::class, [
                'class' => Personnel::class,
                'choice_label' => function ($personnel) {
                    return $personnel->getPrenom() . ' ' . $personnel->getNom();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Planning::class,
        ]);
    }
}
