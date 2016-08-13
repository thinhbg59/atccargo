<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class)
            ->add('plainPassword', RepeatedType::class, array(
                'type'     => \Symfony\Component\Form\Extension\Core\Type\PasswordType::class,
                'required' => true,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ChangePassword'
        ));
    }

    public function getName()
    {
        return 'app_bundle_password_type';
    }
}
