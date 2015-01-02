<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\ConstCompany;
use Apartamentos\ApartamentosBundle\Form\ConstCompanyType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;
/**
 * ConstCompany controller.
 *
 * @Route("/admin/constcompany")
 */
class ConstCompanyController extends Controller
{

    /**
     * Lists all ConstCompany entities.
     *
     * @Route("/", name="constcompany")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:ConstCompany')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ConstCompany entity.
     *
     * @Route("/{_locale}/new", name="constcompany_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:ConstCompany:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ConstCompany();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('constcompany_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ConstCompany entity.
    *
    * @param ConstCompany $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ConstCompany $entity)
    {
        $form = $this->createForm(new ConstCompanyType(), $entity, array(
            'action' => $this->generateUrl('constcompany_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new ConstCompany entity.
     *
     * @Route("/{_locale}/new", name="constcompany_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ConstCompany();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ConstCompany entity.
     *
     * @Route("/{_locale}/{id}", name="constcompany_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:ConstCompany')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConstCompany entity.');
        }

        $delete = $this->get('globalfunctions')->verifyaction("Delete Ccompany");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Ccompany");

        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing ConstCompany entity.
     *
     * @Route("/{_locale}/{id}/edit", name="constcompany_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:ConstCompany')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConstCompany entity.');
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
    * Creates a form to edit a ConstCompany entity.
    *
    * @param ConstCompany $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ConstCompany $entity)
    {
        $form = $this->createForm(new ConstCompanyType(), $entity, array(
            'action' => $this->generateUrl('constcompany_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing ConstCompany entity.
     *
     * @Route("/{_locale}/{id}", name="constcompany_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:ConstCompany:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:ConstCompany')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConstCompany entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('constcompanygrid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ConstCompany entity.
     *
     * @Route("/{id}", name="constcompany_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:ConstCompany')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConstCompany entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('constcompany'));
    }

    /**
     * Creates a form to delete a ConstCompany entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('constcompany_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
     /**
     * Grid ConstCompany
     *@Route("/{_locale}/constcompanylist/", name="constcompanygrid")
     */
    public function ConstcompanygridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:ConstCompany');
         
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
         //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Ccompany");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Ccompany");
        
        if ($edit =='S')
        {
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 10);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'constcompany_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $grid->addRowAction($editAction);
        } 
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 11);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'constcompany_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array('id','address','createdate','createuser','modifyuser','modifydate'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:ConstCompany:constcompanygrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'constcompany_new'));
    }
    /**
     * Deletes a Location entity.
     *@Route("/{_locale}/deleteconstcompany/{id}", name="constcompany_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:ConstCompany')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find ConstCompany entity.');
       }
             try {
                $em->remove($entity);
                $em->flush();
            } 
            catch(\Doctrine\DBAL\DBALException $e)
            {
            $this->get('session')->getFlashBag()->add('error', 'delete.constcompany.dbaexception');
              
            return $this->redirect($this->generateUrl('constcompany_show',array('id'=> $entity->getId())));   
            }
            
         return $this->redirect($this->generateUrl('constcompanygrid'));  ;     
    } 
}
