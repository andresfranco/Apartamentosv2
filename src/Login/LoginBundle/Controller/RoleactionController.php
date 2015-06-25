<?php

namespace Login\LoginBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Login\LoginBundle\Entity\Roleaction;
use Login\LoginBundle\Form\RoleactionType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
/**
 * Roleaction controller.
 *
 * @Route("/admin/roleaction")
 */
class RoleactionController extends Controller
{

    /**
     * Lists all Roleaction entities.
     *
     * @Route("/", name="roleaction")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LoginLoginBundle:Roleaction')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Roleaction entity.
     *
     * @Route("/{_locale}/{roleid}/", name="roleaction_create")
     * @Method("POST")
     * @Template("LoginLoginBundle:Roleaction:new.html.twig")
     */
    public function createAction(Request $request,$roleid)
    {
        $entity = new Roleaction();
        $form = $this->createCreateForm($entity,$roleid);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em2 = $this->getDoctrine()->getManager();
            $role= $em2->getRepository('LoginLoginBundle:Role')->find($roleid);
            $entity->setRoleid($role);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('roleactiongrid', array('roleid' => $roleid)));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Roleaction entity.
    *
    * @param Roleaction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Roleaction $entity,$roleid)
    {
        $form = $this->createForm(new RoleactionType($roleid), $entity, array(
            'action' => $this->generateUrl('roleaction_create',array('roleid'=>$roleid)),
            'method' => 'POST',
             'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Roleaction entity.
     *
     * @Route("/{_locale}/{roleid}/new", name="roleaction_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($roleid)
    {
        $entity = new Roleaction();
        $form   = $this->createCreateForm($entity,$roleid);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Roleaction entity.
     *
     * @Route("/{_locale}/{id}", name="roleaction_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Roleaction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Roleaction entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Roleaction entity.
     *
     * @Route("/{id}/edit", name="roleaction_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Roleaction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Roleaction entity.');
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
    * Creates a form to edit a Roleaction entity.
    *
    * @param Roleaction $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Roleaction $entity,$roleid)
    {
        $form = $this->createForm(new RoleactionType($roleid), $entity, array(
            'action' => $this->generateUrl('roleaction_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Roleaction entity.
     *
     * @Route("/{id}", name="roleaction_update")
     * @Method("PUT")
     * @Template("LoginLoginBundle:Roleaction:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Roleaction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Roleaction entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('roleaction_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Roleaction entity.
     *
     * @Route("/{id}", name="roleaction_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LoginLoginBundle:Roleaction')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Roleaction entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('roleaction'));
    }

    /**
     * Creates a form to delete a Roleaction entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('roleaction_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
     /**
     * Grid Resident
     *@Route("/{_locale}/{roleid}/roleactions/", name="roleactiongrid")
     */
    public function roleactiongrid($roleid)
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('LoginLoginBundle:Roleaction');
   
        // Get a Grid instance
        $grid = $this->get('grid');
        $tableAlias = $source->getTableAlias();
       $source->manipulateQuery(
       function ($query) use ($tableAlias,$roleid)        
      {
          
        $query->andWhere($tableAlias . '.roleid ='.$roleid);
      }
      ); 
        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
        
         // Add Edit actions in the default row actions column
        //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Role Action");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Role Action");
        // Add Edit actions in the default row actions column
        
         //IMPORTANT: THIS GRID Dont Have Edit Column 
         
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 10);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'roleaction_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
    
         $grid->hideColumns(array('id','createuser','modifyuser','createdate','modifydate'));
        return $grid->getGridResponse('LoginLoginBundle:Roleaction:roleactiongrid.html.twig',array('create'=>$create,'edit'=>$edit));
    }
    /**
     * Deletes a Userrole entity.
     *@Route("/{_locale}/deleteroleaction/{id}", name="roleaction_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('LoginLoginBundle:Roleaction')->find($id);
     $em->persist($entity);
     $roleid = $entity->getRoleid()->getId();
             
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Roleaction entity.');
       }
            
            $em->remove($entity);
            $em->flush();
       
         
        return $this->redirect($this->generateUrl('roleactiongrid',array('roleid'=>$roleid)));     
    }
    
    /**
     * Grid Resident
     *@Route("/{_locale}/{roleid}/getrolename/", name="Rolenametwig")
     */
    public function Rolenametwig($roleid)
    {
        $rolename = $this->get('globalfunctions')->Getrolenamebyid($roleid);
        return new Response($rolename);
    } 
}
