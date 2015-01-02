<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Apartamentos\ApartamentosBundle\Form\EventListener\ParkingTowerSubscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\ParkingApartmentSubscriber;
class ParkingType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
       $propertyPathToApartment='apartmentid';
       $compayidoptions=$this->setcompanyidoptions($builder);
       
        $builder
         ->add('companyid','entity',$compayidoptions)      
         ->addEventSubscriber(new ParkingTowerSubscriber($propertyPathToApartment))    
         ->addEventSubscriber(new ParkingApartmentSubscriber($propertyPathToApartment)) 
        
                
             ->add('number',"text", array(
                    "label"=>"Número de estacionamiento",
                    'required' =>false,
                    )) 
             ->add('locationid', 'entity', array(
                  'class' => 'ApartamentosApartamentosBundle:Location',
                  'empty_value' => 'Seleccione una localización', 
                  'property' => 'location',
                  'label'=>'Localización', 
                  'required' =>false
                  )) 
             ->add('type','choice', array(
                    "label"=>"Tipo de Estacionamiento",
                    'choices' => array('Propio' => 'Propio', 'Alquilado' => 'Alquilado', 'Prestado' => 'Prestado'),
                    'required' =>false,
                    'empty_value' => 'Seleccione un Tipo'
                    ))
           
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Parking'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_parking';
    }
    
     public function setcompanyidoptions($builder)
    {
     $compayidoptions=array();   
     if ($builder->getData()->getId()) 
         {   
       $id=$builder->getData()->getApartmentid()->getTowerid()->getCompanyid();
       $compayidoptions =array(
                 'class' => 'ApartamentosApartamentosBundle:Company',
                 'property' => 'name',
                  'label'=>'Condominio',
                  'empty_value' => 'Seleccione un condominio',
                  'data' => $id
                 
                   );
       
        }
        else
        {
          $compayidoptions =array(
                 'class' => 'ApartamentosApartamentosBundle:Company',
                 'property' => 'name',
                  'label'=>'Condominio',
                  'mapped' => false,
                  'empty_value' => 'Seleccione un condominio',
                  'required'=>false
                   );
                  
        }
        return $compayidoptions;
    }
}
