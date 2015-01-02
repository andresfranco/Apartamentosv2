<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ApartamentosApartamentosBundle:Default:index.html.twig', array('name' => $name));
    }
}
