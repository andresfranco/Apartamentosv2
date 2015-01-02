<?php

namespace Apartamentos\ApartamentosBundle\Entity;
use Doctrine\ORM\EntityRepository;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\ORM\Mapping as ORM;

/**
 * Apartment
 *
 * @ORM\Table(name="apartment", indexes={@ORM\Index(name="fk_apartment_tower1_idx", columns={"towerid"})})
 * @ORM\Entity
 */
class Apartment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @GRID\Column(filterable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=10, nullable=true)
     * @GRID\Column(title="número")
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=35, nullable=true)
     * @GRID\Column(title="teléfono")
     */
    private $phone;

    /**
     * @var integer
     *
     * @ORM\Column(name="area", type="integer", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $area;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberresidents", type="integer", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $numberresidents;

    /**
     * @var integer
     *
     * @ORM\Column(name="floornumber", type="integer", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $floornumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="rooms", type="integer", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $rooms;

    /**
     * @var string
     *
     * @ORM\Column(name="hasmade", type="string", length=1, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $hasmade;

    /**
     * @var string
     *
     * @ORM\Column(name="hasbabysitting", type="string", length=1, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $hasbabysitting;

    /**
     * @var string
     *
     * @ORM\Column(name="haspet", type="string", length=1, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $haspet;

    /**
     * @var string
     *
     * @ORM\Column(name="hasmaderoom", type="string", length=1, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $hasmaderoom;

    /**
     * @var string
     *
     * @ORM\Column(name="haskids", type="string", length=1, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $haskids;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberofkids", type="integer", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $numberofkids;

    /**
     * @var string
     *
     * @ORM\Column(name="petkind", type="string", length=30, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $petkind;

    /**
     * @var string
     *
     * @ORM\Column(name="petnumber", type="string", length=45, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $petnumber;

    /**
     * @var \Tower
     *
     * @ORM\ManyToOne(targetEntity="Tower")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="towerid", referencedColumnName="id")
     * })
     * @GRID\Column(field="towerid.name", title="Torre")
     * @GRID\Column(field="towerid.companyid.name", title="Condominio")
     */
    private $towerid;

    private $companyid;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=false)
     * @GRID\Column(title="Create Date",filterable=false)
     */
    private $createdate;
    
    /**
     * @var string
     *
     * @ORM\Column(name="createuser", type="string", length=45, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $createuser;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifydate", type="datetime", nullable=false)
     * @GRID\Column(title="Modify Date",filterable=false)
     */
    private $modifydate;
    
    /**
     * @var string
     *
     * @ORM\Column(name="modifyuser", type="string", length=45, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $modifyuser;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return Apartment
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Apartment
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set area
     *
     * @param integer $area
     * @return Apartment
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set numberresidents
     *
     * @param integer $numberresidents
     * @return Apartment
     */
    public function setNumberresidents($numberresidents)
    {
        $this->numberresidents = $numberresidents;

        return $this;
    }

    /**
     * Get numberresidents
     *
     * @return integer 
     */
    public function getNumberresidents()
    {
        return $this->numberresidents;
    }

    /**
     * Set floornumber
     *
     * @param integer $floornumber
     * @return Apartment
     */
    public function setFloornumber($floornumber)
    {
        $this->floornumber = $floornumber;

        return $this;
    }

    /**
     * Get floornumber
     *
     * @return integer 
     */
    public function getFloornumber()
    {
        return $this->floornumber;
    }

    /**
     * Set rooms
     *
     * @param integer $rooms
     * @return Apartment
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }

    /**
     * Get rooms
     *
     * @return integer 
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set hasmade
     *
     * @param string $hasmade
     * @return Apartment
     */
    public function setHasmade($hasmade)
    {
        $this->hasmade = $hasmade;

        return $this;
    }

    /**
     * Get hasmade
     *
     * @return string 
     */
    public function getHasmade()
    {
        return $this->hasmade;
    }

    /**
     * Set hasbabysitting
     *
     * @param string $hasbabysitting
     * @return Apartment
     */
    public function setHasbabysitting($hasbabysitting)
    {
        $this->hasbabysitting = $hasbabysitting;

        return $this;
    }

    /**
     * Get hasbabysitting
     *
     * @return string 
     */
    public function getHasbabysitting()
    {
        return $this->hasbabysitting;
    }

    /**
     * Set haspet
     *
     * @param string $haspet
     * @return Apartment
     */
    public function setHaspet($haspet)
    {
        $this->haspet = $haspet;

        return $this;
    }

    /**
     * Get haspet
     *
     * @return string 
     */
    public function getHaspet()
    {
        return $this->haspet;
    }

    /**
     * Set hasmaderoom
     *
     * @param string $hasmaderoom
     * @return Apartment
     */
    public function setHasmaderoom($hasmaderoom)
    {
        $this->hasmaderoom = $hasmaderoom;

        return $this;
    }

    /**
     * Get hasmaderoom
     *
     * @return string 
     */
    public function getHasmaderoom()
    {
        return $this->hasmaderoom;
    }

    /**
     * Set haskids
     *
     * @param string $haskids
     * @return Apartment
     */
    public function setHaskids($haskids)
    {
        $this->haskids = $haskids;

        return $this;
    }

    /**
     * Get haskids
     *
     * @return string 
     */
    public function getHaskids()
    {
        return $this->haskids;
    }

    /**
     * Set numberofkids
     *
     * @param integer $numberofkids
     * @return Apartment
     */
    public function setNumberofkids($numberofkids)
    {
        $this->numberofkids = $numberofkids;

        return $this;
    }

    /**
     * Get numberofkids
     *
     * @return integer 
     */
    public function getNumberofkids()
    {
        return $this->numberofkids;
    }

    /**
     * Set petkind
     *
     * @param string $petkind
     * @return Apartment
     */
    public function setPetkind($petkind)
    {
        $this->petkind = $petkind;

        return $this;
    }

    /**
     * Get petkind
     *
     * @return string 
     */
    public function getPetkind()
    {
        return $this->petkind;
    }

    /**
     * Set petnumber
     *
     * @param string $petnumber
     * @return Apartment
     */
    public function setPetnumber($petnumber)
    {
        $this->petnumber = $petnumber;

        return $this;
    }

    /**
     * Get petnumber
     *
     * @return string 
     */
    public function getPetnumber()
    {
        return $this->petnumber;
    }

    /**
     * Set towerid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Tower $towerid
     * @return Apartment
     */
    public function setTowerid(\Apartamentos\ApartamentosBundle\Entity\Tower $towerid = null)
    {
        $this->towerid = $towerid;

        return $this;
    }

    /**
     * Get towerid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Tower 
     */
    public function getTowerid()
    {
        return $this->towerid;
    }
     public function getApartmentTower() {
      
   return $this->getNumber().'-'.$this->towerid->getName();
}
/**
     * Set petnumber
     *
     * @param string $companyid
     */
    public function setCompanyid($companyid)
    {
        $this->companyid = $companyid;

        return $this;
    }

    /**
     * Get petnumber
     *
     * @return string 
     */
    public function getCompanyid()
    {
        return $this->companyid;
    }
     /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Apartment
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;

        return $this;
    }

    /**
     * Get createdate
     *
     * @return \DateTime 
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }
    
    /**
     * Set modifydate
     *
     * @param \DateTime $modifydate
     * @return Apartment
     */
    public function setModifydate($modifydate)
    {
        $this->modifydate = $modifydate;

        return $this;
    }

    /**
     * Get modifydate
     *
     * @return \DateTime 
     */
    public function getModifydate()
    {
        return $this->modifydate;
    }
    
    /**
     * Set createuser
     *
     * @param string $createuser
     * @return Apartment
     */
    public function setCreateuser($createuser)
    {
        $this->createuser = $createuser;

        return $this;
    }

    /**
     * Get createuser
     *
     * @return string 
     */
    public function getCreateuser()
    {
        return $this->createuser;
    }
    /**
     * Set modifyuser
     *
     * @param string $modifyuser
     * @return Apartment
     */
    public function setModifyuser($modifyuser)
    {
        $this->modifyuser = $modifyuser;

        return $this;
    }

    /**
     * Get modifyuser
     *
     * @return string 
     */
    public function getModifyuser()
    {
        return $this->modifyuser;
    }
}
