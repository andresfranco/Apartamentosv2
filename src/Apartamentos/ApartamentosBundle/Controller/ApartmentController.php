<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Apartment;
use Apartamentos\ApartamentosBundle\Form\ApartmentType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Apartment controller.
 *
 * @Route("/admin/apartment")
 */
class ApartmentController extends Controller
{

    /**
     * Lists all Apartment entities.
     *
     * @Route("/", name="apartment")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Apartment')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Apartment entity.
     *
     * @Route("/{_locale}/new", name="apartment_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Apartment:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Apartment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('apartment_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Apartment entity.
    *
    * @param Apartment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Apartment $entity)
    {
        $form = $this->createForm(new ApartmentType(), $entity, array(
            'action' => $this->generateUrl('apartment_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Apartment entity.
     *
     * @Route("/{_locale}/new", name="apartment_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Apartment();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Apartment entity.
     *
     * @Route("/{_locale}/{id}", name="apartment_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Apartment')->find($id);
        $towerid=$entity->getTowerid()->getId();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Apartment entity.');
        }

        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Resident');
       $tableAlias = $source->getTableAlias();
       $source->manipulateQuery(
       function ($query) use ($tableAlias,$id,$towerid)        
      {
        
 
        $query->andWhere($tableAlias . '.apartmentid='.$id .' and '.$tableAlias.'.towerid='.$towerid);
      }
      );
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
        // Add Edit actions in the default row actions column
        
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 10);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'residents_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
         
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 11);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'residents_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id','idnumbertype','holder'));
       //$grid->
        $delete = $this->get('globalfunctions')->verifyaction("Delete Apartment");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Apartment");
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Apartment:show.html.twig', 
                array('entity'=>$entity,'deleteaction'=>$delete,'editaction'=>$edit));

    }

    /**
     * Displays a form to edit an existing Apartment entity.
     *
     * @Route("/{_locale}/{id}/edit", name="apartment_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Apartment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Apartment entity.');
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
    * Creates a form to edit a Apartment entity.
    *
    * @param Apartment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Apartment $entity)
    {
        $form = $this->createForm(new ApartmentType(), $entity, array(
            'action' => $this->generateUrl('apartment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Apartment entity.
     *
     * @Route("/{_locale}/{id}/edit", name="apartment_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Apartment:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Apartment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Apartment entity.');
        }
        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('apartmentgrid', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Apartment entity.
     *
     * @Route("/{id}", name="apartment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Apartment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Apartment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('apartmentgrid'));
    }

    /**
     * Creates a form to delete a Apartment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('apartment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
     /**
     * Deletes a Tower entity.
     *@Route("/{_locale}/deleteapartment/{id}", name="apartment_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Apartment')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Apartment entity.');
       }
             try {
                $em->remove($entity);
                $em->flush();
            } 
            catch(\Doctrine\DBAL\DBALException $e)
            {
            $this->get('session')->getFlashBag()->add('error', 'delete.apartment.dbaexception');
              
            return $this->redirect($this->generateUrl('apartment_show',array('id'=> $entity->getId())));   
            }
            
         return $this->redirect($this->generateUrl('apartmentgrid'));       
    }   
     /**
     *Grid Apartment.
     *@Route("/{_locale}/apartmentlist/", name="apartmentgrid")
     */
    public function apartmentAction()
            
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Apartment');
         
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
        $create= $this->get('globalfunctions')->verifyaction("Create Apartment");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Apartment");
        
        if ($edit =='S')
        {
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 18);
        
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'apartment_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
         }
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 19);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'apartment_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array( 'id','area','numberresidents','floornumber','rooms','hasmade','hasbabysitting','haspet','hasmaderoom','haskids','petkind','petnumber','numberofkids','createdate','createuser','modifyuser','modifydate'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Apartment:apartmentgrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'apartment_new'));
    }
    
    /**
     *Grid Apartment.
     *@Route("/{_locale}/apartmentresident/{id}", name="apartmentresidentgrid")
     */
    public function apartmentresidentAction($id)
            
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Apartment')->find($id);
        $towerid=$entity->getTowerid()->getId();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Apartment entity.');
        }

        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Resident');
       $tableAlias = $source->getTableAlias();
       $source->manipulateQuery(
       function ($query) use ($tableAlias,$id,$towerid)        
      {
        
 
        $query->andWhere($tableAlias . '.apartmentid='.$id .' and '.$tableAlias.'.towerid='.$towerid);
      }
      );
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
        $create= $this->get('globalfunctions')->verifyaction("Create Resident");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Resident");
        // Add Edit actions in the default row actions column
        
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 12);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'residents_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
         
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 13);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'residents_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id','idnumbertype','holder','createdate','createuser','modifyuser','modifydate'));
       //$grid->
      
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Apartment:gridresident.html.twig', array('entity'=>$entity,'create'=>$create,'edit'=>$edit));

    }
    
    
    
    
    
      /**
     * 
     *@Route("/residentapt", name="apartment_select_tower")
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
    
}
