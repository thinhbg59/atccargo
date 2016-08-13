<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startCity', HiddenType::class)
            ->add('endCity', HiddenType::class)
            ->add('startDate', DateTimeType::class, array(
                'widget'      => 'single_text',
                'date_format' => 'y-MM-dd HH:mm:ss'
            ))
            ->add('endDate', DateTimeType::class, array(
                'widget'      => 'single_text',
                'date_format' => 'y-MM-dd HH:mm:ss'
            ))
            ->add('cargo', HiddenType::class)
            ->add('distance', IntegerType::class)
            ->add('weight', IntegerType::class)
            ->add('damage', IntegerType::class)
            ->add('burnedFuel', IntegerType::class)
            ->add('fueledFuel', IntegerType::class)
            ->add('country', HiddenType::class)
            ->add('screenshot', FileType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Transport'
        ));
    }

    public function getName()
    {
        return 'app_bundle_transport_type';
    }
}
