<?php

namespace Apartamentos\ApartamentosBundle\Form;
use Apartamentos\ApartamentosBundle\Controller\GlobalfunctionsController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddApartmentFieldSubscriber;
use Apartamentos\ApartamentosBundle\Form\EventListener\AddTowerforApartmentSubscriber;

class ReservationType extends AbstractType
{
    public function __construct(GlobalfunctionsController $globalfunctions)
    {
        $this->globalfunctions = $globalfunctions;
    }

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
            ->add('reservationdate','date',array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'required' =>false,
                'label' =>'Fecha de reserva',
                'attr' => array('class' => 'date')
            ))
            ->add('hourfrom',"choice", array(
                "label"=>"Hora desde",
                'required' =>false,
                'choices'   => $this->arrayhours('reservehours'),
                'empty_value' => 'Seleccione una hora',

            ))
            ->add('hourto',"choice", array(
                "label"=>"Hora hasta",
                'required' =>false,
                'choices'   => $this->arrayhours('reservehours'),
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

    public function arrayhours($name)
    {

        $arrayhours = $this->globalfunctions->getmultipleparambyname($name);

        return $arrayhours ;

    }

    public function reservereasons()
    {
        $reservereasons=$this->globalfunctions->getcausesbycausetype('Reserva');
      return $reservereasons;

    }


}
