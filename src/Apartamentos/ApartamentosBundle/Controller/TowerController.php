<?php

namespace Apartamentos\ApartamentosBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Tower;
use Apartamentos\ApartamentosBundle\Form\TowerType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;

/**
 * Tower controller.
 *
 * @Route("/admin/tower")
 */
class TowerController extends Controller
{

    /**
     * Lists all Tower entities.
     *
     * @Route("/", name="towerindex")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Tower')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tower entity.
     *
     * @Route("/{_locale}/new_tower", name="tower_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Tower:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity=new Tower();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tower_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Tower entity.
    *
    * @param Tower $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tower $entity)
    {
        
        $form = $this->createForm(new TowerType(), $entity, array(
            'action' => $this->generateUrl('tower_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Tower entity.
     *
     * @Route("/{_locale}/new_tower", name="tower_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tower();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tower entity.
     *
     * @Route("/{_locale}/{id}", name="tower_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Tower')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tower entity.');
        }
        
       $delete = $this->get('globalfunctions')->verifyaction("Delete Tower");
       $edit= $this->get('globalfunctions')->verifyaction("Edit Tower");
        
       
        return array(
            'entity'=> $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
       );
        
    }

    /**
     * Displays a form to edit an existing Tower entity.
     *
     * @Route("/{_locale}/{id}/edit", name="tower_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Tower')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tower entity.');
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
    * Creates a form to edit a Tower entity.
    *
    * @param Tower $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tower $entity)
    {   
    //$tower = new Tower();
    //$towerdetail = new Towerdetail();
    //$tower->setDetail($towerdetail);
    //$tower->setProfile($profile);
 
    
        $form = $this->createForm(new TowerType(), $entity, array(
            'action' => $this->generateUrl('tower_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array(
                        'id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Tower entity.
     *
     * @Route("/{_locale}/{id}/edit", name="tower_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Tower:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Tower')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tower entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('towergrid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tower entity.
     *
     * @Route("/{id}", name="tower_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Tower')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tower entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('towergrid'));
    }

    /**
     * Creates a form to delete a Tower entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tower_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
   
      /**
     * Deletes a Tower entity.
     *@Route("/{_locale}/deletetower/{id}", name="tower_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Tower')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Tower entity.');
       }
             try {
                $em->remove($entity);
                $em->flush();
            } 
            catch(\Doctrine\DBAL\DBALException $e)
            {
            $this->get('session')->getFlashBag()->add('error', 'delete.tower.dbaexception');
              
            return $this->redirect($this->generateUrl('tower_show',array('id'=> $entity->getId())));   
            }
            
         return $this->redirect($this->generateUrl('towergrid'));    
    }      
   
    /**
     * Grid Tower.
     *@Route("/{_locale}/towerlist/", name="towergrid")
     */
    public function towergridAction()
    {
        
         
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Tower');
   
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
        //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Tower");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Tower");
        
        if ($edit =='S')
        {
        
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 10);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'tower_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
        }
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 11);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'tower_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id','numberapartments', 'numberstorerooms','numberparkings','numberaptperfloor','email','createdate','createuser','modifyuser','modifydate'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Tower:towergrid.html.twig',array('create'=>$create,'urlnew'=>'tower_new'));
    }
    
     public function getapartmentsgrid($id)
    {
         // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Apartment');
        
        
        // Get a Grid instance
       $grid = $this->get('grid');
       $tableAlias = $source->getTableAlias();
       $source->manipulateQuery(
       function ($query) use ($tableAlias,$id)        
      {
          
        $query->andWhere($tableAlias . '.towerid ='.$id);
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
        $grid->addColumn($editColumn, 18);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'apartment_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
         
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 19);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'apartment_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array( 'id','area','numberresidents','floornumber','rooms','hasmade','hasbabysitting','haspet','hasmaderoom','haskids','petkind','petnumber','numberofkids'));
       //$grid->
       //$grid->getGridResponse();
       //return array(
        //'grid' => $grid
      // );
        return $grid;//->getGridResponse();//('ApartamentosApartamentosBundle:Tower:show.html.twig');
    }
    /**
     * Grid Tower.
     @Route("/towerapartment/{_locale}/{id}", name="tower_apartmentgrid")
     */
     public function getapartmentgrid($id)
    {
         $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Tower')->find($id); 
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Apartment');
        
        
        // Get a Grid instance
       $grid = $this->get('grid');
       $tableAlias = $source->getTableAlias();
       $source->manipulateQuery(
       function ($query) use ($tableAlias,$id)        
      {
          
        $query->andWhere($tableAlias . '.towerid ='.$id);
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
        $grid->addColumn($editColumn, 18);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'apartment_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
         
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 19);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'apartment_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array( 'id','area','numberresidents','floornumber','rooms','hasmade','hasbabysitting','haspet','hasmaderoom','haskids','petkind','petnumber','numberofkids'));
       //$grid->
       //$grid->getGridResponse();
       //return array(
        //'grid' => $grid
      // );
         return $grid->getGridResponse('ApartamentosApartamentosBundle:Tower:gridapartment.html.twig',array('entity'=>$entity));
    } 
    
    
    /**
     * Grid Tower.
     @Route("/toweremployees/{_locale}/{id}", name="gridemployee")
     */
    public function gridemployeeAction($id)         
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Tower')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tower entity.');
        }
        
        //$grid=$this->getapartmentsgrid($id);
        //$grid->getGridResponse();
        
         // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Employee');
        
        
        // Get a Grid instance
       $grid2 = $this->get('grid');
       $tableAlias = $source->getTableAlias();
       //$source->manipulateQuery(
       //function ($query) use ($tableAlias,$id)        
      //{
          
        //$query->andWhere($tableAlias . 'tower.id ='.$id);
      //}
     // );
        // Attach the source to the grid
        $grid2->setSource($source);
        
        // Set the selector of the number of items per page
        $grid2->setLimits(array(5, 10, 15));

        // Set the default page
        $grid2->setPage(1);
        
        // Add Edit actions in the default row actions column
        
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid2->addColumn($editColumn, 20);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'employee_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid2->addRowAction($editAction);
         
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid2->addColumn($showColumn, 21);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'employee_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid2->addRowAction($showAction);
       
        $grid2->hideColumns(array( 'salaryamount','tower.id'));
       //$grid->
       //$grid->getGridResponse();
       
        return $grid2->getGridResponse('ApartamentosApartamentosBundle:Tower:gridemployee.html.twig',array('entity'=>$entity));
          
            //'grid'=>$grid
    
         
    }
    

}
