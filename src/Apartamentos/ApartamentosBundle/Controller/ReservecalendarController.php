<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Reservecalendar;
use Apartamentos\ApartamentosBundle\Form\ReservecalendarType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Reservecalendar controller.
 *
 * @Route("/admin/reservecalendar")
 */
class ReservecalendarController extends Controller
{

    /**
     * Lists all Reservecalendar entities.
     *
     * @Route("/", name="reservecalendar")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Reservecalendar')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Reservecalendar entity.
     *
     * @Route("/allevents", name="allevents")
     */
    public function Getallevents()
    {
        $em = $this->getDoctrine()->getManager();

        $items = $em->getRepository('ApartamentosApartamentosBundle:Reservecalendar')->findAll();

        $serializer = $this->container->get('serializer');
        $events = array();
        foreach ($items as $reservations) {
            $events[] = $serializer->normalize($reservations, 'json');
        }
        return new JsonResponse($events);
    }

    /**
     * Creates a new Reservecalendar entity.
     *
     * @Route("/", name="reservecalendar_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Reservecalendar:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Reservecalendar();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reservecalendar_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Reservecalendar entity.
    *
    * @param Reservecalendar $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Reservecalendar $entity)
    {
        $form = $this->createForm(new ReservecalendarType(), $entity, array(
            'action' => $this->generateUrl('reservecalendar_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Reservecalendar entity.
     *
     * @Route("/new", name="reservecalendar_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Reservecalendar();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Reservecalendar entity.
     *
     * @Route("/{id}", name="reservecalendar_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Reservecalendar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reservecalendar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }



    /**
     * Displays a form to edit an existing Reservecalendar entity.
     *
     * @Route("/{id}/edit", name="reservecalendar_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Reservecalendar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reservecalendar entity.');
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
    * Creates a form to edit a Reservecalendar entity.
    *
    * @param Reservecalendar $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Reservecalendar $entity)
    {
        $form = $this->createForm(new ReservecalendarType(), $entity, array(
            'action' => $this->generateUrl('reservecalendar_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Reservecalendar entity.
     *
     * @Route("/{id}", name="reservecalendar_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Reservecalendar:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Reservecalendar')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reservecalendar entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reservecalendar_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Reservecalendar entity.
     *
     * @Route("/{id}", name="reservecalendar_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Reservecalendar')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Reservecalendar entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reservecalendar'));
    }

    /**
     * Creates a form to delete a Reservecalendar entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservecalendar_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
