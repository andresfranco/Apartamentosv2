<?php

namespace Login\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SysparamType extends AbstractType
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
                'attr'=>array("maxlength"=>'45')
            ))
            ->add('value',"text", array(
                "label"=>"Valor",
                "required"=>false,
                'attr'=>array("maxlength"=>'200')
            ))
            ->add('description',"text", array(
                "label"=>"Descripción",
                "required"=>false,
                'attr'=>array("maxlength"=>'255')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Login\LoginBundle\Entity\Sysparam'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'login_loginbundle_sysparam';
    }
}
