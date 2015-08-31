<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReservecalendarType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('start')
            ->add('end')
            ->add('url')
            ->add('allday')
            ->add('createuser')
            ->add('modifyuser')
            ->add('createdate')
            ->add('modifydate')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Reservecalendar'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_reservecalendar';
    }
}
