<?php

namespace Login\LoginBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ResidentuserType extends AbstractType
{
    public function __construct($userid = null)
    {
        $this->userid = $userid;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $userid =$this->userid;
        $builder
               ->add('userid','entity', array(
                  'class' => 'LoginLoginBundle:User',
                  'query_builder' => function(EntityRepository $er)use($userid) {
                    return $er->createQueryBuilder('c')
                        ->Where('c.id=?1')
                        ->setParameter(1, $userid);

                }, 
                  'property' => 'username',
                  'label'=>'Usuario',
                  'empty_value' =>false,
                  'required'=>false,
                  'attr' => array('class' => 'large-4')
                   ))
            ->add('residentid','entity', array(
                  'class' => 'ApartamentosApartamentosBundle:Resident',
                  'property' => 'name',
                  'label'=>'Residente',
                  'empty_value' => 'Seleccione un Residente',
                  'required'=>false,
                  'attr' => array('class' => 'large-4')
                   ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Login\LoginBundle\Entity\Residentuser'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'login_loginbundle_residentuser';
    }
}
