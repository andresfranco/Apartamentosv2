<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\ExpenseInvoice;
use Apartamentos\ApartamentosBundle\Form\ExpenseInvoiceType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;

/**
 * ExpenseInvoice controller.
 *
 * @Route("/admin/expenseinvoice")
 */
class ExpenseInvoiceController extends Controller
{

    /**
     * Lists all ExpenseInvoice entities.
     *
     * @Route("/", name="expenseinvoice")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:ExpenseInvoice')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ExpenseInvoice entity.
     *
     * @Route("/{_locale}/{id}", name="expenseinvoice_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:ExpenseInvoice:new.html.twig")
     */
    public function createAction(Request $request,$id)
    {
        $expid=$id;
        $entity = new ExpenseInvoice();
        //$form = $this->createCreateForm($entity);
       $form=$this->createformparam($entity, $expid);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('expenseinvoice_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a ExpenseInvoice entity.
    *
    * @param ExpenseInvoice $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ExpenseInvoice $entity)
    {
        $form = $this->createForm(new ExpenseInvoiceType(), $entity, array(
            'action' => $this->generateUrl('expenseinvoice_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    private function createformparam(ExpenseInvoice $entity,$expenseid)
    {
        $form = $this->createForm(new ExpenseInvoiceType($expenseid), $entity, array(
            'action' => $this->generateUrl('expenseinvoice_create', array('id' =>$expenseid)),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
    /**
     * Displays a form to create a new ExpenseInvoice entity.
     *
     * @Route("/{_locale}/{id}/new", name="expenseinvoice_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    { 
        $expid=$id;
        $entity = new ExpenseInvoice();
        $form=$this->createformparam($entity, $expid);
        //$form   = $this->createCreateForm($entity);
        //$form->getData()->getExpenseid()->setExpenseid($id);
       
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'expenseid'=>$expid
        );
    }

    /**
     * Finds and displays a ExpenseInvoice entity.
     *
     * @Route("/{_locale}/{id}", name="expenseinvoice_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:ExpenseInvoice')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ExpenseInvoice entity.');
        }

        $delete = $this->get('globalfunctions')->verifyaction("Delete ExpenseDocument");
        $edit= $this->get('globalfunctions')->verifyaction("Edit ExpenseDocument");

        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit
        );
    }

    /**
     * Displays a form to edit an existing ExpenseInvoice entity.
     *
     * @Route("/{_locale}/{id}/{expid}/edit", name="expenseinvoice_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id,$expid)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:ExpenseInvoice')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ExpenseInvoice entity.');
        }
         
        $editForm =$this->createEditForm($entity);
        

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
            
        );
    }

    /**
    * Creates a form to edit a ExpenseInvoice entity.
    *
    * @param ExpenseInvoice $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ExpenseInvoice $entity)
    {
        $expid=$entity->getExpenseid()->getId();
        $form = $this->createForm(new ExpenseInvoiceType($expid), $entity, array(
            'action' => $this->generateUrl('expenseinvoice_update', array('id' => $entity->getId(),'expid'=>$expid)),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ExpenseInvoice entity.
     *
     * @Route("/{_locale}/{id}/{expid}", name="expenseinvoice_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:ExpenseInvoice:edit.html.twig")
     */
    public function updateAction(Request $request, $id,$expid)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:ExpenseInvoice')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ExpenseInvoice entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('expenseinvoicegrid',array('id'=>$expid)));      
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ExpenseInvoice entity.
     *
     * @Route("/{id}", name="expenseinvoice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:ExpenseInvoice')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ExpenseInvoice entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('expenseinvoice'));
    }

    /**
     * Creates a form to delete a ExpenseInvoice entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('expenseinvoice_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
      
/**
 * @Template()
 */
public function uploadAction(Request $request)
{
    $document = new Document();
    $form = $this->createFormBuilder($document)
        ->add('name')
        ->add('file')
        ->getForm();

    $form->handleRequest($request);

    if ($form->isValid()) {
    $em = $this->getDoctrine()->getManager();

    $document->upload();

    $em->persist($document);
    $em->flush();

    return $this->redirect('expenseinvoice');
}

    return array('form' => $form->createView());
}
public function upload()
{
    // the file property can be empty if the field is not required
    if (null === $this->getFile()) {
        return;
    }

    // aquí usa el nombre de archivo original pero lo debes
    // sanear al menos para evitar cualquier problema de seguridad

    // move takes the target directory and then the
    // target filename to move to
    $this->getFile()->move(
        $this->getUploadRootDir(),
        $this->getFile()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->path = $this->getFile()->getClientOriginalName();

    // limpia la propiedad «file» ya que no la necesitas más
    $this->file = null;
}
/**
     * Grid ExpenseInvoice
     @Route("/expensedocuments/{_locale}/{id}", name="expenseinvoicegrid")
     */
     public function Expensedocumentsgrid($id)
    {
         $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Expense')->find($id); 
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:ExpenseInvoice');
        
        
        // Get a Grid instance
       $grid = $this->get('grid');
       $tableAlias = $source->getTableAlias();
       $source->manipulateQuery(
       function ($query) use ($tableAlias,$id)        
      {
          
        $query->andWhere($tableAlias . '.expenseid='.$id);
      }
      );
        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);
        
        //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create ExpenseDocument");
        $edit = $this->get('globalfunctions')->verifyaction("Edit ExpenseDocument");
        
        if ($edit =='S')
        {
        $editColumn = new ActionsColumn('info_column_1', '');
        $editColumn->setSeparator("<br />");
        $grid->addColumn($editColumn, 18);
        // Attach a rowAction to the Actions Column
         $editAction = new RowAction('Edit', 'expenseinvoice_edit',false, '_self', array('class' => 'editar'));
         $editAction->setColumn('info_column_1');
         $editAction->setRouteParameters(array('id','expid' =>$id));
         $grid->addRowAction($editAction);
        }  
         $showColumn = new ActionsColumn('info_column_2', '');
         $showColumn->setSeparator("<br />");
         $grid->addColumn($showColumn, 19);
        // Attach a rowAction to the Actions Column
         
         $showAction = new RowAction('Show', 'expenseinvoice_show',false, '_self', array('class' => 'mostrar'));
         
         $showAction->setColumn('info_column_2');
         $grid->addRowAction($showAction);
       
       $grid->hideColumns(array( 'id','createdate','createuser','modifyuser','modifydate'));
       //$grid->
       //$grid->getGridResponse();
       //return array(
        //'grid' => $grid
      // );
         return $grid->getGridResponse('ApartamentosApartamentosBundle:ExpenseInvoice:gridexpenseinvoice.html.twig',array('entity'=>$entity,'create'=>$create,'edit'=>$edit,'urlnew'=>'expenseinvoice_new'));
    } 
    
     /**
     * Deletes a ExpenseInvoice entity.
     *@Route("/{_locale}/deleteexpenseinvoice/{expid}/{id}", name="expenseinvoice_deletemodal")
     */
    public function deletemodalAction($expid,$id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:ExpenseInvoice')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Expense entity.');
       }

            $em->remove($entity);
            $em->flush();
       

        return $this->redirect($this->generateUrl('expenseinvoicegrid',array('id'=>$expid)));     
    }
    
    /**
 * @Route("/{_locale}/download_file/{fileId}", name="download_file")
 */
public function downloadFileAction($fileId)
{
    $em = $this->getDoctrine()->getManager();
   $entity = $em->getRepository('ApartamentosApartamentosBundle:ExpenseInvoice')->find($fileId);
    
    $filename =$entity->getPath();

    $response = new Response();
    //$response->headers->set('Content-Type', mime_content_type($filename));
    $response->headers->set('Content-Disposition', 'attachment; filename="' . basename($filename) . '"');
    //$response->headers->set('Content-Length', filesize($filename));
    $response->headers->set('Pragma', "no-cache");
    $response->headers->set('Expires', "0");
    $response->headers->set('Content-Transfer-Encoding', "binary");

    $response->sendHeaders();

    $response->setContent(readfile('documents/expenses/'.$filename));

    return $response; 
}
    


}
