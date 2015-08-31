<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsercommentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content')
            ->add('status')
            ->add('commentdate')
            ->add('createdate')
            ->add('createuser')
            ->add('modifydate')
            ->add('modifyuser')
            ->add('userid')
            ->add('postid')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Usercomment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_usercomment';
    }
}
