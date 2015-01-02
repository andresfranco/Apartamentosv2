<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddTowerFieldSubscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddApartmentFieldSubscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddTowerFieldSuscriber;
class ResidentType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $propertyPathToApartment='apartmentid';
        $propertyPathToTower='towerid';
        $towerid= $builder->getData()->getTowerid();
         if ($builder->getData()->getId()) 
         { 
       $towerid=$builder->getData()->getTowerid();       
       $id=$builder->getData()->getTowerid()->getCompanyid();
       $builder->add('companyid','entity', array(
                 'class' => 'ApartamentosApartamentosBundle:Company',
                 'property' => 'name',
                  'label'=>'Condominio',
                  'empty_value' => 'Seleccione un condominio',
                  'data' => $id
                 
                   ))
       
      ->add('towerid','entity', array(
                 'class' => 'ApartamentosApartamentosBundle:Tower',
                 'property' => 'name',
                  'label'=>'Torre',
                  'empty_value' => 'Seleccione una torre',
                  'required' =>false,
                  'data' => $towerid,
                  'query_builder' => function (EntityRepository $repository) use ($id) {
                $qb = $repository->createQueryBuilder('tower')
                    ->innerJoin('tower.companyid', 'company')
                    ->where('company.id = :companyid ')
                    ->setParameter('companyid', $id)
                        
                ;
 
                return $qb;
            }
                   )) ; 
       
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
                   )); 
                
                  
        }
             $builder->addEventSubscriber(new AddTowerFieldSuscriber($propertyPathToTower)) 
                      ->addEventSubscriber(new AddApartmentFieldSubscriber($propertyPathToApartment))       
             ->add('idnumber',"text", array(
                    "label"=>"Número de identificación",
                    'required' =>false,
                    ))    
            ->add('name',"text", array(
                    "label"=>"nombre",
                    'required' =>false,
                    ))
             ->add('idnumbertype','choice', array(
                    "label"=>"Tipo de identificación",
                    'choices' => array('Cedula' => 'cédula', 'Pasaporte' => 'Pasaporte', 'Otros' => 'Otros'),
                    'empty_value' => 'Seleccione un tipo de identificación',
                    'required' =>false,
                    ))
             ->add('holder', 'choice', array(
                    'choices' => array(
                    'S' => 'SI',
                    'N' => 'NO'
                   ),
                   "label"=>"¿Es titular?",
                   'required'    => false,
                   'empty_value' => false
                  ))
            
            ->add('email',"text", array(
                    "label"=>"Email",
                    'required' =>false,
                    ))
            ->add('phone',"text", array(
                    "label"=>"teléfono",
                    'required' =>false,
                    ))
             ->add('residenttypeid', 'entity', array(
                  'class' => 'ApartamentosApartamentosBundle:Residenttype',
                  'property' => 'type',
                  'empty_value' => 'Seleccione un tipo de residente',
                  'label'=>'Tipo de residente' ,
                  'required' =>false
                   ))
             
                
            // ->addEventSubscriber(new AddTowerFieldSubscriber($propertyPathToApartment))
              
            /*->add('apartmentid', 'entity', array(
                  'class' => 'ApartamentosApartamentosBundle:Apartment',
                  'property' => 'number',
                  'label'=>'Apartamento',
                  'empty_value' => 'Seleccione un apartamento', 
                  'required' =>false
                   ))*/
                
             
           
           
          ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Resident'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_resident';
    }
}
