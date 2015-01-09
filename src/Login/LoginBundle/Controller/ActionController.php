<?php

namespace Login\LoginBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Login\LoginBundle\Entity\Action;
use Login\LoginBundle\Form\ActionType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
/**
 * Action controller.
 *
 * @Route("/admin/actions")
 */
class ActionController extends Controller
{

    /**
     * Lists all Action entities.
     * @Route("/admin/roleaction", name="roleaction")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LoginLoginBundle:Action')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Action entity.
     *
     * @Route("/{_locale}/new", name="action_create")
     * @Method("POST")
     * @Template("LoginLoginBundle:Action:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Action();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actiongrid'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Action entity.
    *
    * @param Action $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Action $entity)
    {
        $form = $this->createForm(new ActionType(), $entity, array(
            'action' => $this->generateUrl('action_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Action entity.
     *
     * @Route("/{_locale}/new", name="action_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Action();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Action entity.
     *
     * @Route("/{_locale}/{id}", name="action_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Action')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Action entity.');
        }

        $delete = $this->get('globalfunctions')->verifyaction("Delete Security Action");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Security Action");

        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing Action entity.
     *
     * @Route("/{_locale}/{id}/edit", name="action_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Action')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Action entity.');
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
    * Creates a form to edit a Action entity.
    *
    * @param Action $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Action $entity)
    {
        $form = $this->createForm(new ActionType(), $entity, array(
            'action' => $this->generateUrl('action_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Action entity.
     *
     * @Route("/{_locale}/{id}/edit", name="action_update")
     * @Method("PUT")
     * @Template("LoginLoginBundle:Action:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Action')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Action entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();
            return $this->redirect($this->generateUrl('actiongrid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Action entity.
     *
     * @Route("/{id}", name="action_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LoginLoginBundle:Action')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Action entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('action'));
    }

    /**
     * Creates a form to delete a Action entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('action_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /**
     * Deletes a Action entity.
     *
     * @Route("/{_locale}", name="actiongrid")
     */
     public function actiongrid()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('LoginLoginBundle:Action');
   
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
        // Add Edit actions in the default row actions column
        //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Security Action");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Security Action");

        if ($edit =='S')
        {

            $editColumn = new ActionsColumn('info_column_1', '');
            $editColumn->setSeparator("<br />");
            $grid->addColumn($editColumn, 5);
            // Attach a rowAction to the Actions Column
            $editAction = new RowAction('Edit', 'action_edit', false, '_self', array('class' => 'editar'));
            $editAction->setColumn('info_column_1');
            $grid->addRowAction($editAction);
        }
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 6);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'action_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
        
        $grid->hideColumns(array('id','createuser','modifyuser','createdate','modifydate'));
        return $grid->getGridResponse('LoginLoginBundle:Action:actiongrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'action_new'));
    }
      /**
     * Deletes a Company entity.
     *@Route("/{_locale}/deleaction/{id}", name="action_deletemodal")
     */
          
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('LoginLoginBundle:Action')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Action entity.');
       }
             try {
                $em->remove($entity);
                $em->flush();
            } 
            catch(\Doctrine\DBAL\DBALException $e)
            {
            $this->get('session')->getFlashBag()->add('error', 'delete.action.exception');
              
            return $this->redirect($this->generateUrl('action_show',array('id'=> $entity->getId())));   
            }
            
         return $this->redirect($this->generateUrl('actiongrid'));       
    }     
}
