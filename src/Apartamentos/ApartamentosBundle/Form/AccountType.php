<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class AccountType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number',"text", array(
                    "label"=>"número",
                    'required' =>false
                    ))    
            ->add('name',"text", array(
                    "label"=>"nombre",
                    'required' =>false
                    ))
             ->add('balance',"text", array(
                    "label"=>"Saldo",
                    'required' =>false
                    ))
             ->add('bankid', 'entity', array(
                  'class' => 'ApartamentosApartamentosBundle:Bank',
                  'property' => 'name',
                  'label'=>'banco',
                  'empty_value' => 'Seleccione un banco',
                  'required'=>false
    
                   ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Account'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_account';
    }
}
