<?php

namespace Apartamentos\ApartamentosBundle\Entity;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\ORM\Mapping as ORM;

/**
 * Resident
 *
 * @ORM\Table(name="resident", indexes={@ORM\Index(name="fk_Resident_apartment1_idx", columns={"apartmentid"}), @ORM\Index(name="fk_resident_residenttype1_idx", columns={"residenttypeid"}), @ORM\Index(name="fk_resident_tower1_idx", columns={"towerid"})})
 * @ORM\Entity
 */
class Resident
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
     * @ORM\Column(name="idnumber", type="string", length=80, nullable=true)
     * @GRID\Column(title="Num Identificación")
     */
    private $idnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=60, nullable=true)
     * @GRID\Column(title="nombre")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="idnumbertype", type="string", length=45, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $idnumbertype;

    /**
     * @var string
     *
     * @ORM\Column(name="holder", type="string", length=1, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $holder;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=true)
     * @GRID\Column(title="Email",filterable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=35, nullable=true)
     * @GRID\Column(title="Teléfono",filterable=false)
     */
    private $phone;

    /**
     * @var \Apartment
     *
     * @ORM\ManyToOne(targetEntity="Apartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="apartmentid", referencedColumnName="id")
     * })
     * @GRID\Column(field="apartmentid.number", title="Apartamento")
     */
    private $apartmentid;

    /**
     * @var \Residenttype
     *
     * @ORM\ManyToOne(targetEntity="Residenttype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="residenttypeid", referencedColumnName="id")
     * })
     */
    private $residenttypeid;

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
     * Set idnumber
     *
     * @param string $idnumber
     * @return Resident
     */
    public function setIdnumber($idnumber)
    {
        $this->idnumber = $idnumber;

        return $this;
    }

    /**
     * Get idnumber
     *
     * @return string 
     */
    public function getIdnumber()
    {
        return $this->idnumber;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Resident
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set idnumbertype
     *
     * @param string $idnumbertype
     * @return Resident
     */
    public function setIdnumbertype($idnumbertype)
    {
        $this->idnumbertype = $idnumbertype;

        return $this;
    }

    /**
     * Get idnumbertype
     *
     * @return string 
     */
    public function getIdnumbertype()
    {
        return $this->idnumbertype;
    }

    /**
     * Set holder
     *
     * @param string $holder
     * @return Resident
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;

        return $this;
    }

    /**
     * Get holder
     *
     * @return string 
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Resident
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Resident
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
     * Set apartmentid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Apartment $apartmentid
     * @return Resident
     */
    public function setApartmentid(\Apartamentos\ApartamentosBundle\Entity\Apartment $apartmentid = null)
    {
        $this->apartmentid = $apartmentid;

        return $this;
    }

    /**
     * Get apartmentid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Apartment 
     */
    public function getApartmentid()
    {
        return $this->apartmentid;
    }

    /**
     * Set residenttypeid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Residenttype $residenttypeid
     * @return Resident
     */
    public function setResidenttypeid(\Apartamentos\ApartamentosBundle\Entity\Residenttype $residenttypeid = null)
    {
        $this->residenttypeid = $residenttypeid;

        return $this;
    }

    /**
     * Get residenttypeid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Residenttype 
     */
    public function getResidenttypeid()
    {
        return $this->residenttypeid;
    }

    /**
     * Set towerid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Tower $towerid
     * @return Resident
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
    
    /**
     * Set companyid
     
     */
    public function setCompanyid($companyid)
    {
        $this->companyid = $companyid;

        return $this;
    }

    /**
     * Get companyid
     
     */
    public function getCompanyid()
    {
        return $this->companyid;
    }
     /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Resident
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
     * @return Resident
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
     * @return Resident
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
     * @return Resident
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
