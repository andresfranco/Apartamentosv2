<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           

             ->add('postdate','date',array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'required' =>false,
                'label' =>'Fecha del Reclamo',
                'attr' => array('class' => 'date')
            ))
            ->add('status',"choice", array(
                "label"=>"Estado",
                'required' =>false,
                'choices'   => array("A"=>"Activo","I"=>"Inactivo"),
                'empty_value' => false

            ))
             ->add('title',"text", array(
                "label"=>"Título",
                'required' =>false
            ))
             ->add('content',"textarea", array(
                "label"=>"Contenido",
                'required' =>false
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Post'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_post';
    }
}
