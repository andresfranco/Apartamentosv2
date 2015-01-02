<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Vehicle;
use Apartamentos\ApartamentosBundle\Form\VehicleType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;

/**
 * Vehicle controller.
 *
 * @Route("/admin/vehicle")
 */
class VehicleController extends Controller
{

    /**
     * Lists all Vehicle entities.
     *
     * @Route("/", name="vehicle")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Vehicle')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Vehicle entity.
     *
     * @Route("/{_locale}/new", name="vehicle_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Vehicle:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Vehicle();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('vehicle_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Vehicle entity.
    *
    * @param Vehicle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Vehicle $entity)
    {
        $form = $this->createForm(new VehicleType(), $entity, array(
            'action' => $this->generateUrl('vehicle_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Vehicle entity.
     *
     * @Route("/{_locale}/new", name="vehicle_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Vehicle();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Vehicle entity.
     *
     * @Route("/{_locale}/{id}", name="vehicle_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Vehicle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehicle entity.');
        }

        $delete = $this->get('globalfunctions')->verifyaction("Delete Vehicle");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Vehicle"); 

        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing Vehicle entity.
     *
     * @Route("/{_locale}/{id}/edit", name="vehicle_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Vehicle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehicle entity.');
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
    * Creates a form to edit a Vehicle entity.
    *
    * @param Vehicle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Vehicle $entity)
    {
        $form = $this->createForm(new VehicleType(), $entity, array(
            'action' => $this->generateUrl('vehicle_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Vehicle entity.
     *
     * @Route("/{_locale}/{id}/edit", name="vehicle_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Vehicle:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Vehicle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vehicle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('vehiclegrid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Vehicle entity.
     *
     * @Route("/{id}", name="vehicle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Vehicle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vehicle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('vehiclegrid'));
    }

    /**
     * Creates a form to delete a Vehicle entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehicle_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /**
     * Grid Tower.
     *@Route("/{_locale}/vehiclelist/", name="vehiclegrid")
     */
    public function vehiclegridAction()
    {
        
         
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Vehicle');
   
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
        //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Vehicle");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Vehicle");
        
        if ($edit =='S')
        {
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 10);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'vehicle_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
        }  
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 11);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'vehicle_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id','createdate','createuser','modifyuser','modifydate'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Vehicle:vehiclegrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'vehicle_new'));
    }
    
       /**
     * Deletes Vehicle entity.
     *@Route("/{_locale}/deletevehicle/{id}", name="vehicle_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Vehicle')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Vehicle entity.');
       }

            $em->remove($entity);
            $em->flush();
       

        return $this->redirect($this->generateUrl('vehiclegrid'));     
    } 
    
       /**
     * 
     *@Route("/vehicletower", name="vehicle_select_tower")
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
     *@Route("/vehicleapt", name="vehicle_select_apartment")
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
     * 
     *@Route("/{_locale}/vehicleresident", name="vehicle_select_resident")
     */

public function ResidentAction(Request $request)
{
    $apartment_id = $request->request->get('apartment_id');
    $em = $this->getDoctrine()->getManager();
    $residents = $em->getRepository('ApartamentosApartamentosBundle:Resident')->findByapartmentid($apartment_id);
    $html = '';
    foreach($residents as $resident)
    {
        $html = $html . sprintf("<option value=\"%d\">%s</option>",$resident->getId(), $resident->getName());
    }
    return new JsonResponse($html);
}
}
