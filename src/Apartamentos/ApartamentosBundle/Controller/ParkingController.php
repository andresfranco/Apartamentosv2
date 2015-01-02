<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Parking;
use Apartamentos\ApartamentosBundle\Form\ParkingType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
/**
 * Parking controller.
 *
 * @Route("/admin/parking")
 */
class ParkingController extends Controller
{

    /**
     * Lists all Parking entities.
     *
     * @Route("/", name="parking")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Parking')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Parking entity.
     *
     * @Route("/{_locale}/new", name="parking_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Parking:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Parking();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('parking_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Parking entity.
    *
    * @param Parking $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Parking $entity)
    {
        $form = $this->createForm(new ParkingType(), $entity, array(
            'action' => $this->generateUrl('parking_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Parking entity.
     *
     * @Route("/{_locale}/new", name="parking_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Parking();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Parking entity.
     *
     * @Route("/{_locale}/{id}", name="parking_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Parking')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Parking entity.');
        }

       $delete = $this->get('globalfunctions')->verifyaction("Delete Parking");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Parking");

        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing Parking entity.
     *
     * @Route("/{_locale}/{id}/edit", name="parking_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Parking')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Parking entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Parking entity.
    *
    * @param Parking $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Parking $entity)
    {
        $form = $this->createForm(new ParkingType(), $entity, array(
            'action' => $this->generateUrl('parking_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Parking entity.
     *
     * @Route("/{_locale}/{id}/edit", name="parking_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Parking:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Parking')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Parking entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('parkinggrid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Parking entity.
     *
     * @Route("/{_locale/{id}", name="parking_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Parking')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Parking entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('parking'));
    }

    /**
     * Creates a form to delete a Parking entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parking_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
      /**
     * Grid Resident
     *@Route("/{_locale}/parkinglist/", name="parkinggrid")
     */
    public function ResidentgridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Parking');
         
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
        //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Parking");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Parking");
        
        if ($edit =='S')
        { 
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 10);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'parking_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
        }  
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 11);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'parking_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id','createdate','createuser','modifyuser','modifydate'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Parking:parkinggrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'parking_new'));
    }
    /**
     * Deletes a Resident entity.
     *@Route("/{_locale}/deleteparking/{id}", name="parking_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Parking')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Parking entity.');
       }
             try {
                $em->remove($entity);
                $em->flush();
            } 
            catch(\Doctrine\DBAL\DBALException $e)
            {
            $this->get('session')->getFlashBag()->add('error', 'delete.parking.dbaexception');
              
            return $this->redirect($this->generateUrl('parking_show',array('id'=> $entity->getId())));   
            }
            
         return $this->redirect($this->generateUrl('parkinggrid'));  
    
    } 
      /**
     * 
     *@Route("/parkingtower", name="parking_select_tower")
     */

public function TowersAction(Request $request)
{
    $companyid = $request->request->get('company_id');
    $em = $this->getDoctrine()->getManager();
    $towers = $em->getRepository('ApartamentosApartamentosBundle:Tower')->findBycompanyid($companyid);
    $html = '';
    foreach($towers as $tower)
    {
        $html = $html . sprintf("<option value=\"%d\">%s</option>",$tower->getId(), $tower->getName());
    }
    return new JsonResponse($html);
}    
    
    /**
     * 
     *@Route("/parkingapt", name="parking_select_apartment")
     */

public function ApartmentsAction(Request $request)
{
    $tower_id = $request->request->get('tower_id');
    $em = $this->getDoctrine()->getManager();
    $apartments = $em->getRepository('ApartamentosApartamentosBundle:Apartment')->findBytowerid($tower_id);
    $html = '';
    foreach($apartments as $apartment)
    {
        $html = $html . sprintf("<option value=\"%d\">%s</option>",$apartment->getId(), $apartment->getNumber());
    }
    return new JsonResponse($html);
}

/**
 * @Route("/listBytower", name="apartmentbytower")
 */
public function getByApartmentId()
{
    $this->em = $this->get('doctrine')->getEntityManager();
    $this->repository = $this->em->getRepository('ApartamentosApartamentosBundle:Apartment');
 
    $towerid = $this->get('request')->query->get('data');
 
    $apartments = $this->repository->findByTowerId($towerid);
 
    $html = '';
    foreach($apartments as $apartment)
    {
        $html = $html . sprintf("<option value=\"%d\">%s</option>",$apartment->getId(), $apartment->getNumber());
    }
 
    return new Response($html);
}
    
}
