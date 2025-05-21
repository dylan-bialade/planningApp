<?php
namespace App\Form;

use App\Entity\Groupe;
use App\Entity\Personnel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('age', IntegerType::class)
            ->add('heuresMensuelles', IntegerType::class, [
                'label' => 'Heures mensuelles',
            ])
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'Titulaire'   => 'titulaire',
                    'Intérimaire' => 'interimaire',
                    'Alternant'   => 'alternant',
                    'Stagiaire'   => 'stagiaire',
                ],
            ])
            ->add('typeContrat', ChoiceType::class, [
                'choices' => [
                    'CDI'           => 'CDI',
                    'CDD'           => 'CDD',
                    'Temps plein'   => 'Temps plein',
                    'Temps partiel' => 'Temps partiel',
                ],
            ])
            ->add('groupe', EntityType::class, [
                'class'       => Groupe::class,
                'choice_label'=> 'nom',
                'label'       => 'Groupe',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnel::class,
        ]);
    }
}
