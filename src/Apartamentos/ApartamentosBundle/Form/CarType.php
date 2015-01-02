<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddTowerFieldSubscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddApartmentFieldSubscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddTowerFieldSuscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddResidentFieldSubscriber; 
use Doctrine\ORM\EntityRepository;

class CarType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $propertyPathToResident='residentid';
       $propertyPathToApartment='apartmentid';
        $propertyPathToTower='companyid';
        $towerid= $builder->getData()->getTowerid();
         if ($builder->getData()->getId()) 
         {
       $apartmentid=$builder->getData()->getApartmentid();  
       $residentid=$builder->getData()->getResidentid();
       $towerid=$builder->getData()->getApartmentid()->getTowerid();       
       $id=$builder->getData()->getApartmentid()->getTowerid()->getCompanyid();
       $builder->add('companyid','entity', array(
                 'class' => 'ApartamentosApartamentosBundle:Company',
                 'property' => 'name',
                  'label'=>'Condominio',
                  'empty_value' => 'Seleccione un condominio',
                  'mapped'=>'false',
                  'data' => $id
                 
                   ))
       
      ->add('towerid','entity', array(
                 'class' => 'ApartamentosApartamentosBundle:Tower',
                 'property' => 'name',
                  'label'=>'Torre',
                  'empty_value' => 'Seleccione una torre',
                  'required' =>false,
                  'data' => $towerid,
                  'mapped'=>'false',
                  'query_builder' => function (EntityRepository $repository) use ($id) {
                $qb = $repository->createQueryBuilder('tower')
                    ->innerJoin('tower.companyid', 'company')
                    ->where('company.id = :companyid ')
                    ->setParameter('companyid', $id)
                        
                ;
 
                return $qb;
            }
                   )) 
            
      ->add('apartmentid','entity', array(
                 'class' => 'ApartamentosApartamentosBundle:Apartment',
                 'property' => 'number',
                  'label'=>'Apartamentos',
                  'empty_value' => 'Seleccione un apartamento',
                  'required' =>false,
                  'data' => $apartmentid,
                  'query_builder' => function (EntityRepository $repository) use ($towerid) {
                $qb = $repository->createQueryBuilder('apartment')
                    ->innerJoin('apartment.towerid', 'tower')
                    ->where('tower.id = :towerid')
                    ->setParameter('towerid', $towerid)
                ;
 
                return $qb;
            }
                   ))       
         ->add('residentid','entity',array(
            'class'         => 'ApartamentosApartamentosBundle:Resident',
            'empty_value'   => 'Seleccione un Propietario',
            'required' => false,  
            'property'      =>'name',
            'label'         => 'Propietario',
            'data'=>$residentid,  
            

            'query_builder' => function (EntityRepository $repository) use ($apartmentid) {
                $qb = $repository->createQueryBuilder('resident')
                    ->innerJoin('resident.apartmentid', 'apartment')
                    ->where('apartment.id = :apartmentid')
                    ->setParameter('apartmentid', $apartmentid)
                ;
 
                return $qb;
            }
        ));
       
        }
        else
        {
          $builder->add('companyid','entity', array(
                 'class' => 'ApartamentosApartamentosBundle:Company',
                 'property' => 'name',
                  'label'=>'Condominio',
                  'mapped' => false,
                  'empty_value' => 'Seleccione un condominio',
                  'required'=>false
                   )) 
               ->addEventSubscriber(new AddTowerFieldSuscriber($propertyPathToTower))
               ->addEventSubscriber(new AddApartmentFieldSubscriber($propertyPathToApartment))
               ->addEventSubscriber(new AddResidentFieldSubscriber($propertyPathToResident));
                  
        }
           
            $builder->add('platenumber',"text", array(
                    "label"=>"Número de Placa",
                    'required' =>false
                    ))
               ->add('brandid', 'entity', array(
        'class' => 'ApartamentosApartamentosBundle:Brand',
        'property' =>'brand',
        'required' => false,
        'label' =>'Marca',
        'empty_value' => 'Seleccione una Marca',           
               
))   
               ->add('colorid', 'entity', array(
        'class' => 'ApartamentosApartamentosBundle:Color',
        'property' =>'color',
        'required' => false,
        'label' =>'Color',
        'empty_value' => 'Seleccione un Color',           
               
))
             
                
      /*         ->add('residentid', 'entity', array(
        'class' => 'ApartamentosApartamentosBundle:Resident',
        'property' =>'name',
        'required' => false,
        'label' =>'Propietario'                 
              
))    */    
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
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Car'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_car';
    }
}
