<?php

namespace Login\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class RoleactionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    private $roleid;
    public function __construct($roleid)
    {
        $this->roleid = $roleid;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  
        $roleid=$this->roleid;
        $builder
            ->add('actionid','entity', array(
                  'class' => 'LoginLoginBundle:Action',
                  'property' => 'actionname',
                  'label'=>'Acción',
                  'empty_value' => 'Seleccione una Acción',
                  'required'=>false
                   ))
            ->add('roleid','entity', array(
                 'class' => 'LoginLoginBundle:Role',
                 'property' => 'name',
                  'label'=>'Rol',
                  'required'=>false,
                  'empty_value' => false,
                  'query_builder' => function(EntityRepository $er)use($roleid) {
                  return $er->createQueryBuilder('r')
                  ->Where('r.id =:roleid')
                  ->setParameter('roleid', $roleid); 
                   } 
                   ))    
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Login\LoginBundle\Entity\Roleaction'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'login_loginbundle_roleaction';
    }
}
