<?php

namespace Login\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ChangepasswordType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
     $builder->add('password', 'repeated', array(
    'type' => 'password',
    'invalid_message' => 'changepassword.message',
    'options' => array('attr' => array('class' => 'password-field')),
    'required' => false,
    'first_options'  => array('label' => 'Contraseña'),
    'second_options' => array('label' => 'Confirmar Contraseña'),
     ));
        
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
    

}

