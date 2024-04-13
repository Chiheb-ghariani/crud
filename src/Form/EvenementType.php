<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Espacepartenaire;


class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
             // Replace 'id_espace' field with EntityType
             ->add('id_espace', EntityType::class, [
                'class' => Espacepartenaire::class,
                'choice_label' => 'nom', // Adjust to the property of Espacepartenaire you want to display
                // Add more options as needed
            ])
            ->add('nom_event')
            ->add('date_event')
            ->add('capacite')
            ->add('description');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
