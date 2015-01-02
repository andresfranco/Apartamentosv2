<?php

namespace Apartamentos\ApartamentosBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Apartamentos\ApartamentosBundle\Entity\Apartment;

class AddResidentFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToResident;
 
    public function __construct($propertyPathToResident)
    {
        $this->propertyPathToResident = $propertyPathToResident;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }
 
    private function addResidentForm($form, $apartmentid)
    {
        $formOptions = array(
            'class'         => 'ApartamentosApartamentosBundle:Resident',
            'empty_value'   => 'Seleccione un propietario',
            'required' => false,  
            'property'      =>'name',
            'label'         => 'Propietario',
            'attr'          => array(
            'class' => 'resident_selector',
            
            ),
            'query_builder' => function (EntityRepository $repository) use ($apartmentid) {
                $qb = $repository->createQueryBuilder('resident')
                    ->innerJoin('resident.apartmentid', 'apartment')
                    ->where('apartment.id = :apartmentid')
                    ->setParameter('apartmentid', $apartmentid)
                ;
 
                return $qb;
            }
        );
 
       $form->add($this->propertyPathToResident, 'entity', $formOptions);
        }
 
      
 
    public function preSetData(FormEvent $event)
    {
       $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $accessor = PropertyAccess::getPropertyAccessor();
 
        $resident       = $accessor->getValue($data, $this->propertyPathToResident);
        $apartment    = ($resident) ? $resident->getApartmentid() : null;
       // $companyid = ($tower) ? $tower->getCompanyid() : null;
 
        $this->addResidentForm($form,$apartment);
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        if (null === $data) {
            return;
        }
        $apartmentid = array_key_exists('apartmentid', $data) ? $data['apartmentid'] : null;
        $this->addResidentForm($form, $apartmentid);
    }
}

