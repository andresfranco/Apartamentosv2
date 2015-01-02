<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConstCompanyType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',"text", array(
                    "label"=>"nombre",
                    'required' =>false
                    ))  
            ->add('address',"text", array(
                    "label"=>"dirección",
                    'required' =>false
                    ))
            ->add('phone',"text", array(
                    "label"=>"teléfono",
                    'required' =>false
                    ))
           ->add('email',"text", array(
                    "label"=>"Email",
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
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\ConstCompany'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_constcompany';
    }
}
