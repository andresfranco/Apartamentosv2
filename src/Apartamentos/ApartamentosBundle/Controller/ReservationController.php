<?php

namespace Apartamentos\ApartamentosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Reservation;
use Apartamentos\ApartamentosBundle\Form\ReservationType;
use Apartamentos\ApartamentosBundle\Entity\Account;
use Apartamentos\ApartamentosBundle\Form\AccountType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Reservation controller.
 *
 * @Route("/admin/reservation")
 */
class ReservationController extends Controller
{

    /**
     * Lists all Reservation entities.
     *
     * @Route("/", name="reservation")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApartamentosApartamentosBundle:Reservation')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Reservation entity.
     *
     * @Route("/{_locale}/new", name="reservation_create")
     * @Method("POST")
     * @Template("ApartamentosApartamentosBundle:Reservation:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Reservation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'ins');
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reservation_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Reservation entity.
    *
    * @param Reservation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Reservation $entity)
    {
        $form = $this->createForm(new ReservationType($this->get('globalfunctions')), $entity, array(
            'action' => $this->generateUrl('reservation_create'),
            'method' => 'POST',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Reservation entity.
     *
     * @Route("/{_locale}/new", name="reservation_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Reservation();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Reservation entity.
     *
     * @Route("/{_locale}/{id}", name="reservation_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Reservation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reservation entity.');
        }

        $delete = $this->get('globalfunctions')->verifyaction("Delete Reservation");
        $edit= $this->get('globalfunctions')->verifyaction("Edit Reservation");
        $hourfrommask=$this->get('globalfunctions')->gethourmask('reservehours',$entity->getHourfrom());
        $hourtomask  =$this->get('globalfunctions')->gethourmask('reservehours',$entity->getHourTo());
        $reason =$this->get('globalfunctions')->getcausebyid($entity->getReason());
        return array(
            'entity'      => $entity,
            'deleteaction'=>$delete,
            'editaction'=>$edit,
            'hourfrom'=>$hourfrommask,
            'hourto'=>$hourtomask,
            'reason'=>$reason

        );
    }

    /**
     * Displays a form to edit an existing Reservation entity.
     *
     * @Route("/{_locale}/{id}/edit", name="reservation_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Reservation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reservation entity.');
        }

        $editForm = $this->createEditForm($entity);


        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()

        );
    }

    /**
    * Creates a form to edit a Reservation entity.
    *
    * @param Reservation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Reservation $entity)
    {
        $form = $this->createForm(new ReservationType($this->get('globalfunctions')), $entity, array(
            'action' => $this->generateUrl('reservation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr' => array('id' => 'form')
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Reservation entity.
     *
     * @Route("/{_locale}/{id}", name="reservation_update")
     * @Method("PUT")
     * @Template("ApartamentosApartamentosBundle:Reservation:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApartamentosApartamentosBundle:Reservation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reservation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            // Save Audit date and users
            $entity=$this->get('globalfunctions')->Audit($entity,'upd');
            $em->flush();

            return $this->redirect($this->generateUrl('reservationgrid'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        );
    }
    /**
     * Grid Location
     *@Route("/{_locale}/reservations/", name="reservationgrid")
     */
    public function ReservationgridAction()
    {
        // Creates a simple grid based on your entity (ORM)
        $source = new Entity('ApartamentosApartamentosBundle:Reservation');

        $source->manipulateRow(
            function ($row)
            {
                $hourfrommask=$this->get('globalfunctions')->gethourmask('reservehours',$row->getEntity()->getHourfrom());
                $hourtomask  =$this->get('globalfunctions')->gethourmask('reservehours',$row->getEntity()->getHourto());
                //$hourvalue=array_column($hourmask, 0);
                $row->setField('hourfrom',$hourfrommask);
                $row->setField('hourto',$hourtomask);



                return $row;
            }
        );


        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);

        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);

        //Validate create and edit actions
        $create= $this->get('globalfunctions')->verifyaction("Create Reservation");
        $edit = $this->get('globalfunctions')->verifyaction("Edit Reservation");

        if ($edit =='S')
        {
            $editColumn = new ActionsColumn('info_column_1', '');
            $editColumn->setSeparator("<br />");
            $grid->addColumn($editColumn, 10);
            // Attach a rowAction to the Actions Column
            $editAction = new RowAction('Edit', 'reservation_edit',false, '_self', array('class' => 'editar'));
            $editAction->setColumn('info_column_1');
            $grid->addRowAction($editAction);
        }
        $showColumn = new ActionsColumn('info_column_2', '');
        $showColumn->setSeparator("<br />");
        $grid->addColumn($showColumn, 11);
        // Attach a rowAction to the Actions Column

        $showAction = new RowAction('Show', 'reservation_show',false, '_self', array('class' => 'mostrar'));

        $showAction->setColumn('info_column_2');
        $grid->addRowAction($showAction);

        $grid->hideColumns(array('id','createdate','createuser','modifyuser','modifydate'));
        //$grid->
        return $grid->getGridResponse('ApartamentosApartamentosBundle:Reservation:reservationgrid.html.twig',array('create'=>$create,'edit'=>$edit,'urlnew'=>'reservation_new'));
    }
    /**
     * Deletes a Account entity.
     *@Route("/{_locale}/deletereservation/{id}", name="reservation_deletemodal")
     */
    public function deletemodalAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ApartamentosApartamentosBundle:Reservation')->find($id);
        if (!$entity)
        {
            throw $this->createNotFoundException('Unable to find Reservation entity.');
        }
        try {
            $em->remove($entity);
            $em->flush();
        }
        catch(\Doctrine\DBAL\DBALException $e)
        {
            $this->get('session')->getFlashBag()->add('error', 'delete.reservation.dbaexception');

            return $this->redirect($this->generateUrl('reservation_show',array('id'=> $entity->getId())));
        }

        return $this->redirect($this->generateUrl('reservationgrid'));
    }

    /**
     *
     *@Route("/reservationtower", name="reservation_select_tower")
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
     *@Route("/reservationapt", name="reservation_select_apartment")
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
    
    


}
