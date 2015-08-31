<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Usercomment;
use Apartamentos\ApartamentosBundle\Form\UsercommentType;

/**
 * Usercomment controller.
 *
 * @Route("/usercomment")
 */
class UsercommentController extends Controller
{

    /**
     * Lists all Usercomment entities.
     *
     * @Route("/", name="usercomment")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Usercomment')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Usercomment entity.
     *
     * @Route("/", name="usercomment_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Usercomment:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Usercomment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usercomment_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Usercomment entity.
     *
     * @param Usercomment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Usercomment $entity)
    {
        $form = $this->createForm(new UsercommentType(), $entity, array(
            'action' => $this->generateUrl('usercomment_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Usercomment entity.
     *
     * @Route("/new", name="usercomment_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Usercomment();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Usercomment entity.
     *
     * @Route("/{id}", name="usercomment_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Usercomment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usercomment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Usercomment entity.
     *
     * @Route("/{id}/edit", name="usercomment_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Usercomment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usercomment entity.');
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
    * Creates a form to edit a Usercomment entity.
    *
    * @param Usercomment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Usercomment $entity)
    {
        $form = $this->createForm(new UsercommentType(), $entity, array(
            'action' => $this->generateUrl('usercomment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Usercomment entity.
     *
     * @Route("/{id}", name="usercomment_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Usercomment:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Usercomment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usercomment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('usercomment_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Usercomment entity.
     *
     * @Route("/{id}", name="usercomment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Usercomment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usercomment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usercomment'));
    }

    /**
     * Creates a form to delete a Usercomment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usercomment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
