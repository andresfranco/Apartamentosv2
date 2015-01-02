<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
class ExpenseInvoiceType extends AbstractType
{
      
 private $expid;

    public function __construct($expid = null)
    {
        $this->expid = $expid;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $expenseid = $this->expid;
        
        $builder
                
           ->add('expenseid','entity',array(
                'class' => 'ApartamentosApartamentosBundle:Expense',
                'query_builder' => function(EntityRepository $er)use($expenseid) {
      return $er->createQueryBuilder('c')
                ->Where('c.id=?1')
                ->setParameter(1, $expenseid);
              
      },        
                'required' =>true , 
                'property' =>'description',
                'label' =>'Descripción del gasto'
                ))    
            ->add('description',"text",array("label"=>"Descripción",
                    'required' =>false))
            ->add('name',"text",array("label"=>"Nombre",
                    'required' =>false))
           ->add('file',"file", array(
                    "label"=>"Archivo",
                    'required' =>false
                    ))
           
        ;
      
      
      
    }
    
  
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\ExpenseInvoice'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_expenseinvoice';
    }
    
    
}
