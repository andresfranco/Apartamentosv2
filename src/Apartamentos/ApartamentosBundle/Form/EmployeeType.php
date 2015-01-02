<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Apartamentos\ApartamentosBundle\Form\EventListener\MultipleTowerSubscriber;
use Doctrine\ORM\EntityRepository;

class EmployeeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $propertyPathToTower='companyid';
        $builder
             ->add('completename',"text", array(
                    "label"=>"nombre",
                    'required' =>false
                    ))
             ->add('idnumber',"text", array(
                    "label"=>"cédula",
                    'required' =>false
                    ))    
             ->add('salaryamount',"text", array(
                    "label"=>"Salario",
                    'required' =>false,
                    ))   
           
            ->add('position',"text", array(
                    "label"=>"Puesto",
                    'required' =>false,
                    ))
                
            ->addEventSubscriber(new MultipleTowerSubscriber($propertyPathToTower))
                
         /*$builder->add('tower', 'entity', array(
        'class' => 'ApartamentosApartamentosBundle:Tower',
        'property' =>'name',
        'multiple' => true,
        'expanded' => true,
        'required' => false,
        'label' =>'Torres en las que trabaja'                 
               
));*/
        
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
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Employee'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_employee';
    }
}
