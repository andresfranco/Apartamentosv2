<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Cause;
use Apartamentos\ApartamentosBundle\Form\CauseType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
/**
 * Cause controller.
 *
 * @Route("/admin/cause")
 */
class CauseController extends Controller
{

    /**
     * Lists all Cause entities.
     *
     * @Route("/", name="cause")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Cause')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Cause entity.
     *
     * @Route("/{_locale}/new", name="cause_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Cause:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Cause();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cause_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Cause entity.
    *
    * @param Cause $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Cause $entity)
    {
        $form = $this->createForm(new CauseType(), $entity, array(
            'action' => $this->generateUrl('cause_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Cause entity.
     *
     * @Route("/{_locale}/new", name="cause_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cause();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Cause entity.
     *
     * @Route("/{_locale}/{id}", name="cause_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Cause')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cause entity.');
        }

        $delete = $this->get('globalfunctions')->verifyaction("Delete Cause");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Cause"); 

        return array(
            'entity'      => $entity,
             'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing Cause entity.
     *
     * @Route("/{_locale}/{id}/edit", name="cause_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Cause')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cause entity.');
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
    * Creates a form to edit a Cause entity.
    *
    * @param Cause $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cause $entity)
    {
        $form = $this->createForm(new CauseType(), $entity, array(
            'action' => $this->generateUrl('cause_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Cause entity.
     *
     * @Route("/{_locale}/{id}/edit", name="cause_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Cause:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Cause')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cause entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('causegrid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Cause entity.
     *
     * @Route("/{_locale}/{id}", name="cause_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Cause')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cause entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('causegrid'));
    }

    /**
     * Creates a form to delete a Cause entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cause_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
     /**
     * Grid Cause
     *@Route("/{_locale}/causelist/", name="causegrid")
     */
    public function CausegridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Cause');
         
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
        //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Cause");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Cause");
        
        if ($edit =='S')
        {
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 10);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'cause_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
        } 
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 11);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'cause_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
         $grid->hideColumns(array('id','createdate','createuser','modifyuser','modifydate'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Cause:causegrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'cause_new'));
    }
    /**
     * Deletes a Cause entity.
     *@Route("/{_locale}/deletecause/{id}", name="cause_deletemodal")
     */
    public function deletemodalAction($id)
    {
    $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Cause')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Cause entity.');
       }
             try {
                $em->remove($entity);
                $em->flush();
            } 
            catch(\Doctrine\DBAL\DBALException $e)
            {
            $this->get('session')->getFlashBag()->add('error', 'delete.cause.dbaexception');
              
            return $this->redirect($this->generateUrl('cause_show',array('id'=> $entity->getId())));   
            }
            
         return $this->redirect($this->generateUrl('causegrid'));   
    } 
}
