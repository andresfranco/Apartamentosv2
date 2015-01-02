<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Residenttype;
use Apartamentos\ApartamentosBundle\Form\ResidenttypeType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;

/**
 * Residenttype controller.
 *
 * @Route("/admin/residenttype")
 */
class ResidenttypeController extends Controller
{

    /**
     * Lists all Residenttype entities.
     *
     * @Route("/", name="residenttype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Residenttype')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Residenttype entity.
     *
     * @Route("/{_locale}/new", name="residenttype_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Residenttype:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Residenttype();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('residenttype_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Residenttype entity.
    *
    * @param Residenttype $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Residenttype $entity)
    {
        $form = $this->createForm(new ResidenttypeType(), $entity, array(
            'action' => $this->generateUrl('residenttype_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Residenttype entity.
     *
     * @Route("/{_locale}/new", name="residenttype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Residenttype();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Residenttype entity.
     *
     * @Route("/{_locale}/{id}", name="residenttype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Residenttype')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Residenttype entity.');
        }

       
        $delete = $this->get('globalfunctions')->verifyaction("Delete Residenttype");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Residenttype"); 
        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing Residenttype entity.
     *
     * @Route("/{_locale}/{id}/edit", name="residenttype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Residenttype')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Residenttype entity.');
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
    * Creates a form to edit a Residenttype entity.
    *
    * @param Residenttype $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Residenttype $entity)
    {
        $form = $this->createForm(new ResidenttypeType(), $entity, array(
            'action' => $this->generateUrl('residenttype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Residenttype entity.
     *
     * @Route("/{_locale}/{id}/edit", name="residenttype_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Residenttype:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Residenttype')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Residenttype entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('typeresidentgrid', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Residenttype entity.
     *
     * @Route("/{id}", name="residenttype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Residenttype')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Residenttype entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('residenttype'));
    }

    /**
     * Creates a form to delete a Residenttype entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('residenttype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
     * Grid Tower.
     *@Route("/{_locale}/typeresidentlist/", name="typeresidentgrid")
     */
    public function residenttypegridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Residenttype');
   
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
        //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Residenttype");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Residenttype");
        
        if ($edit =='S')
        {
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 8);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'residenttype_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
        }
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 9);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'residenttype_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id','createdate','createuser','modifyuser','modifydate'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:residenttype:residenttypegrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'residenttype_new'));
    }
    /**
     * Deletes a Residenttype entity.
     *@Route("/{_locale}/deleteresidenttype/{id}", name="residenttype_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Residenttype')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Residenttype entity.');
       }
             try {
                $em->remove($entity);
                $em->flush();
            } 
            catch(\Doctrine\DBAL\DBALException $e)
            {
            $this->get('session')->getFlashBag()->add('error', 'delete.residenttype.dbaexception');
              
            return $this->redirect($this->generateUrl('residenttype_show',array('id'=> $entity->getId())));   
            }
            
         return $this->redirect($this->generateUrl('typeresidentgrid'));    
    } 
}
