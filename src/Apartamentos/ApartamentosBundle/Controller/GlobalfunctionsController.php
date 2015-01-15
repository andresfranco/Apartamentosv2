<?php

namespace Apartamentos\ApartamentosBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
class GlobalfunctionsController extends Controller{
    
    //Add data to audit fields in a Controller.
    public function Audit($entity,$mode)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $username=$user->getUsername();
        if ($mode =='ins')
        {    
        $entity->setCreateuser($username);
        $entity->setCreatedate(new \DateTime('now'));
        }
        $entity->setModifydate(new \DateTime('now'));
        $entity->setModifyuser($username);   
        
        return $entity;
    }
    //Generate a random code
    public function generateCode()
    {
      $generator = new SecureRandom();
      $random = $generator->nextBytes(7);
      $stringcode = bin2hex($random);
      return $stringcode;
   
    } 
     
    public function Getusernamebyid($userid)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('LoginLoginBundle:User')->find($userid); 
      return $entity->getUsername();
        
    } 
    
    public function Getrolenamebyid($roleid)
    {
     $em = $this->getDoctrine()->getManager();
     $entity = $em->getRepository('LoginLoginBundle:Role')->find($roleid); 
      return $entity->getName();
        
    }
    
    public function Getactionsbyuserid($userid)
    {
     // set doctrine
     $em = $this->get('doctrine')->getManager()->getConnection();
     // prepare statement
     $sth = $em->prepare("CALL getactionsbyuserid(:userid)");
     $sth->bindValue('userid', $userid);
    // execute and fetch
     $sth->execute();
     $results = $sth->fetchAll();
     unset($sth);
     return $results;
          
    }
    
    public function verifyaction($actionname)
    {
     $hasaction='N';   
      //Verify logged user   
     $user = $this->get('security.context')->getToken()->getUser();
     $userid =$user->getId();
     //get bank actions
     $actions= $this->get('globalfunctions')->Getactionsbyuserid($userid);
     
     foreach ($actions as $action) 
      {
         if ($action['actionname'] ==$actionname)
         {
          $hasaction='S';   
         }    
      }
      
     return $hasaction;
    }

    public function getmultipleparambyname($name)
    {

        // set doctrine
        $em = $this->get('doctrine')->getManager()->getConnection();
        // prepare statement
        $sth = $em->prepare("select mp.value,mp.description from multiparam mp inner join sysparam sp on(sp.id =mp.sysparamid)where sp.name =:name");
        $sth->bindValue('name', $name);
        // execute and fetch
        $sth->execute();
        $results = $sth->fetchall();
        unset($sth);

        $choices = $this->convertfetchalltochoice($results);
        return $choices;

    }


    public function convertfetchalltochoice($resularray)
    {
        //Define empty array
        $choices          = [];
        //load the fetch all results in choice array data.
        foreach ($resularray as $result)
        {
            $keys = array_keys($result);
            $choices[$result[$keys[0]]] = $result[$keys[1]];
        }
        return $choices;

    }

    public function getcausesbycausetype($causetype)
    {
        // set doctrine
        $em = $this->get('doctrine')->getManager()->getConnection();
        // prepare statement
        $sth = $em->prepare("select c.id,c.cause from cause c inner join causetype ct on (c.causetypeid =ct.id) where ct.causetype =:causetype");
        $sth->bindValue('causetype', $causetype);
        // execute and fetch
        $sth->execute();
        $results = $sth->fetchall();
        unset($sth);

        $choices = $this->convertfetchalltochoice($results);
        return $choices;


    }
    
}
