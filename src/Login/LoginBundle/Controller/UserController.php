<?php

namespace Login\LoginBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Login\LoginBundle\Entity\User;
use Login\LoginBundle\Entity\Userrole;
use Login\LoginBundle\Entity\Role;
use Login\LoginBundle\Form\UserType;
use Login\LoginBundle\Form\ChangepasswordType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;

/**
 * User controller.
 *
 * @Route("/admin/user")
 */
class UserController extends Controller
{

    /**
     * Lists all User entities.
     *
     * @Route("/", name="admin_user")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LoginLoginBundle:User')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new User entity.
     *
     * @Route("/{_locale}/new", name="admin_user_create")
     * @Method("POST")
     * @Template("LoginLoginBundle:User:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new User();
        $request = $this->getRequest();
        $form = $this->createCreateForm($entity);
        $form->submit($request);
        
        if ($form->isValid()) {
            
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            //Create Password
            $this->setSecurePassword($entity);

            $em = $this->getDoctrine()->getEntityManager();
            
            //Save User
            $em->persist($entity);
            $em->flush();
            //Save Default role: ROLE_USER 
            $userrole = new Userrole();
            $em2 = $this->getDoctrine()->getManager();
            $role = $em2->getRepository('LoginLoginBundle:Role')->find(2);
            $em3 = $this->getDoctrine()->getManager();
            $user = $em3->getRepository('LoginLoginBundle:User')->find($entity->getId());
            $userrole->setUserid($user );
            $userrole->setRoleid($role);
            $em->persist($userrole);
            $em->flush();
            
           
            return $this->redirect($this->generateUrl('admin_user_show', array('id' => $entity->getId())));

        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
              
        );
    }

    /**
    * Creates a form to create a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('admin_user_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
           
            
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));
       
        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     * @Route("/{_locale}/new", name="admin_user_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new User();
        $form   = $this->createCreateForm($entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
           
        );
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{_locale}/{id}", name="admin_user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }
        $delete = $this->get('globalfunctions')->verifyaction("Delete User");
        $edit= $this->get('globalfunctions')->verifyaction("Edit User");
        $changepassword = $this->get('globalfunctions')->verifyaction("Change User Password");
        $roles=$this->GetUserRolesAction($id);


        return array(
            'entity'      => $entity,
            'roles'       => $roles,
            'deleteaction'=>$delete,
            'editaction'=>$edit,
            'changepassword'=>$changepassword
        );
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{_locale}/{id}/edit", name="admin_user_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
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
    * Creates a form to edit a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(User $entity)
    {
      
       $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('admin_user_update',array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array(
                        'id' => 'form')
           
            
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));
       
        return $form;
    }
    /**
     * Edits an existing User entity.
     *
     * @Route("/{_locale}/{id}/edit", name="admin_user_update")
     * @Method("PUT")
     * @Template("LoginLoginBundle:User:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('LoginLoginBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm   = $this->createForm(new UserType(), $entity);
        $editForm->add('submit', 'submit', array('label' => 'Update'));
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        //obtiene la contraseña actual -----------------------
        $current_pass = $entity->getPassword();

        $editForm->submit($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            //evalua si la contraseña fue modificada: ------------------------
            if ($current_pass != $entity->getPassword()) {
                $this->setSecurePassword($entity);
            }
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('admin_user_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('userslist'));
        }
         else
         {     
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
         }
    }
    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="admin_user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LoginLoginBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usergrid'));
    }
     //Elimina el registro desde un modal
          
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('LoginLoginBundle:User')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find User entity.');
       }

            $em->remove($entity);
            $em->flush();
       

        return $this->redirect($this->generateUrl('userslist'));     
    }        
            
    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_user_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    private function setSecurePassword($entity) 
     {
	$entity->setSalt(md5(time()));
	$encoder = new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', true, 10);
	$password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
	$entity->setPassword($password);
    }
    
    
    public function listAction()
{
    $em    = $this->get('doctrine.orm.entity_manager');
    $dql   = "SELECT u FROM LoginLoginBundle:User u";
    $query = $em->createQuery($dql);
    
    $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1)/*page number*/,
        5/*limit per page*/
    );
    $filtro="";
	$valor="";
	$selectedid="";
	$selecteduser="";
    
    //crea filtros de busqueda
     

    // parameters to template
    return $this->render('LoginLoginBundle:User:list.html.twig', array('pagination' => $pagination,'filtro'=>$filtro,'valor'=>$valor,'selectedid'=>$selectedid,'selecteduser'=>$selecteduser));
}

    public function findAction()
{
    $request = $this->getRequest();  
    $filtro=$request->request->get('filtro');
    $valor=$request->request->get('valor');
    $em    = $this->get('doctrine.orm.entity_manager');
    $selectedid="";
    $selecteduser="";
   
     switch ($filtro) 
        {
    case 'id':
        $condicion=" WHERE u.id like :valor ";
		$selectedid="selected";
        break;
    case 'username':
       $condicion=" WHERE u.username like  :valor ";
	   $selecteduser="selected";
        break;
    
      }
      //Si no hay valor de busqueda trae todos los registros
      if(trim($valor)=="")
      {
      $condicion   = "";
      $parametros="";
      $dql   = "SELECT u FROM LoginLoginBundle:User u";   
       
    $query = $em->createQuery($dql);
     }
     //filtra segun el valor y filtro que tenga.
     else
     {     
     $parametros=array();
     $parametros['valor'] = $valor;
	
     
    
     $dql   = "SELECT u FROM LoginLoginBundle:User u".$condicion;   
     $query = $em->createQuery($dql)->setParameters($parametros);
     }
    $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1)/*page number*/,
        5/*limit per page*/
    );

    // parameters to template
    return $this->render('LoginLoginBundle:User:list.html.twig', array('pagination' => $pagination,'filtro'=>$filtro,'valor'=>$valor,'selectedid'=>$selectedid,'selecteduser'=>$selecteduser));
}

