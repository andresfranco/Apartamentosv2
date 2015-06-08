<?php

namespace Login\LoginBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Login\LoginBundle\Entity\Residentuser;
use Login\LoginBundle\Form\ResidentuserType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;

/**
 * Residentuser controller.
 *
 * @Route("/admin/residentuser")
 */
class ResidentuserController extends Controller
{

    /**
     * Lists all Residentuser entities.
     *
     * @Route("/", name="residentuser")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LoginLoginBundle:Residentuser')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Residentuser entity.
     *
     * @Route("/new/{_locale}/{userid}", name="residentuser_create")
     * @Method("POST")
     * @Template("LoginLoginBundle:Residentuser:new.html.twig")
     */
    public function createAction(Request $request,$userid)
    {
        $entity = new Residentuser();
        $form = $this->createCreateForm($entity,$userid);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('residentusergrid',array('userid'=>$userid)));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'userid'=>$userid
        );
    }

    /**
     * Creates a form to create a Residentuser entity.
     *
     * @param Residentuser $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Residentuser $entity,$userid)
    {
        $form = $this->createForm(new ResidentuserType($userid), $entity, array(
            'action' => $this->generateUrl('residentuser_create',array('userid'=>$userid)),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Residentuser entity.
     *
     * @Route("/new/{_locale}/{userid}", name="residentuser_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($userid)
    {
        $entity = new Residentuser();
        $form   = $this->createCreateForm($entity,$userid);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'userid'=>$userid  
        );
    }

    /**
     * Finds and displays a Residentuser entity.
     *
     * @Route("/{_locale}/{id}", name="residentuser_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Residentuser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Residentuser entity.');
        }
        $delete = $this->get('globalfunctions')->verifyaction("Delete Resident User");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Resident User"); 
      

        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing Residentuser entity.
     *
     * @Route("/edit/{_locale}/{id}/{userid}", name="residentuser_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id,$userid)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Residentuser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Residentuser entity.');
        }

        $editForm = $this->createEditForm($entity,$userid);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'userid'      =>$userid
        );
    }

    /**
    * Creates a form to edit a Residentuser entity.
    *
    * @param Residentuser $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Residentuser $entity,$userid)
    {
        $form = $this->createForm(new ResidentuserType($userid), $entity, array(
            'action' => $this->generateUrl('residentuser_update', array('id' => $entity->getId(),'userid'=>$userid)),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Residentuser entity.
     *
     * @Route("/{_locale}/{id}/{userid}/edit", name="residentuser_update")
     * @Method("PUT")
     * @Template("LoginLoginBundle:Residentuser:edit.html.twig")
     */
    public function updateAction(Request $request,$id,$userid)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Residentuser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Residentuser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity,$userid);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('residentusergrid',array('userid'=>$userid)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'userid'      =>$userid
        );
    }
    /**
     * Deletes a Residentuser entity.
     *
     * @Route("/{id}", name="residentuser_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LoginLoginBundle:Residentuser')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Residentuser entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('residentuser'));
    }

    /**
     * Creates a form to delete a Residentuser entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('residentuser_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /**
     * Resident User Grid
     *
     * @Route("/residentusers/{_locale}/{userid}", name="residentusergrid")
     * @Method("GET")
     * @Template()
     */
     public function Resident_user_grid_Action($userid)
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('LoginLoginBundle:Residentuser');
   
        // Get a Grid instance
        $grid = $this->get('grid');

         // Get a Grid instance
        $tableAlias = $source->getTableAlias();
       $source->manipulateQuery(
       function ($query) use ($tableAlias,$userid)        
      {
          
        $query->andWhere($tableAlias . '.userid ='.$userid);
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
        $create= $this->get('globalfunctions')->verifyaction("Create Resident User");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Resident User");

        if ($edit =='S')
        {

            $editColumn = new ActionsColumn('info_column_1', '');
            $editColumn->setSeparator("<br />");
            $grid->addColumn($editColumn, 12);
            // Attach a rowAction to the Actions Column
            $editAction = new RowAction('Edit', 'residentuser_edit', false, '_self', array('class' => 'editar'));
            $editAction->setColumn('info_column_1');
            $editAction->setRouteParameters(array('id','userid' =>$userid));
            $grid->addRowAction($editAction);
        }
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 13);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'residentuser_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
        
        $grid->hideColumns(array('id','createuser','modifyuser','createdate','modifydate'));
        return $grid->getGridResponse('LoginLoginBundle:Residentuser:residentusergrid.html.twig'
                ,array('create'=>$create
                ,'edit'=>$edit
                ,'urlnew'=>'residentuser_new'
                ,'userid'=>$userid));
    }
     /**
     * Deletes a Residentuser entity.
     *@Route("deleteresidentuser/{_locale}/{id}", name="residentuser_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('LoginLoginBundle:Residentuser')->find($id);
     
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Residentuser entity.');
       }
             try {
                $em->remove($entity);
                $em->flush();
            } 
            catch(\Doctrine\DBAL\DBALException $e)
            {
            $this->get('session')->getFlashBag()->add('error', 'delete.residentuser.exception');
              
            return $this->redirect($this->generateUrl('action_show',array('id'=> $entity->getId())));   
            }
          $userid=$entity->getUserid()->getId();  
         return $this->redirect($this->generateUrl('residentusergrid',array('userid'=>$userid)));       
    }     
}
