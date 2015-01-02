<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddApartmentFieldSubscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddTowerforApartmentSubscriber;

class PaymentType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $propertyPathToApartment='apartmentid';
        if ($builder->getData()->getId()) 
         {      
       $id=$builder->getData()->getApartmentid()->getTowerid()->getCompanyid();
       $builder->add('companyid','entity', array(
                 'class' => 'ApartamentosApartamentosBundle:Company',
                 'property' => 'name',
                  'label'=>'Condominio',
                  'empty_value' => 'Seleccione un condominio',
                  'data' => $id
                 
                   ));
        }
        else
        {
          $builder->add('companyid','entity', array(
                 'class' => 'ApartamentosApartamentosBundle:Company',
                 'property' => 'name',
                  'label'=>'Condominio',
                  'empty_value' => 'Seleccione un condominio',
                  'required'=>false
                   )) ;
                
                  
        }   
           $builder ->addEventSubscriber(new AddTowerforApartmentSubscriber($propertyPathToApartment)) 
            ->addEventSubscriber(new AddApartmentFieldSubscriber($propertyPathToApartment))     
            ->add('paymentdate','date',array(
	            'widget' => 'single_text',
	            'format' => 'dd/MM/yyyy',
                    'required' =>false,
                    'label' =>'Fecha del ingreso',
	            'attr' => array('class' => 'date')
	        )) 
             ->add('amount','text', array(
                    "label"=>"Monto",
                    'required' =>false,
                    ))
              ->add('description','text', array(
                    "label"=>"Descripción",
                    'required' =>false,
                    ))
               ->add('depositor','text', array(
                    "label"=>"Depositante",
                    'required' =>false,
                    ))
              ->add('accountid', 'entity', array(
                    'class' => 'ApartamentosApartamentosBundle:Account',
                    'property' =>'name',
                    'required' => false,
                    'label' =>'Cuenta Bancaria',
                    'empty_value' => 'Seleccione una cuenta bancaria'       
               
                   ))  
             ->add('paymentmethod', 'choice', array(
                    'choices'   => array('Efectivo' => 'Efectivo', 'Cheque' => 'Cheque','Banca en línea' => 'Banca en línea','Tarjeta' => 'Tarjeta'),
                     'required'  => false,
                    'label' =>'Tipo de Pago', 
                    'empty_value' => 'Seleccione un Tipo de pago' 
                  ))     
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Payment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_payment';
    }
    
    
}
