<?php

namespace Apartamentos\ApartamentosBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Apartamentos\ApartamentosBundle\Entity\Provider;
 
class AddProviderSubscriber implements EventSubscriberInterface
{
    private $propertyPathToProvider;
 
    public function __construct($propertyPathToProvider)
    {
        $this->propertyPathToProvider = $propertyPathToProvider;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }
 
    private function addProviderForm($form,$towerid,$provider=null)
    {
        $formOptions = array(
            'class'         => 'ApartamentosApartamentosBundle:Provider',
            'empty_value'   => 'Seleccione un proveedor',
            'property'      => 'name',
            'label'         => 'Proveedor',
            'required'      =>false,
            'attr'          => array(
            'class' => 'provider_selector',
            ),
            'query_builder' => function (EntityRepository $repository) use ($towerid) {
                $qb = $repository->createQueryBuilder('provider')
                    ->innerJoin('provider.towerid', 'tower')
                    ->where('tower.id = :towerid')
                    ->setParameter('towerid', $towerid)
                ;
 
                return $qb;
            }
        );
        
        $form->add('providerid','entity', $formOptions);
        }
 
      
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $accessor = PropertyAccess::getPropertyAccessor();
 
        $provider      = $accessor->getValue($data, $this->propertyPathToProvider);
        
        $towerid = ($provider) ? $provider->getTowerid() : null;
 
        $this->addProviderForm($form,$towerid);
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        if (null === $data) {
            return;
        }
        $towerid = array_key_exists('towerid', $data) ? $data['towerid'] : null;
        $this->addProviderForm($form, $towerid );
    }
}
