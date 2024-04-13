<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Import EntityType
use App\Entity\Evenement;
use App\Entity\User;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombreplace')
            ->add('nom_user')
            ->add('prenom_user')
            ->add('age')
            
          // Replace the id_event field with EntityType
          ->add('id_event', EntityType::class, [
            'class' => Evenement::class,
            'choice_label' => 'nom_event', // Adjust to the property of Evenement you want to display
            // Add more options as needed
        ])
        ->add('id_user', EntityType::class, [
            'class' => User::class,
            'choice_label' => 'nom', // Adjust to the property of User you want to display
            // Add more options as needed
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
