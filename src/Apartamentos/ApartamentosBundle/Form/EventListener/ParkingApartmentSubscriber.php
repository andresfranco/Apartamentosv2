<?php

namespace Apartamentos\ApartamentosBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Apartamentos\ApartamentosBundle\Entity\Apartment;
 
class ParkingApartmentSubscriber implements EventSubscriberInterface
{
    private $propertyPathToApartment;
 
    public function __construct($propertyPathToApartment)
    {
        $this->propertyPathToApartment = $propertyPathToApartment;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }
 
    private function addApartmentForm($form, $towerid,$apartment=null)
    {
        $formOptions = array(
            'class'         => 'ApartamentosApartamentosBundle:Apartment',
            'empty_value'   => 'Seleccione un apartamento',
            'property'      =>'number',
            'label'         => 'Apartamento',
            'required' =>false,
            'attr'          => array(
                'class' => 'apartment_selector',
            ),
            'query_builder' => function (EntityRepository $repository) use ($towerid) {
                $qb = $repository->createQueryBuilder('apartment')
                    ->innerJoin('apartment.towerid', 'tower')
                    ->where('tower.id = :towerid')
                    ->setParameter('towerid', $towerid)
                ;
 
                return $qb;
            }
        );
        
        if ($apartment) {
            $formOptions['data'] = $apartment;
        }
       $form->add('apartmentid', 'entity', $formOptions);
        }
 
      
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $accessor = PropertyAccess::getPropertyAccessor();
 
        $apartment      = $accessor->getValue($data, $this->propertyPathToApartment);
        $towerid = ($apartment) ? $apartment->getTowerid() : null;
 
        $this->addApartmentForm($form,$towerid,$apartment);
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        if (null === $data) {
            return;
        }
        $towerid = array_key_exists('towerid', $data) ? $data['towerid'] : null;
        $this->addApartmentForm($form, $towerid );
    }
}
