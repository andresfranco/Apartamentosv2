<?php

namespace Apartamentos\ApartamentosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddApartmentFieldSubscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddTowerforApartmentSubscriber;

class ReservationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $propertyPathToApartment='apartmentid';
        if ($builder->getData()->getId())
        {
            $id=$builder->getData()->getApartmentid()->getTowerid()->getCompanyid();
            $builder->add('companyid','entity', array(
                'class' => 'ApartamentosApartamentosBundle:Company',
                'property' => 'name',
                'label'=>'Condominio',
                'empty_value' => 'Seleccione un condominio',
                'data' => $id

            ));
        }
        else
        {
            $builder->add('companyid','entity', array(
                'class' => 'ApartamentosApartamentosBundle:Company',
                'property' => 'name',
                'label'=>'Condominio',
                'empty_value' => 'Seleccione un condominio',
                'required'=>false
            )) ;


        }
        $builder ->addEventSubscriber(new AddTowerforApartmentSubscriber($propertyPathToApartment))
                 ->addEventSubscriber(new AddApartmentFieldSubscriber($propertyPathToApartment));
        $builder
            ->add('reservename',"text", array(
                "label"=>"Nombre de reserva",
                'required' =>false
            ))
            ->add('reason',"choice", array(
                "label"=>"Motivo",
                'required' =>false,
                'choices'=>$this->reservereasons(),
                'empty_value'=>'Seleccione un motivo'
            ))
            ->add('hourfrom',"choice", array(
                "label"=>"Hora desde",
                'required' =>false,
                'choices'   => $this->arrayhours(),
                'empty_value' => 'Seleccione una hora',

            ))
            ->add('hourto',"choice", array(
                "label"=>"Hora hasta",
                'required' =>false,
                'choices'   => $this->arrayhours(),
                'empty_value' => 'Seleccione una hora',
            ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Apartamentos\ApartamentosBundle\Entity\Reservation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'apartamentos_apartamentosbundle_reservation';
    }

    public function arrayhours()
    {

        return array(
            '00:00'   => '12:00 AM',
            '00:30'   => '12:30 AM',
            '01:00'   => '1:00 AM',
            '01:30'   => '1:30 AM',
            '02:00'   => '2:00 AM',
            '02:30'   => '2:30 AM',
            '03:00'   => '3:00 AM',
            '03:30'   => '3:30 AM',
            '04:00'   => '4:00 AM',
            '04:30'   => '4:30 AM',
            '05:00'   => '5:00 AM',
            '05:30'   => '5:30 AM',
            '06:00'   => '6:00 AM',
            '06:30'   => '6:30 AM',
            '07:00'   => '7:00 AM',
            '07:30'   => '7:30 AM',
            '08:00'   => '8:00 AM',
            '08:30'   => '8:30 AM',
            '09:00'   => '9:00 AM',
            '09:30'   => '9:30 AM',
            '10:00'   => '10:00 AM',
            '10:30'   => '10:30 AM',
            '11:00'   => '11:00 AM',
            '11:30'   => '11:30 AM',
            '12:00'   => '12:00 PM',
            '12:30'   => '12:30 PM',
            '13:00'   => '1:00 PM',
            '13:30'   => '1:30 PM',
            '14:00'   => '2:00 PM',
            '14:30'   => '2:30 PM',
            '15:00'   => '3:00 PM',
            '15:30'   => '3:30 PM',
            '16:00'   => '4:00 PM',
            '16:30'   => '4:30 PM',
            '17:00'   => '5:00 PM',
            '17:30'   => '5:30 PM',
            '18:00'   => '6:00 PM',
            '18:30'   => '6:30 PM',
            '19:00'   => '7:00 PM',
            '19:30'   => '7:30 PM',
            '20:00'   => '8:00 PM',
            '20:30'   => '8:30 PM',
            '21:00'   => '9:00 PM',
            '21:30'   => '9:30 PM',
            '22:00'   => '10:00 PM',
            '22:30'   => '10:30 PM',
            '23:00'   => '11:00 PM',
            '23:30'   => '11:30 PM'

        );

    }

    public function reservereasons()
    {
      return array('socialarea'   => 'Reserva de area social') ;

    }


}
