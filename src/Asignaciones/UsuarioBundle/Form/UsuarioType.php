<?php

namespace Asignaciones\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password', 'password')
            ->add('salt')
            ->add('nombre')
            ->add('apellido')
            ->add('email', 'email')
            ->add('role', 'choice', array('choices' => array('ROLE_ADMIN' => 'Administrador', 'ROLE_USER' => 'Usuario')))
            ->add('esta_activo', 'checkbox')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Asignaciones\UsuarioBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'usuario';
    }
}
