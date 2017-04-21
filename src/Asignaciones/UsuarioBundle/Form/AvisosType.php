<?php

namespace Asignaciones\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AvisosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('descripcion')
            ->add('estado')
            ->add('fecha_creacion')
            ->add('fecha_actualizacion')
            ->add('username')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Asignaciones\UsuarioBundle\Entity\Avisos'
        ));
    }

    public function getName()
    {
        return 'avisos';
    }
}
