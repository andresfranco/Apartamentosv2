<?php

namespace Login\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('username',"text", array(
                    "label"=>"User Name",
                    "required"=>false,
                    'attr'=>array("maxlength"=>'32')
                    ))
            ->add('name',"text", array(
                    "label"=>"Nombre",
                    "required"=>false,
                    'attr'=>array("maxlength"=>'45')
                    ))
             ->add('email',"text", array(
                    "label"=>"E-Mail",
                    "required"=>false,
                    'attr'=>array("maxlength"=>'60')
                    ))
                  
                  ;
          if ($builder->getData()->getId()) 
         {    
            
         }
         else
         {
          $builder->add('password',"password", array(
                    "label"=>"Password",
                    "required"=>false,
                    'attr'=>array("maxlength"=>'32') 
                    ));   
             
         }    
       /*         ->add('roles', 'entity', array(
        'class' => 'LoginLoginBundle:Role',
        'multiple' => true,
        'expanded' => true,
        'required' => false
               
))*/
          
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
                ))
            */
        $builder->add('companyid', 'entity', array(
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
            'data_class' => 'Login\LoginBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'login_loginbundle_user';
    }
    

   public function configure()
   {
    $companyid=$this->CompanyValue();   
    $this->setDefault ('companyid', $companyid);
  }
}
