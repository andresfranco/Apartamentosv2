<?php

namespace Login\LoginBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Login\LoginBundle\Entity\Multiparam;
use Login\LoginBundle\Form\MultiparamType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;

/**
 * Multiparam controller.
 *
 * @Route("/admin/multiparam")
 */
class MultiparamController extends Controller
{

    /**
     * Lists all Multiparam entities.
     *
     * @Route("/", name="multiparam")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LoginLoginBundle:Multiparam')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Multiparam entity.
     *
     * @Route("/{_locale}/{sysparamid}/new", name="multiparam_create")
     * @Method("POST")
     * @Template("LoginLoginBundle:Multiparam:new.html.twig")
     */
    public function createAction(Request $request,$sysparamid)
    {
        $entity = new Multiparam();
        $form = $this->createformparam($entity,$sysparamid);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('multiparam_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    private function createformparam(Multiparam $entity,$sysparamid)
    {
        $form = $this->createForm(new MultiparamType($sysparamid), $entity, array(
            'action' => $this->generateUrl('multiparam_create', array('sysparamid' =>$sysparamid)),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
    * Creates a form to create a Multiparam entity.
    *
    * @param Multiparam $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Multiparam $entity)
    {
        $form = $this->createForm(new MultiparamType(), $entity, array(
            'action' => $this->generateUrl('multiparam_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Multiparam entity.
     *
     * @Route("/{_locale}/{sysparamid}/new", name="multiparam_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($sysparamid)
    {
        $entity = new Multiparam();
        $form=$this->createformparam($entity,$sysparamid);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'sysparamid'=>$sysparamid
        );
    }

    /**
     * Finds and displays a Multiparam entity.
     *
     * @Route("/{_locale}/{id}", name="multiparam_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Multiparam')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Multiparam entity.');
        }

        $delete = $this->get('globalfunctions')->verifyaction("Delete Multiparam");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Multiparam");

        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing Multiparam entity.
     *
     * @Route("/{_locale}/{id}/{sysparamid}/edit", name="multiparam_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id,$sysparamid)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Multiparam')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Multiparam entity.');
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
    * Creates a form to edit a Multiparam entity.
    *
    * @param Multiparam $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Multiparam $entity)

    {
        $sysparamid=$entity->getSysparamid()->getId();
        $form = $this->createForm(new MultiparamType(), $entity, array(
            'action' => $this->generateUrl('multiparam_update', array('id' => $entity->getId(),'sysparamid'=>$sysparamid)),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Multiparam entity.
     *
     * @Route("/{_locale}/{id}/{sysparamid}", name="multiparam_update")
     * @Method("PUT")
     * @Template("LoginLoginBundle:Multiparam:edit.html.twig")
     */
    public function updateAction(Request $request, $id,$sysparamid)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Multiparam')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Multiparam entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('multiparamgrid',array('sysparamid'=>$sysparamid)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Multiparam entity.
     *
     * @Route("/{id}", name="multiparam_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LoginLoginBundle:Multiparam')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Multiparam entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('multiparam'));
    }

    /**
     * Creates a form to delete a Multiparam entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('multiparam_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
     * multiparam grid.
     *
     * @Route("/multiparamgrid/{_locale}/{sysparamid}", name="multiparamgrid")
     */
    public function multiparamgrid($sysparamid)
    {
        // Creates a simple grid based on your entity (ORM)
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoginLoginBundle:Sysparam')->find($sysparamid);
        $source = new Entity('LoginLoginBundle:Multiparam');

        // Get a Grid instance
        $grid = $this->get('grid');
        $tableAlias = $source->getTableAlias();
        $source->manipulateQuery(
            function ($query) use ($tableAlias,$sysparamid)
            {

                $query->andWhere($tableAlias . '.sysparamid='.$sysparamid);
            }
        );

        // Attach the source to the grid
        $grid->setSource($source);

        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);

        // Add Edit actions in the default row actions column
        //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Multiparam");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Multiparam");

        if ($edit =='S')
        {

            $editColumn = new ActionsColumn('info_column_1', '');
            $editColumn->setSeparator("<br />");
            $grid->addColumn($editColumn, 5);
            // Attach a rowAction to the Actions Column
            $editAction = new RowAction('Edit', 'multiparam_edit', false, '_self', array('class' => 'editar'));
            $editAction->setColumn('info_column_1');
            $grid->addRowAction($editAction);
        }
        $showColumn = new ActionsColumn('info_column_2', '');
        $showColumn->setSeparator("<br />");
        $grid->addColumn($showColumn, 6);
        // Attach a rowAction to the Actions Column

        $showAction = new RowAction('Show', 'multiparam_show',false, '_self', array('class' => 'mostrar'));

        $showAction->setColumn('info_column_2');
        $grid->addRowAction($showAction);


        $grid->hideColumns(array('id','createuser','modifyuser','createdate','modifydate'));
        return $grid->getGridResponse('LoginLoginBundle:Multiparam:multiparamgrid.html.twig',array('entity'=>$entity,'create'=>$create,'edit'=>$edit,'urlnew'=>'multiparam_new'));
    }
    /**
     * Delete multiparam entity.
     *@Route("/{_locale}/delemultiparam/{sysparamid}/{id}", name="action_deletemultiparam")
     */

    public function deletemodalAction($id,$sysparamid)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LoginLoginBundle:Multiparam')->find($id);
        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Multiparam entity.');
        }
        try {
            $em->remove($entity);
            $em->flush();
        }
        catch(\Doctrine\DBAL\DBALException $e)
        {
            $this->get('session')->getFlashBag()->add('error', 'delete.multiparam.exception');

            return $this->redirect($this->generateUrl('multiparam_show',array('id'=> $entity->getId())));
        }

        return $this->redirect($this->generateUrl('multiparamgrid',array('sysparamid'=>$sysparamid)));
    }
}
