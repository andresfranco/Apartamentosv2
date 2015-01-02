<?php

namespace Apartamentos\ApartamentosBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Apartamentos\ApartamentosBundle\Entity\Tower;
 
class AddTowerFieldSuscriber implements EventSubscriberInterface
{
    private $propertyPathToTower;
 
    public function __construct($propertyPathToTower)
    {
        $this->propertyPathToTower = $propertyPathToTower;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }
 
    private function addTowerForm($form, $companyid)
    {
         
        
        $formOptions = array(
            'class'         => 'ApartamentosApartamentosBundle:Tower',
            'empty_value'   => 'Seleccione una torre',
            'property'      =>'name',
            'label'         => 'Torre',
            'required' =>false,
            'attr'          => array(
            'class' => 'tower_selector',
            ),
            'query_builder' => function (EntityRepository $repository) use ($companyid) {
                $qb = $repository->createQueryBuilder('tower')
                    ->innerJoin('tower.companyid', 'company')
                    ->where('company.id = :companyid')
                    ->setParameter('companyid', $companyid)
                ;
 
                return $qb;
            }
        );
        
       $form->add('towerid', 'entity', $formOptions);
       
        }
 
      
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $accessor    = PropertyAccess::createPropertyAccessor();
 
        $tower      = $accessor->getValue($data, $this->propertyPathToTower);
        $companyid = ($tower) ? $tower->getCompanyid() : null;
 
        $this->addTowerForm($form, $companyid);
        
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        if (null === $data) {
            return;
        }
        $companyid = array_key_exists('companyid', $data) ? $data['companyid'] : null;
        $this->addTowerForm($form, $companyid);
    }
}