public function createselect()
{
  return $this->createFormBuilder()  
          ->add('gender', 'choice', array(
    'choices'   => array('id' => 'id', 'username' => 'Username'),
    'required'  => false,
)); 
  
  
    
}

public function usergridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('LoginLoginBundle:User');
   
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
        $create= $this->get('globalfunctions')->verifyaction("Create User");
        $edit = $this->get('globalfunctions')->verifyaction("Edit User");

        if ($edit =='S')
        {
            $editColumn = new ActionsColumn('info_column_1', '');
            $editColumn->setSeparator("<br />");
            $grid->addColumn($editColumn, 9);
            // Attach a rowAction to the Actions Column
            $editAction = new RowAction('Edit', 'admin_user_edit', false, '_self', array('class' => 'editar'));
            $editAction->setColumn('info_column_1');
            $grid->addRowAction($editAction);
        }
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 10);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'admin_user_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
    
         $grid->hideColumns(array('id','password','salt','createdate','createuser','modifyuser','modifydate'));
        return $grid->getGridResponse('LoginLoginBundle:User:usergrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'admin_user_new'));
    }
    
   public function GetUserRolesAction($userid)
   {
    $user = $this->getDoctrine()
        ->getRepository('LoginLoginBundle:User')
        ->find($userid);
     $roles = $user->getUserRoles();
   
     return $roles;
   }
   public function GetCompanyValue()
   {
     $em = $this->get('doctrine.orm.entity_manager');
     $dql   = "SELECT c.id FROM ApartamentosApartamentosBundle:Company c"; 
     $empresa= $em->createQuery($dql)
                   ->setMaxResults(1)
    ;  
    // $this->getWidget('ip')->setAttribute('value', $ip);
     return $empresa;
       
   }        
    
   /**
    * Creates a form to edit a User password
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
   public function Createpasswordform(User $entity)
    {
       $form = $this->createForm(new ChangepasswordType(),$entity, array(
            'action' => $this->generateUrl('change_password',array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array(
                        'id' => 'form')
           
            
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));
       
        return $form;  
        
    }
   
   //Change user password
    /**
     * Change userpassword 
     * @Route("/{_locale}/{id}/changepassword", name="change_password")
     * @Template("LoginLoginBundle:User:changepassword.html.twig")
     */
   public function ChangePassword(Request $request,$id)
   {
        $em = $this->getDoctrine()->getManager();
    
        $entity = $em->getRepository('LoginLoginBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        
        $editForm   = $this->Createpasswordform($entity);
          
        //obtiene la contraseña actual -----------------------
        $current_pass = $entity->getPassword();

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            //evalua si la contraseña fue modificada: ------------------------
            if ($current_pass != $entity->getPassword()) {
                $this->setSecurePassword($entity);
            }
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('admin_user_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('userslist'));
        }
         else
         {     
        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
          
        );
         }
         
       
   }        
           
            

}
