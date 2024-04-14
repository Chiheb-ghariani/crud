<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Espacepartenaire;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Form\Extension\Core\Type\TextType; // Add this line
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

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
            ->add('date_event' ,TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Date cannot be blank']),
                    new Regex([
                        'pattern' => '/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/(202[4-9]|20[3-9][0-9]|[3-9][0-9]{3})$/',
                        'message' => 'Please enter a valid date in the format dd/mm/yyyy.',
                    ]),
                ],
            ])
             
            
            ->add('capacite', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Range([
                        'min' => 5,
                        'minMessage' => 'The capacity must be at least {{ limit }} persones.',
                    ]),
                ],
            ])
            ->add('description', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'The description should contain only letters.',
                    ]),
                ],
            ])
            
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
