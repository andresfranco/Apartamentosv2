<?php

namespace Login\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class MultiparamType extends AbstractType
{
    public function __construct($sysparamid = null)
    {
        $this->sysparamid = $sysparamid;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $sysparamid =$this->sysparamid;
        $builder
            ->add('sysparamid','entity',array(
                'class' => 'LoginLoginBundle:Sysparam',
                'query_builder' => function(EntityRepository $er)use($sysparamid) {
                    return $er->createQueryBuilder('c')
                        ->Where('c.id=?1')
                        ->setParameter(1, $sysparamid);

                },
                'required' =>true,
                'property' =>'name',
                'label' =>'Parametro'
            ))

            ->add('value',"text", array(
                "label"=>"Valor",
                "required"=>false,

            ))
            ->add('description',"text", array(
                "label"=>"Descripción",
                "required"=>false,

            ))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Login\LoginBundle\Entity\Multiparam'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'login_loginbundle_multiparam';
    }
}
