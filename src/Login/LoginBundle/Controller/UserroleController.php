<?php

namespace Login\LoginBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Login\LoginBundle\Entity\Userrole;
use Login\LoginBundle\Form\UserroleType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
/**
 * Userrole controller.
 *
 * @Route("/admin/userrole")
 */
class UserroleController extends Controller
{

    /**
     * Lists all Userrole entities.
     *
     * @Route("/", name="userrole")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LoginLoginBundle:Userrole')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Userrole entity.
     *
     * @Route("/{userid}/", name="userrole_create")
     * @Method("POST")
     * @Template("LoginLoginBundle:Userrole:new.html.twig")
     */
    public function createAction(Request $request,$userid)
    {
        $entity = new Userrole();
        $form = $this->createCreateForm($entity,$userid);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em2 = $this->getDoctrine()->getManager();
            $user= $em2->getRepository('LoginLoginBundle:User')->find($userid);
            $entity->setUserid($user);
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('userroles', array('userid' => $entity->getUserid()->getId())));
             
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Userrole entity.
    *
    * @param Userrole $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Userrole $entity,$userid)
    {
        $form = $this->createForm(new UserroleType($userid), $entity, array(
            'action' => $this->generateUrl('userrole_create',array('userid'=>$userid)),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Userrole entity.
     *
     * @Route("/{_locale}/{userid}/new", name="userrole_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($userid)
    {
        $entity = new Userrole();
        $form   = $this->createCreateForm($entity,$userid);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Userrole entity.
     *
     * @Route("/{_locale}/{id}", name="userrole_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Userrole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userrole entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
         
        );
    }

    /**
     * Displays a form to edit an existing Userrole entity.
     *
     * @Route("/{id}/edit", name="userrole_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Userrole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userrole entity.');
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
    * Creates a form to edit a Userrole entity.
    *
    * @param Userrole $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Userrole $entity,$userid)
    {
        $form = $this->createForm(new UserroleType($userid), $entity, array(
            'action' => $this->generateUrl('userrole_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Userrole entity.
     *
     * @Route("/{id}", name="userrole_update")
     * @Method("PUT")
     * @Template("LoginLoginBundle:Userrole:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Userrole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userrole entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity->getUserid()->getId());
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('userrole_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Userrole entity.
     *
     * @Route("/{id}", name="userrole_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LoginLoginBundle:Userrole')->find($id);
     
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Userrole entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect('userroles',array('userid'=>$entity->getUserid()));
    }

    /**
     * Creates a form to delete a Userrole entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('userrole_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
     /**
     * Grid Resident
     *@Route("/{_locale}/{userid}/userrolelist/", name="userroles")
     */
    public function userrolegridAction($userid)
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('LoginLoginBundle:Userrole');
   
        // Get a Grid instance
        $grid = $this->get('grid');
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
        
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 9);
        
         
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 10);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'userrole_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
    
         $grid->hideColumns(array('id'));
        return $grid->getGridResponse('LoginLoginBundle:Userrole:userrolegrid.html.twig');
    }
    /**
     * Deletes a Userrole entity.
     *@Route("/{_locale}/deleteuserrole/{id}", name="userrole_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('LoginLoginBundle:Userrole')->find($id);
     $em->persist($entity);
     $userid = $entity->getUserid()->getId();
             
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Userrole entity.');
       }
            
            $em->remove($entity);
            $em->flush();
       
         
        return $this->redirect($this->generateUrl('userroles',array('userid'=>$userid)));     
    }       
    
    /**
     * Grid Resident
     *@Route("/{_locale}/{userid}/getusername/", name="Usernametwig")
     */
    public function Usernametwig($userid)
    {
        $username = $this->get('globalfunctions')->Getusernamebyid($userid);
        return new Response($username);
    } 
     /**
     * Grid Resident
     *@Route("/{_locale}/{userid}/{roleid}/", name="existtroleuser")
     */
    public function Existtroleuser($userid,$roleid)
    {
      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder();
      $qb->select('count(ur.id)')
          ->from('LoginLoginBundle:Userrole','ur')
          ->where( 'ur.userid = :userid and ur.roleid = :roleid')
          ->setParameters(array('userid'=>$userid, 'roleid' => $roleid)); 
      $count = $qb->getQuery()->getSingleScalarResult();
      return $count;
        
    }       
            
    
}
