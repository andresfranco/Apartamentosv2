<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\IncomeInvoice;
use Apartamentos\ApartamentosBundle\Form\IncomeInvoiceType;

/**
 * IncomeInvoice controller.
 *
 * @Route("/incomeinvoice")
 */
class IncomeInvoiceController extends Controller
{

    /**
     * Lists all IncomeInvoice entities.
     *
     * @Route("/", name="incomeinvoice")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:IncomeInvoice')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new IncomeInvoice entity.
     *
     * @Route("/", name="incomeinvoice_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:IncomeInvoice:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new IncomeInvoice();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('incomeinvoice_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a IncomeInvoice entity.
    *
    * @param IncomeInvoice $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(IncomeInvoice $entity)
    {
        $form = $this->createForm(new IncomeInvoiceType(), $entity, array(
            'action' => $this->generateUrl('incomeinvoice_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new IncomeInvoice entity.
     *
     * @Route("/new", name="incomeinvoice_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new IncomeInvoice();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a IncomeInvoice entity.
     *
     * @Route("/{id}", name="incomeinvoice_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:IncomeInvoice')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IncomeInvoice entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing IncomeInvoice entity.
     *
     * @Route("/{id}/edit", name="incomeinvoice_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:IncomeInvoice')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IncomeInvoice entity.');
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
    * Creates a form to edit a IncomeInvoice entity.
    *
    * @param IncomeInvoice $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(IncomeInvoice $entity)
    {
        $form = $this->createForm(new IncomeInvoiceType(), $entity, array(
            'action' => $this->generateUrl('incomeinvoice_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing IncomeInvoice entity.
     *
     * @Route("/{id}", name="incomeinvoice_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:IncomeInvoice:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:IncomeInvoice')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find IncomeInvoice entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('incomeinvoice_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a IncomeInvoice entity.
     *
     * @Route("/{id}", name="incomeinvoice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:IncomeInvoice')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find IncomeInvoice entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('incomeinvoice'));
    }

    /**
     * Creates a form to delete a IncomeInvoice entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('incomeinvoice_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
