<?php

namespace Apartamentos\ApartamentosBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Apartamentos\ApartamentosBundle\Entity\Apartment;
 
class AddApartmentFieldSubscriber implements EventSubscriberInterface
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
 
    private function addApartmentForm($form, $towerid)
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
 
       $form->add($this->propertyPathToApartment, 'entity', $formOptions);
        }
 
      
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $accessor = PropertyAccess::getPropertyAccessor();
 
        $apartment       = $accessor->getValue($data, $this->propertyPathToApartment);
        $tower    = ($apartment) ? $apartment->getTowerid() : null;
       // $companyid = ($tower) ? $tower->getCompanyid() : null;
 
        $this->addApartmentForm($form,$tower);
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        if (null === $data) {
            return;
        }
        $towerid = array_key_exists('towerid', $data) ? $data['towerid'] : null;
        $this->addApartmentForm($form, $towerid);
    }
}
