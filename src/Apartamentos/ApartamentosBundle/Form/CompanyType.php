<?php

namespace Apartamentos\ApartamentosBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\Util\SecureRandom;

class CompanyType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
   private $globalfunctions;

    public function __construct(\Apartamentos\ApartamentosBundle\Controller\GlobalfunctionsController $globalfunctions)
    {
        $this->globalfunctions = $globalfunctions;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',"text", array(
                    "label"=>"nombre",
                    'required' =>false,
                    'attr' => array('class' => 'large-6 columns')
                    ))
            ->add('phone',"text", array(
                    "label"=>"teléfono",
                    'required' =>false,
                    'attr' => array('class' => 'large-6 columns')
                    ))
            ->add('address',"text", array(
                    "label"=>"dirección",
                    'required' =>false,
                    'attr' => array('class' => 'large-6 columns')
                    ))
            
           
            ->add('email',"text", array(
                    "label"=>"Email",
                    'required' =>false,
                    'attr' => array('class' => 'large-6 columns')
                    ))
            ->add('website',"text", array(
                    "label"=>"Página web",
                    'required' =>false,
                    'attr' => array('class' => 'large-6 columns')
                    ))
            ->add('constCompanyid', 'entity', array(
                  'class' => 'ApartamentosApartamentosBundle:ConstCompany',
                  'property' => 'name',
                  'label'=>'Constructora',
                  
                   ))     
            
        ;
        //Edit Mode
         if ($builder->getData()->getId()) 
         { 
            $builder ->add('companycode',"text", array(
                    "label"=>"código",
                    'required' =>false,
                    'read_only' => true,
                    'attr'=>array('class'=>'readonlytext large-6 columns')
                   
                    ))
                    
                ; // or whatever
            
        }
        //Insert Mode
        else
        {
           $builder ->add('companycode',"text", array(
                    "label"=>"código",
                    'required' =>false,
                    'data'=>$this->globalfunctions->generateCode(),
                    'read_only' => true,
                    'attr'=>array('class'=>'readonlytext large-6 columns')
                    )); // or whatever  
            
        }    
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Company'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_company';
    }
    
     
    
}
