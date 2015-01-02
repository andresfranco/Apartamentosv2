<?php

namespace Apartamentos\ApartamentosBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apartamentos\ApartamentosBundle\Entity\Bank;
use Apartamentos\ApartamentosBundle\Form\BankType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use APY\DataGridBundle\Grid\Source\Vector;
use APY\DataGridBundle\Grid\Column;
use Symfony\Component\HttpFoundation\JsonResponse;
use PHPPdf\Core\FacadeBuilder;
use Ps\PdfBundle\Annotation\Pdf;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * Statement of account controller.
 *
 * @Route("/admin/statement")
 */
class StatementofaccountController extends Controller
{
     /**
     *
     * @Route("/{_locale}/statementview", name="statementview")
     * @Method("GET")
     * @Template()
     */
    public function StatementparamsAction()
    {
        $years=$this->Years(2000,2025);
        $months=$this->Months();
        $companyentity =$this->companyvalues();
       
        return $this->render('ApartamentosApartamentosBundle:Statementofaccount:Statementparams.html.twig', array('years' => $years,'months'=>$months,'company'=>$companyentity));
    }
    
    
   public function Years($startYear, $endYear){
         $years =array(); 
        for ($i=$startYear;$i<=$endYear;$i++){
            $years[$i]=$i;   
        }

    return $years;
} 
    
  public function Months()
{
   $months = array(
                1 => 'Enero',
                2 => 'Febrero',
                3 => 'Marzo',
                4 => 'Abril',
                5 => 'Mayo',
                6 => 'Junio',
                7 => 'Julio',
                8 => 'Agosto',
                9 => 'Septiembre',
                10 => 'Octubre',
                11 => 'Noviembre',
                12 => 'Diciembre');
     
      
        return $months;
}

public function Getmonthname($monthnumber)
{
    
    $months=$this->Months();
    return $months[$monthnumber];
}        
        


public function companyvalues()
{
 $em = $this->getDoctrine()->getManager();
 $entity= $em->getRepository('ApartamentosApartamentosBundle:Company')->findAll();   
 return $entity;   
}
 //Route defined in routing.yml of the bundle
public function generatestatementAction(Request $request)
{
  //Set post values in session  
  $session = $request->getSession();
  $month=$request->request->get('months');  
  $year=$request->request->get('years');
  $towerid =$request->request->get('tower');
  if (isset($month)&& isset($year)&& isset($towerid))
  {
    $session->set('month', $month);  
    $session->set('year', $year);
    $session->set('towerid', $towerid);
  }
  else
  {
   $month= $session->get('month');
   $year= $session->get('year');
   $towerid = $session->get('towerid');   
  }
   
  $monthname=$this->Getmonthname($month);
  $em2 = $this->getDoctrine()->getManager();
  $tower= $em2->getRepository('ApartamentosApartamentosBundle:Tower')->find($towerid);   
  $randomchar =$this->randomchar(4);
  $results = $this->Executeprocedure($year, $month, $towerid);
  
  return $this->render('ApartamentosApartamentosBundle:Statementofaccount:showstatement.html.twig', array('results' => $results ,'tower'=>$tower,'month'=>$month,'monthname'=>$monthname,'year'=>$year,'randomchar'=>$randomchar));
 
}

public function StatementshowAction($year,$month,$towerid)
{
  
  $monthname=$this->Getmonthname($month);
  $em2 = $this->getDoctrine()->getManager();
  $tower= $em2->getRepository('ApartamentosApartamentosBundle:Tower')->find($towerid);   
  $randomchar =$this->randomchar(4);
  $results = $this->Executeprocedure($year, $month, $towerid);//$sth->fetchAll();
   
   $grid=$this->StatementgridAction($year,$month,$towerid);
   return $grid->getGridResponse('ApartamentosApartamentosBundle:Statementofaccount:statementview.html.twig', array('results' => $results ,'tower'=>$tower,'month'=>$month,'monthname'=>$monthname,'year'=>$year,'randomchar'=>$randomchar));
   //return $this->render('ApartamentosApartamentosBundle:Statementofaccount:showstatement.html.twig', array('results' => $results ,'tower'=>$tower,'month'=>$month,'monthname'=>$monthname,'year'=>$year,'randomchar'=>$randomchar));
 
}
/**
 *@Pdf()
 *@Route("/{_locale}/{namestatement}.pdf", name="statementpdf")
 *@Template()
 */
public function StatementpdfAction($year,$month,$towerid)
{   
    $monthname=$this->Getmonthname($month);
    $em2 = $this->getDoctrine()->getManager();
    $tower= $em2->getRepository('ApartamentosApartamentosBundle:Tower')->find($towerid); 
    $facade = $this->get('ps_pdf.facade');
    
    $results =$this->Executeprocedure($year,$month,$towerid);
    
    $response = new Response();
    $this->render('ApartamentosApartamentosBundle:Statementofaccount:statetement.pdf.twig', array('results' => $results ,'tower'=>$tower,'monthname'=>$monthname,'year'=>$year), $response);

    $xml = $response->getContent();

    $content = $facade->render($xml);

    return new Response($content, 200, array('content-type' => 'application/pdf'));
   
    
}
public function Executeprocedure($year,$month,$towerid)
{
   // set doctrine
   $em = $this->get('doctrine')->getManager()->getConnection();
    // prepare statement
   $sth = $em->prepare("CALL generatestatement(:year,:month,:towerid)");
   $sth->bindValue('year', $year);
   $sth->bindValue('month', $month);
   $sth->bindValue('towerid',  $towerid);
   
    // execute and fetch
   $sth->execute();
   $results = $sth->fetchAll();
   unset($sth);
   return $results;
}

public function Executeprocedureexcel($year,$month,$towerid)
{
   // set doctrine
   $em = $this->get('doctrine')->getManager()->getConnection();
    // prepare statement
   $sth = $em->prepare("CALL statementexcel(:year,:month,:towerid)");
   $sth->bindValue('year', $year);
   $sth->bindValue('month', $month);
   $sth->bindValue('towerid',  $towerid);
   
    // execute and fetch
   $sth->execute();
   $results = $sth->fetchAll();
   unset($sth);
   return $results;
}
public function randomchar($numchars)
{
 $unique_key = substr(md5(rand(0, 1000000)), 0, $numchars);    
 return $unique_key;   
}

