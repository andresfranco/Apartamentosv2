<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Apartamentos\ApartamentosBundle\Form\EventListener\VehicleTowerSubscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\VehicleApartmentSubscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddResidentFieldSubscriber;
use Doctrine\ORM\EntityRepository;

class VehicleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $propertyPathToResident='residentid';
       $compayidoptions=$this->setcompanyidoptions($builder);
        $builder
         ->add('companyid','entity',$compayidoptions)      
         ->addEventSubscriber(new VehicleTowerSubscriber($propertyPathToResident))    
         ->addEventSubscriber(new VehicleApartmentSubscriber($propertyPathToResident))       
         ->addEventSubscriber(new AddResidentFieldSubscriber($propertyPathToResident))      
         ->add('platenumber',"text", array(
                    "label"=>"Número de Placa",
                    'required' =>false
                    ))
         ->add('residentid', 'entity', array(
        'class' => 'ApartamentosApartamentosBundle:Resident',
        'property' =>'name',
        'required' => false,
        'label' =>'Propietario'                 
              
       ))    
        ->add('type', 'choice', array(
                  "label"=>"Tipo",   
                  'choices' => array(
                   'Carro' => 'Carro',
                   'Moto' => 'Moto',
                   'Bicicleta' => 'Bicicleta',
                    'Otro' => 'Otro',
                   
                      )
                    ))
       
        ->add('brandid', 'entity', array(
        'class' => 'ApartamentosApartamentosBundle:Brand',
        'property' =>'brand',
        'required' => false,
        'label' =>'Marca',
        'empty_value' => 'Seleccione una marca',           
               
         ))   
               
         ->add('colorid', 'entity', array(
        'class' => 'ApartamentosApartamentosBundle:Color',
        'property' =>'color',
        'required' => false,
        'label' =>'Color',
        'empty_value' => 'Seleccione un color',           
               
        ))
               
        ->add('parkingid', 'entity', array(
        'class' => 'ApartamentosApartamentosBundle:Parking',
        'property' =>'number',
        'required' => false,
        'label' =>'Estacionamiento'                 
        ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Vehicle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_vehicle';
    }
    
    public function setcompanyidoptions($builder)
    {
     $compayidoptions=array();   
     if ($builder->getData()->getId()) 
         {   
       $id=$builder->getData()->getResidentid()->getTowerid()->getCompanyid();
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
