<?php

namespace App\Form;

use App\Entity\Espacepartenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EspacepartenaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Remove the 'id_espace' field
            // Add a field to associate with the 'Espacepartenaire' entity
            ->add('espacepartenaire', EntityType::class, [
                'class' => Espacepartenaire::class,
                'choice_label' => 'nom', // Adjust this according to your entity's property
                // Additional options as needed
            ])
            ->add('nom')
            ->add('localisation')
            ->add('type')
            ->add('photos')
            ->add('description');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Espacepartenaire::class,
        ]);
    }
}
