<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Paymentmethod;
use Apartamentos\ApartamentosBundle\Form\PaymentmethodType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
/**
 * Paymentmethod controller.
 *
 * @Route("/admin/paymentmethod")
 */
class PaymentmethodController extends Controller
{

    /**
     * Lists all Paymentmethod entities.
     *
     * @Route("/", name="paymentmethod")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Paymentmethod')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Paymentmethod entity.
     *
     * @Route("/{_locale}/new", name="paymentmethod_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Paymentmethod:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Paymentmethod();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('paymentmethod_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Paymentmethod entity.
    *
    * @param Paymentmethod $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Paymentmethod $entity)
    {
        $form = $this->createForm(new PaymentmethodType(), $entity, array(
            'action' => $this->generateUrl('paymentmethod_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Paymentmethod entity.
     *
     * @Route("/{_locale}/new", name="paymentmethod_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Paymentmethod();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Paymentmethod entity.
     *
     * @Route("/{_locale}/{id}", name="paymentmethod_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Paymentmethod')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paymentmethod entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Paymentmethod entity.
     *
     * @Route("/{_locale}/{id}/edit", name="paymentmethod_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Paymentmethod')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paymentmethod entity.');
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
    * Creates a form to edit a Paymentmethod entity.
    *
    * @param Paymentmethod $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Paymentmethod $entity)
    {
        $form = $this->createForm(new PaymentmethodType(), $entity, array(
            'action' => $this->generateUrl('paymentmethod_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Paymentmethod entity.
     *
     * @Route("/{_locale}/{id}/edit", name="paymentmethod_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Paymentmethod:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Paymentmethod')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paymentmethod entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('paymentmethod_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Paymentmethod entity.
     *
     * @Route("/{_locale}/{id}", name="paymentmethod_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Paymentmethod')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Paymentmethod entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('paymentmethod'));
    }

    /**
     * Creates a form to delete a Paymentmethod entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('paymentmethod_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
     * Grid Payment
     *@Route("/{_locale}/paymentmethodlist/", name="paymentmethodgrid")
     */
    public function PaymentmethodgridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Paymentmethod');
         
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
         $editAction = new RowAction('Edit', 'payment_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
         
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 11);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'payment_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Paymentmethod:paymentmethodgrid.html.twig');
    }
    /**
     * Deletes a Location entity.
     *@Route("/{_locale}/deletepaymentmethod/{id}", name="paymentmethod_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Paymentmethod')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Paymentmethod entity.');
       }

            $em->remove($entity);
            $em->flush();
       

        return $this->redirect($this->generateUrl('paymentmethodgrid'));     
    } 
}
