<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddTowerFieldSuscriber;
use Doctrine\ORM\EntityRepository;

class ApartmentType extends AbstractType
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
                  'mapped'=>'false',
                  'data' => $id
                 
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
                   )) ;
                
                  
        }  
             $builder->addEventSubscriber(new AddTowerFieldSuscriber($propertyPathToTower))
             
            ->add('number',"text", array(
                    "label"=>"Número de apartamento",
                    'required' =>false,
                    ))
            ->add('phone',"text", array(
                    "label"=>"Numero de teléfono",
                    'required' =>false, 
                    ))
            ->add('area',"text", array(
                    "label"=>"Area",
                    'required' =>false,    
                ))
            ->add('numberresidents',"text", array(
                    "label"=>"Cantidad de residentes",
                    'required' =>false,
                    ))
            ->add('floornumber',"text", array(
                    "label"=>"Número de piso",
                    'required' =>false,
                    ))
            ->add('rooms',"text", array(
                    "label"=>"Cantidad de habitaciones",
                    'required' =>false,
                    ))
            
                 ->add('hasmade', 'choice', array(
                  "label"=>"¿Tiene empleada?",   
                  'choices' => array(
                   'N' => 'NO',
                   'S' => 'SI'
                   
                      )
                    ))
                ->add('hasbabysitting', 'choice', array(
                  "label"=>"¿Tiene niñera?",   
                  'choices' => array(
                   'N' => 'NO',
                   'S' => 'SI'
                   
                      )))
                
                ->add('haspet', 'choice', array(
                  "label"=>"¿Tiene mascotas?",   
                  'choices' => array(
                   'N' => 'NO',
                   'S' => 'SI'
                      )))
                ->add('petkind',"text", array(
                    "label"=>"Tipo de mascota",
                    'required' =>false,
                    ))
                 ->add('petnumber',"text", array(
                    "label"=>"Cantidad de mascotas",
                     'required' =>false,
                    ))
                ->add('hasmaderoom', 'choice', array(
                  "label"=>"¿Tiene cuarto de empleada?",   
                  'choices' => array(
                   'N' => 'NO',
                   'S' => 'SI'
                   
                      )))
                ->add('haskids', 'choice', array(
                  "label"=>"¿Hay niños viviendo ahi?",   
                  'choices' => array(
                   'N' => 'NO',
                   'S' => 'SI'
                   
                      )))
                 ->add('numberofkids',"text", array(
                    "label"=>"Cantida de niños",
                     'required' =>false,
                    ))
                 
        ;
        
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Apartment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_apartment';
    }
    public function getCompanyid()
    {
        
        
    }        
}
