<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Provider;
use Apartamentos\ApartamentosBundle\Form\ProviderType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Provider controller.
 *
 * @Route("/admin/provider")
 */
class ProviderController extends Controller
{

    /**
     * Lists all Provider entities.
     *
     * @Route("/", name="provider")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Provider')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Provider entity.
     *
     * @Route("/{_locale}/new", name="provider_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Provider:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Provider();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('provider_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Provider entity.
    *
    * @param Provider $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Provider $entity)
    {
        $form = $this->createForm(new ProviderType(), $entity, array(
            'action' => $this->generateUrl('provider_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Provider entity.
     *
     * @Route("/{_locale}/new", name="provider_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Provider();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Provider entity.
     *
     * @Route("/{_locale}/{id}", name="provider_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Provider')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Provider entity.');
        }

        $delete = $this->get('globalfunctions')->verifyaction("Delete Provider");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Provider"); 

        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing Provider entity.
     *
     * @Route("/{_locale}/{id}/edit", name="provider_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Provider')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Provider entity.');
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
    * Creates a form to edit a Provider entity.
    *
    * @param Provider $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Provider $entity)
    {
        $form = $this->createForm(new ProviderType(), $entity, array(
            'action' => $this->generateUrl('provider_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Provider entity.
     *
     * @Route("/{_locale}/{id}/edit", name="provider_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Provider:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Provider')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Provider entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('providergrid', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Provider entity.
     *
     * @Route("/{id}", name="provider_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Provider')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Provider entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('provider'));
    }

    /**
     * Creates a form to delete a Provider entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('provider_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /**
     * Grid Tower.
     *@Route("/{_locale}/providerlist/", name="providergrid")
     */
    public function providergridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Provider');
   
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
        $create= $this->get('globalfunctions')->verifyaction("Create Provider");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Provider");
        
        if ($edit =='S')
        {
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 8);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'provider_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
        } 
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 9);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'provider_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id','createdate','createuser','modifyuser','modifydate','email','address'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Provider:providergrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'provider_new'));
    }
    /**
     * Deletes a Employee entity.
     *@Route("/{_locale}/deleteprovider/{id}", name="provider_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Provider')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Tower entity.');
       }

            $em->remove($entity);
            $em->flush();
       

        return $this->redirect($this->generateUrl('providergrid'));     
    } 
      /**
     * 
     *@Route("/providertower", name="provider_select_tower")
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
