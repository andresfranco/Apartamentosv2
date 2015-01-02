<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Location;
use Apartamentos\ApartamentosBundle\Form\LocationType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
/**
 * Location controller.
 *
 * @Route("/admin/location")
 */
class LocationController extends Controller
{

    /**
     * Lists all Location entities.
     *
     * @Route("/", name="location")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Location')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Location entity.
     *
     * @Route("/{_locale}/new", name="location_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Location:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Location();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('location_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Location entity.
    *
    * @param Location $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Location $entity)
    {
        $form = $this->createForm(new LocationType(), $entity, array(
            'action' => $this->generateUrl('location_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Location entity.
     *
     * @Route("/{_locale}/new", name="location_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Location();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Location entity.
     *
     * @Route("/{_locale}/{id}", name="location_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Location')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Location entity.');
        }

        $delete = $this->get('globalfunctions')->verifyaction("Delete Location");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Location"); 
 
        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing Location entity.
     *
     * @Route("/{_locale}/{id}/edit", name="location_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Location')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Location entity.');
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
    * Creates a form to edit a Location entity.
    *
    * @param Location $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Location $entity)
    {
        $form = $this->createForm(new LocationType(), $entity, array(
            'action' => $this->generateUrl('location_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Location entity.
     *
     * @Route("/{_locale}/{id}/edit", name="location_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Location:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Location')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Location entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('locationgrid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Location entity.
     *
     * @Route("/{_locale}/{id}", name="location_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Location')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Location entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('location'));
    }

    /**
     * Creates a form to delete a Location entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('location_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
     /**
     * Grid Location
     *@Route("/{_locale}/locationlist/", name="locationgrid")
     */
    public function LocationgridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Location');
         
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
       //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Location");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Location");
        
        if ($edit =='S')
        {
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 10);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'location_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
        }  
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 11);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'location_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id','createdate','createuser','modifyuser','modifydate'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Location:locationgrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'location_new'));
    }
    /**
     * Deletes a Location entity.
     *@Route("/{_locale}/deletelocation/{id}", name="location_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Location')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Location entity.');
       }
             try {
                $em->remove($entity);
                $em->flush();
            } 
            catch(\Doctrine\DBAL\DBALException $e)
            {
            $this->get('session')->getFlashBag()->add('error', 'delete.location.dbaexception');
              
            return $this->redirect($this->generateUrl('location_show',array('id'=> $entity->getId())));   
            }
            
         return $this->redirect($this->generateUrl('locationgrid'));      
    } 
    
}
