<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Payment;
use Apartamentos\ApartamentosBundle\Entity\Paymentinvoice;
use Apartamentos\ApartamentosBundle\Form\PaymentType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use Symfony\Component\HttpFoundation\JsonResponse;
use PHPPdf\Core\FacadeBuilder;
use Ps\PdfBundle\Annotation\Pdf;
/**
 * Payment controller.
 *
 * @Route("/admin/payment")
 */
class PaymentController extends Controller
{

    /**
     * Lists all Payment entities.
     *
     * @Route("/", name="payment")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Payment')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Payment entity.
     *
     * @Route("/{_locale}/new", name="payment_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Payment:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Payment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            //
            $paymentinvoice = new Paymentinvoice();
            $em2 = $this->getDoctrine()->getManager();
            
            $payment = $em2->getRepository('ApartamentosApartamentosBundle:Payment')->find($entity->getId());
            $paymentinvoice->setPaymentid($payment);
            $paymentinvoice->setDescription($entity->getDescription());
            $em2->persist($paymentinvoice);
            $em2->flush();
            
            
            //
            return $this->redirect($this->generateUrl('payment_show', array('id' => $entity->getId())));
        }


        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Payment entity.
    *
    * @param Payment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Payment $entity)
    {
        $form = $this->createForm(new PaymentType(), $entity, array(
            'action' => $this->generateUrl('payment_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Payment entity.
     *
     * @Route("/{_locale}/new", name="payment_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Payment();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Payment entity.
     *
     * @Route("/{_locale}/{id}", name="payment_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Payment')->find($id);
          
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Payment entity.');
        }
         
        $invoicenumber =$this->Getinvoicenumber($id);
        $deleteForm = $this->createDeleteForm($id);
        $unique_key =$this->randomchar(5);
        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'invoicenumber'=>$invoicenumber,
            'randomchar'=>$unique_key
                
        );
    }

    /**
     * Displays a form to edit an existing Payment entity.
     *
     * @Route("/{_locale}/{id}/edit", name="payment_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Payment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Payment entity.');
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
    * Creates a form to edit a Payment entity.
    *
    * @param Payment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Payment $entity)
    {
        $form = $this->createForm(new PaymentType(), $entity, array(
            'action' => $this->generateUrl('payment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Payment entity.
     *
     * @Route("/{_locale}/{id}/edit", name="payment_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Payment:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Payment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Payment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
             // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('paymentgrid'));    
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Payment entity.
     *
     * @Route("/{_locale}/{id}", name="payment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApartamentosApartamentosBundle:Payment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Payment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('payment'));
    }
     /**
     * Creates a form to delete a Payment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('payment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
     * Grid Payment
     *@Route("/{_locale}/paymentlist/", name="paymentgrid")
     */
    public function PaymentgridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Payment');
         
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
       
       $grid->hideColumns(array('id','description','createdate','createuser','modifyuser','modifydate'));
       //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Payment:paymentgrid.html.twig');
    }
    /**
     * Deletes a Location entity.
     *@Route("/{_locale}/deletepayment/{id}", name="payment_deletemodal")
     */
    public function deletemodalAction($id)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('ApartamentosApartamentosBundle:Payment')->find($id);
      if (!$entity) 
       {
        throw $this->createNotFoundException('Unable to find Payment entity.');
       }

            $em->remove($entity);
            $em->flush();
       

        return $this->redirect($this->generateUrl('paymentgrid'));     
    } 
        /**
     * 
     *@Route("/paymenttower", name="payment_select_tower")
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
    
    /**
     * 
     *@Route("/paymentapt", name="payment_select_apartment")
     */

public function ApartmentsAction(Request $request)
{
    $tower_id = $request->request->get('tower_id');
    $em = $this->getDoctrine()->getManager();
    $apartments = $em->getRepository('ApartamentosApartamentosBundle:Apartment')->findBytowerid($tower_id);
    $html = '';
    foreach($apartments as $apartment)
    {
        $html = $html . sprintf("<option value=\"%d\">%s</option>",$apartment->getId(), $apartment->getNumber());
    }
    return new JsonResponse($html);
}


public function Getinvoicenumber($paymentid)
{
   $em = $this->getDoctrine()->getManager();
   $paymentinvoice = $em->getRepository('ApartamentosApartamentosBundle:Paymentinvoice')->findBypaymentid($paymentid); 
   $invoicenumber = $paymentinvoice[0]->getId(); 
   $invoicechar = strval($invoicenumber);
   $invoicenumberchar =  str_pad($invoicechar ,11,"0", STR_PAD_LEFT);
   return $invoicenumberchar;
   
}  
/**
 *@Pdf()
 *@Route("/{_locale}/{id}/{namevoucher}.pdf", name="paymentinvoice")
 *@Template()
 */
public function PaymentInvoiceAction($id)
{
    $facade = $this->get('ps_pdf.facade');
    
    $em = $this->getDoctrine()->getManager();
    $entity = $em->getRepository('ApartamentosApartamentosBundle:Payment')->find($id);
    $invoicenumber = $this->Getinvoicenumber($id);
    
    $response = new Response();
    $this->render('ApartamentosApartamentosBundle:Payment:paymentinvoice.pdf.twig', array("entity"=>$entity,"invoicenumber"=>$invoicenumber), $response);

    $xml = $response->getContent();

    $content = $facade->render($xml);

    return new Response($content, 200, array('content-type' => 'application/pdf'));
   
    
}

public function randomchar($numchars)
{
 $unique_key = substr(md5(rand(0, 1000000)), 0, $numchars);    
 return $unique_key;   
}

        
}
