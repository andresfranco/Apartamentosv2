<?php

namespace Apartamentos\ApartamentosBundle\Entity;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tower
 *
 * @ORM\Table(name="tower", indexes={@ORM\Index(name="fk_tower_Company1_idx", columns={"Companyid"})})
 * @ORM\Entity
 */
class Tower
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
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     * @GRID\Column(title="nombre")
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberapartments", type="integer", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $numberapartments;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberstorerooms", type="integer", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $numberstorerooms;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberparkings", type="integer", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $numberparkings;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberaptperfloor", type="integer", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $numberaptperfloor;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $email;

    /**
     * @var \Company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Companyid", referencedColumnName="id")
     * })
     * @Grid\Column(field="companyid.name" ,title="Condominio")
     */
    private $companyid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Employee", mappedBy="tower")
     */
    private $employee;
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
     * Constructor
     */
    public function __construct()
    {
        $this->employee = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set name
     *
     * @param string $name
     * @return Tower
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
     * Set numberapartments
     *
     * @param integer $numberapartments
     * @return Tower
     */
    public function setNumberapartments($numberapartments)
    {
        $this->numberapartments = $numberapartments;

        return $this;
    }

    /**
     * Get numberapartments
     *
     * @return integer 
     */
    public function getNumberapartments()
    {
        return $this->numberapartments;
    }

    /**
     * Set numberstorerooms
     *
     * @param integer $numberstorerooms
     * @return Tower
     */
    public function setNumberstorerooms($numberstorerooms)
    {
        $this->numberstorerooms = $numberstorerooms;

        return $this;
    }

    /**
     * Get numberstorerooms
     *
     * @return integer 
     */
    public function getNumberstorerooms()
    {
        return $this->numberstorerooms;
    }

    /**
     * Set numberparkings
     *
     * @param integer $numberparkings
     * @return Tower
     */
    public function setNumberparkings($numberparkings)
    {
        $this->numberparkings = $numberparkings;

        return $this;
    }

    /**
     * Get numberparkings
     *
     * @return integer 
     */
    public function getNumberparkings()
    {
        return $this->numberparkings;
    }

    /**
     * Set numberaptperfloor
     *
     * @param integer $numberaptperfloor
     * @return Tower
     */
    public function setNumberaptperfloor($numberaptperfloor)
    {
        $this->numberaptperfloor = $numberaptperfloor;

        return $this;
    }

    /**
     * Get numberaptperfloor
     *
     * @return integer 
     */
    public function getNumberaptperfloor()
    {
        return $this->numberaptperfloor;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Tower
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
     * Set companyid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Company $companyid
     * @return Tower
     */
    public function setCompanyid(\Apartamentos\ApartamentosBundle\Entity\Company $companyid = null)
    {
        $this->companyid = $companyid;

        return $this;
    }

    /**
     * Get companyid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Company 
     */
    public function getCompanyid()
    {
        return $this->companyid;
    }

    /**
     * Add employee
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Employee $employee
     * @return Tower
     */
    public function addEmployee(\Apartamentos\ApartamentosBundle\Entity\Employee $employee)
    {
        $this->employee[] = $employee;

        return $this;
    }

    /**
     * Remove employee
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Employee $employee
     */
    public function removeEmployee(\Apartamentos\ApartamentosBundle\Entity\Employee $employee)
    {
        $this->employee->removeElement($employee);
    }

    /**
     * Get employee
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployee()
    {
        return $this->employee;
    }
    /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Tower
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
     * @return Tower
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
     * @return Tower
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
     * @return Tower
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
