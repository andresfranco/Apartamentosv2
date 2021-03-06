<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddTowerFieldSuscriber;
use Doctrine\ORM\EntityRepository;

class IncomeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
            $propertyPathToTower='towerid';
       
          if ($builder->getData()->getId()) 
         {      
       $id=$builder->getData()->getTowerid()->getCompanyid();
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
             $builder->addEventSubscriber(new AddTowerFieldSuscriber($propertyPathToTower))
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
              ->add('causeid', 'entity', array(
        'class' => 'ApartamentosApartamentosBundle:Cause',
        'property' =>'cause',
        'required' => false,
        'label' =>'Causa',
        'empty_value' => 'Seleccione una causa',       
             
        'query_builder' => function (EntityRepository $repository){
                $qb = $repository->createQueryBuilder('cause')
                    ->innerJoin('cause.causetypeid', 'causetype')
                    ->where('causetype.id = :causetypeid')
                    ->setParameter('causetypeid', 2) // 2-Ingreso 
                ;
 
                return $qb;
            }            
        ))
         ->add('accountid', 'entity', array(
        'class' => 'ApartamentosApartamentosBundle:Account',
        'property' =>'name',
        'required' => false,
        'label' =>'Cuenta Bancaria',
        'empty_value' => 'Seleccione una cuenta bancaria'       
               
        ))
        ->add('incomedate','date',array(
	            'widget' => 'single_text',
	            'format' => 'dd/MM/yyyy',
                    'required' =>false,
                    'label' =>'Fecha del ingreso',
	            'attr' => array('class' => 'date')
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
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Income'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_income';
    }
}
