<?php

namespace Apartamentos\ApartamentosBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Apartamentos\ApartamentosBundle\Entity\Tower;
 
class MultipleTowerSubscriber implements EventSubscriberInterface
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
            'class' => 'ApartamentosApartamentosBundle:Tower',
            'property' =>'name',
            'multiple' => true,
            'expanded' => true,
            'required' => false,
            'label' =>'Torres en las que trabaja' ,
            'label_attr' => array('id' => 'lbltower'),
            'attr'  => array(
            'class' =>'tower_selector',
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
        
       $form->add('tower', 'entity', $formOptions);
       
        }
 
      
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
       //echo 'data'.$data;
        //if (null === $data) {
            //return;
        //}
        //$accessor = PropertyAccess::getPropertyAccessor();
        
        //$apartment   = $accessor->getValue($data, $this->propertyPathToApartment);
        $company = $data->getcompanyid();//($apartment) ? $apartment->getTowerid(): null;
      
        $this->addTowerForm($form, $company);
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


