<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('created_at')
            ->add('day', DateType::class, [
        'label' => 'Jour',
        // 'default' => new \DateTimeImmutable()
        // 'input' => 'datetime_immutable'
        'format' => 'dd-MM-yyyy',
        'widget' => 'single_text',

    // prevents rendering it as type="date", to avoid HTML5 date pickers
    'html5' => false,

    // adds a class that can be selected in JavaScript
    'attr' => ['class' => 'js-datepicker'],
    ])
            ->add('hour', TextType::class, [
        'label' => 'Heure',
    ])
            ->add('description')
            ->add('eventOrder', IntegerType::class, [
        'label' => 'Ordre',
        // défaut
        'data' => 1
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