 /**
 * 
 *@Route("/statementtower", name="statement_select_tower")
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
 *@Route("/{_locale}/{info}/statementexcel", name="statementexcel")
 */
    public function StatementexcelAction($info)
    {   
        $arraychar =explode('-',$info); 
        $random =$arraychar[0];
        $condo =$arraychar[1];
        $tower =$arraychar[2]; 
        $username =$arraychar[3];
        $year =$arraychar[4];
        $monthname =$arraychar[5];
        $month =$arraychar[6];
        $towerid =$arraychar[7]; 
        
        $results = $this->Executeprocedureexcel($year,$month,$towerid);
         
        $locationnumber=6;
        $credittotal=0;
        $debittotal=0;
       foreach($results as $output) 
       {
          if ($output["credit"]>0)
          {
          $credittotal =$credittotal+$output["credit"] ;
          }
          if ($output["debit"]>0)
          {
          $debittotal =$debittotal+$output["debit"];
          }
          $locationnumber ++;
        } 
      
        $title1 = $condo.' - '.$tower;
        $title2 = $this->get('translator')->trans('Estado de Cuenta') .' '.$this->get('translator')->trans($monthname).' '.$year;
        
        $arraytitle = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 14,
        'name'  => 'Verdana'
    ));
        
           $arrayheadertitle= array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000000'),
        'size'  => 11,
        'name'  => 'Verdana'
    ));  
      
           $arraytotal =array(
    'font'  => array(
        'bold'  => true
    ));  
        
        $name = $random."_".$condo."_".$tower;
        // ask the service for a Excel5
       $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
       
       //Set column sizes
       $phpExcelObject->getActiveSheet()
                      ->getColumnDimension('A')
                      ->setWidth(20);
        $phpExcelObject->getActiveSheet()
                      ->getColumnDimension('B')
                      ->setWidth(20);
        $phpExcelObject->getActiveSheet()
                      ->getColumnDimension('C')
                      ->setWidth(30);
        $phpExcelObject->getActiveSheet()
                      ->getColumnDimension('D')
                      ->setWidth(20);
        $phpExcelObject->getActiveSheet()
                      ->getColumnDimension('E')
                      ->setWidth(20);
        $phpExcelObject->getActiveSheet()
                      ->getColumnDimension('F')
                      ->setWidth(20);
        $phpExcelObject->getActiveSheet()
                      ->getColumnDimension('G')
                      ->setWidth(20);
        $phpExcelObject->getActiveSheet()
                      ->getColumnDimension('H')
                      ->setWidth(30);
        
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('A1:H1');
        $phpExcelObject->setActiveSheetIndex(0)->mergeCells('A2:H2');
        
        
       $phpExcelObject->getProperties()->setCreator($username)
           ->setLastModifiedBy($username)
           ->setTitle("Statement of account ".$condo." - ".$tower)
           ->setSubject("Statement of account")
           ->setDescription("Statement of account ".$condo." - ".$tower)
           ->setKeywords("office 2005 openxml php")
           ->setCategory("Test result file");
       $phpExcelObject->setActiveSheetIndex(0)
           //Title Values
            ->setCellValue('A1', $title1)
           ->setCellValue('A3',$title2)  
               
           //Cell Header Values    
           ->setCellValue('A5', $this->get('translator')->trans('Fecha'))
           ->setCellValue('B5', $this->get('translator')->trans('Clase'))
           ->setCellValue('C5',$this->get('translator')->trans('Depositante'))
           ->setCellValue('D5',$this->get('translator')->trans('Crédito'))
           ->setCellValue('E5',$this->get('translator')->trans('Débito'))
           ->setCellValue('F5',$this->get('translator')->trans('Apartamento')) 
           ->setCellValue('G5',$this->get('translator')->trans('Recibo')) 
           ->setCellValue('H5',$this->get('translator')->trans('Detalle')) 
           ->setCellValue('C'.$locationnumber,'Total')
           ->setCellValue('D'.$locationnumber,$credittotal)
           ->setCellValue('E'.$locationnumber,$debittotal);
        
       
      $phpExcelObject->getActiveSheet()->fromArray($results, null, 'A6');
      
      
       //Set Title Style 
       $phpExcelObject->getActiveSheet()->getStyle('A1')->applyFromArray($arraytitle);
       $phpExcelObject->getActiveSheet()->getStyle('A3')->applyFromArray($arraytitle);
       $phpExcelObject->getActiveSheet()->getStyle('A5')->applyFromArray($arrayheadertitle);
       $phpExcelObject->getActiveSheet()->getStyle('B5')->applyFromArray($arrayheadertitle);
       $phpExcelObject->getActiveSheet()->getStyle('C5')->applyFromArray($arrayheadertitle);
       $phpExcelObject->getActiveSheet()->getStyle('D5')->applyFromArray($arrayheadertitle);
       $phpExcelObject->getActiveSheet()->getStyle('E5')->applyFromArray($arrayheadertitle);
       $phpExcelObject->getActiveSheet()->getStyle('F5')->applyFromArray($arrayheadertitle);
       $phpExcelObject->getActiveSheet()->getStyle('G5')->applyFromArray($arrayheadertitle);
       $phpExcelObject->getActiveSheet()->getStyle('H5')->applyFromArray($arrayheadertitle);
       $phpExcelObject->getActiveSheet()->getStyle('C'.$locationnumber)->applyFromArray($arraytotal);
       $phpExcelObject->getActiveSheet()->getStyle('D'.$locationnumber)->applyFromArray($arraytotal);
       $phpExcelObject->getActiveSheet()->getStyle('E'.$locationnumber)->applyFromArray($arraytotal);
       $phpExcelObject->getActiveSheet()->setTitle('Simple');
       // Set active sheet index to the first sheet, so Excel opens this as the first sheet
         
       
       $phpExcelObject->setActiveSheetIndex(0);
       
        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment;filename='.$name.'.xls');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
 
        return $response;        
    }
    
    
    public function StatementgridAction($year,$month,$towerid)
    {
        //Create grid from vector
        
        $results=$this->Executeprocedureexcel($year,$month,$towerid);
        $columns = array(
          new Column\DateColumn(array('id' => 'processdate', 'field' => 'processdate', 'source' => true, 'title' => 'Fecha', 'format' => 'd/m/Y','filterable' => true)),
          new Column\TextColumn(array('id' => 'paymentmethod', 'field' => 'paymentmethod', 'source' => true, 'title' => 'Tipo de Pago')),  
          new Column\TextColumn(array('id' => 'depositor', 'field' => 'depositor', 'source' => true, 'title' => 'Depositante')),  
          new Column\NumberColumn(array('id' => 'credit', 'field' => 'credit', 'source' => true, 'title' => 'Crédito')),
          new Column\NumberColumn(array('id' => 'debit', 'field' => 'debit', 'source' => true, 'title' => 'Débito')),
          new Column\TextColumn(array('id' => 'apartment', 'field' => 'apartment', 'source' => true, 'title' => 'Apartamento')),
          new Column\TextColumn(array('id' => 'invoicenumber', 'field' => 'invoicenumber', 'source' => true, 'title' => 'N° de Factura')),
          new Column\TextColumn(array('id' => 'description', 'field' => 'description', 'source' => true, 'title' => 'Descripción'))  
         
        );
        $source =new Vector($results,$columns);
         
        // Get a Grid instance
        $grid = $this->get('grid');

        // Attach the source to the grid
        $grid->setSource($source);
        
        // Set the selector of the number of items per page
        $grid->setLimits(array(2, 20, 30));

        // Set the default page
        $grid->setPage(1);
        
        return $grid;
    }

}


