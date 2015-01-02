<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CauseType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cause',"text", array(
                    "label"=>"Causa",
                    'required' =>false
                    ))
             ->add('causetypeid', 'entity', array(
                    'class' => 'ApartamentosApartamentosBundle:Causetype',
                    'property' =>'causetype',
                    'required' => false,
                    'label' =>'Tipo de causa',
                    'empty_value' => 'Seleccione un tipo de causa'       
               
                    )) 
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Cause'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_cause';
    }
}
