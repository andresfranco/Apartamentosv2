<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Income;
use Apartamentos\ApartamentosBundle\Form\IncomeType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Income controller.
 *
 * @Route("/admin/income")
 */
class IncomeController extends Controller
{

    /**
     * Lists all Income entities.
     *
     * @Route("/", name="income")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Income')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Income entity.
     *
     * @Route("/{_locale}/new", name="income_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Income:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Income();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('income_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Income entity.
    *
    * @param Income $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Income $entity)
    {
        $form = $this->createForm(new IncomeType(), $entity, array(
            'action' => $this->generateUrl('income_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Income entity.
     *
     * @Route("/{_locale}/new", name="income_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Income();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Income entity.
     *
     * @Route("/{_locale}/{id}", name="income_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Income')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Income entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Income entity.
     *
     * @Route("/{_locale}/{id}/edit", name="income_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Income')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Income entity.');
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
    * Creates a form to edit a Income entity.
    *
    * @param Income $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Income $entity)
    {
        $form = $this->createForm(new IncomeType(), $entity, array(
            'action' => $this->generateUrl('income_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Income entity.
     *
     * @Route("/{_locale}/{id}/edit", name="income_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Income:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Income')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Income entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

             return $this->redirect($this->generateUrl('incomegrid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Income entity.
     *
     * @Route("/{_locale}/{id}", name="income_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Income')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Income entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('income'));
    }

    /**
     * Creates a form to delete a Income entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('income_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
     * Grid Location
     *@Route("/{_locale}/incomelist/", name="incomegrid")
     */
    public function IncomegridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Income');
         
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
         $editAction = new RowAction('Edit', 'income_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
         
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 11);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'income_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id','description','createdate','createuser','modifyuser','modifydate'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Income:incomegrid.html.twig');
    }
    /**
     * Deletes a Income entity.
     *@Route("/{_locale}/deleteincome/{id}", name="income_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Income')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Income entity.');
       }

            $em->remove($entity);
            $em->flush();
       

        return $this->redirect($this->generateUrl('incomegrid'));     
    } 
    
    
    
         /**
     * 
     *@Route("/incomeapt", name="income_select_tower")
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
