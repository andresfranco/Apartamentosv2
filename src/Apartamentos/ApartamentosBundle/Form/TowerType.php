<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class TowerType extends AbstractType
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
                    "required"=>false,
                    ))
            ->add('email',"text", array(
                    "label"=>"Email",
                    "required"=>false,
                    ))   
            ->add('numberapartments',"text", array(
                    "label"=>"Número de apartamentos",
                    "required"=>false,
                    ))
            ->add('numberstorerooms',"text", array(
                    "label"=>"Número de depósitos",
                    "required"=>false,
                    ))
            ->add('numberparkings',"text", array(
                    "label"=>"Número de estacionamientos",
                    "required"=>false,
                    ))
            ->add('numberaptperfloor',"text", array(
                    "label"=>"Cantidad de apartamentos por piso",
                    "required"=>false,
                    ))
        /* ->add('companyid','entity',array(
                'class' => 'ApartamentosApartamentosBundle:Company',
                'query_builder' => function(EntityRepository $er) {
      return $er->createQueryBuilder('c')
                ->groupBy('c.id')
               ->setMaxResults(1); 
      },        'attr'=>array('style'=>'display:none;'),
                'required' =>true , 
                'property' =>'name',
                'label' =>' '
                ))*/
                ->add('companyid', 'entity', array(
                  'class' => 'ApartamentosApartamentosBundle:Company',
                  'property' => 'name',
                  'label'=>'Condominio',
                  'empty_value' => 'Seleccione un condominio',
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
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Tower'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_tower';
    }
}
