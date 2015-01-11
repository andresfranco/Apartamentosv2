<?php

namespace Login\LoginBundle\Controller;

use Login\LoginBundle\Entity\Multiparam;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Login\LoginBundle\Entity\Sysparam;
use Login\LoginBundle\Form\SysparamType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;

/**
 * Sysparam controller.
 *
 * @Route("/admin/sysparams")
 */
class SysparamController extends Controller
{

    /**
     * Lists all Sysparam entities.
     *
     * @Route("/", name="sysparam")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LoginLoginBundle:Sysparam')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Sysparam entity.
     *
     * @Route("/{_locale}/new", name="sysparam_create")
     * @Method("POST")
     * @Template("LoginLoginBundle:Sysparam:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Sysparam();

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users

            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sysparam_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Sysparam entity.
    *
    * @param Sysparam $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Sysparam $entity)
    {
        $form = $this->createForm(new SysparamType(), $entity, array(
            'action' => $this->generateUrl('sysparam_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Sysparam entity.
     *
     * @Route("/{_locale}/new", name="sysparam_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Sysparam();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Sysparam entity.
     *
     * @Route("/{_locale}/{id}", name="sysparam_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Sysparam')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sysparam entity.');
        }

        $delete = $this->get('globalfunctions')->verifyaction("Delete Sysparam");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Sysparam");


        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing Sysparam entity.
     *
     * @Route("/{_locale}/{id}/edit", name="sysparam_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Sysparam')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sysparam entity.');
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
    * Creates a form to edit a Sysparam entity.
    *
    * @param Sysparam $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Sysparam $entity)
    {
        $form = $this->createForm(new SysparamType(), $entity, array(
            'action' => $this->generateUrl('sysparam_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Sysparam entity.
     *
     * @Route("/{_locale}/{id}", name="sysparam_update")
     * @Method("PUT")
     * @Template("LoginLoginBundle:Sysparam:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Sysparam')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sysparam entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('sysparamgrid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Sysparam entity.
     *
     * @Route("/{id}", name="sysparam_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LoginLoginBundle:Sysparam')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sysparam entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sysparamgrid'));
    }

    /**
     * Creates a form to delete a Sysparam entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sysparam_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
     * Sysparam grid.
     *
     * @Route("/{_locale}", name="sysparamgrid")
     */
    public function sysparamgrid()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('LoginLoginBundle:Sysparam');

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
        $create= $this->get('globalfunctions')->verifyaction("Create Sysparam");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Sysparam");

        if ($edit =='S')
        {

            $editColumn = new ActionsColumn('info_column_1', '');
            $editColumn->setSeparator("<br />");
            $grid->addColumn($editColumn, 5);
            // Attach a rowAction to the Actions Column
            $editAction = new RowAction('Edit', 'sysparam_edit', false, '_self', array('class' => 'editar'));
            $editAction->setColumn('info_column_1');
            $grid->addRowAction($editAction);
        }
        $showColumn = new ActionsColumn('info_column_2', '');
        $showColumn->setSeparator("<br />");
        $grid->addColumn($showColumn, 6);
        // Attach a rowAction to the Actions Column

        $showAction = new RowAction('Show', 'sysparam_show',false, '_self', array('class' => 'mostrar'));

        $showAction->setColumn('info_column_2');
        $grid->addRowAction($showAction);


        $grid->hideColumns(array('id','createuser','modifyuser','createdate','modifydate'));
        return $grid->getGridResponse('LoginLoginBundle:Sysparam:sysparamgrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'sysparam_new'));
    }
    /**
     * Delete Sysparam entity.
     *@Route("/{_locale}/delesysparam/{id}", name="action_deletesysparam")
     */

    public function deletemodalAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LoginLoginBundle:Sysparam')->find($id);
        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Sysparam entity.');
        }
        try {
            $em->remove($entity);
            $em->flush();
        }
        catch(\Doctrine\DBAL\DBALException $e)
        {
            $this->get('session')->getFlashBag()->add('error', 'delete.sysparam.exception');

            return $this->redirect($this->generateUrl('sysparam_show',array('id'=> $entity->getId())));
        }

        return $this->redirect($this->generateUrl('sysparamgrid'));
    }
}
