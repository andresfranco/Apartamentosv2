<?php

namespace Login\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class UserroleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    private $userid;
    public function __construct($userid)
    {
        $this->userid = $userid;
    }
    
    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $userid=$this->userid;
        $builder
            ->add('roleid','entity', array(
                 'class' => 'LoginLoginBundle:Role',
                 'property' => 'name',
                  'label'=>'Rol',
                  'empty_value' => 'Seleccione un rol',
                  'required'=>false
                   ))
            ->add('userid','entity', array(
                 'class' => 'LoginLoginBundle:User',
                 'property' => 'username',
                  'label'=>'Usuario',
                  'required'=>false,
                  'empty_value' => false,
                  'query_builder' => function(EntityRepository $er)use($userid) {
                  return $er->createQueryBuilder('ru')
                  ->Where('ru.id =:userid')
                  ->setParameter('userid', $userid); 
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
            'data_class' => 'Login\LoginBundle\Entity\Userrole'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'login_loginbundle_userrole';
    }
}
