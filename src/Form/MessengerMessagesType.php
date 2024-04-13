<?php

namespace App\Form;

use App\Entity\MessengerMessages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessengerMessagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('body')
            ->add('headers')
            ->add('queueName')
            ->add('createdAt')
            ->add('availableAt')
            ->add('deliveredAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MessengerMessages::class,
        ]);
    }
}
