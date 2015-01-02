<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddTowerFieldSuscriber;
class ProviderType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $propertyPathToTower='towerid';
        $builder
            ->add('companyid','entity', array(
                 'class' => 'ApartamentosApartamentosBundle:Company',
                 'property' => 'name',
                  'label'=>'Condominio',
                  'empty_value' => 'Seleccione un condominio',
                  'required'=>false
                   ));  
            $builder->addEventSubscriber(new AddTowerFieldSuscriber($propertyPathToTower));
            $builder->add('name',"text", array(
                    "label"=>"nombre",
                    'required' =>false
                    ))    
            ->add('phone',"text", array(
                    "label"=>"teléfono",
                    'required' =>false
                    )) 
             ->add('email',"text", array(
                    "label"=>"Email",
                    'required' =>false
                    )) 
             ->add('address',"text", array(
                    "label"=>"dirección",
                    'required' =>false
                    )); 
           
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Provider'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_provider';
    }
}
