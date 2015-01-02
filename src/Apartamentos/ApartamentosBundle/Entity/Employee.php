<?php

namespace Apartamentos\ApartamentosBundle\Entity;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="employee", indexes={@ORM\Index(name="fk_employee_Company1_idx", columns={"Companyid"})})
 * @ORM\Entity
 */
class Employee
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
     * @ORM\Column(name="completename", type="string", length=45, nullable=true)
     * @GRID\Column(title="nombre")
     */
    private $completename;

    /**
     * @var string
     *
     * @ORM\Column(name="idnumber", type="string", length=45, nullable=true)
     * @GRID\Column(title="cédula")
     */
    private $idnumber;

    /**
     * @var float
     *
     * @ORM\Column(name="salaryamount", type="float", precision=18, scale=2, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $salaryamount;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=45, nullable=true)
     * @GRID\Column(title="Puesto")
     */
    private $position;

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
     * @ORM\ManyToMany(targetEntity="Tower", inversedBy="employee")
     * @ORM\JoinTable(name="employee_tower",
     *   joinColumns={
     *     @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tower_id", referencedColumnName="id")
     *   }
     * )
     * @Grid\Column(field="tower.name" ,title="Torre")
     * @GRID\Column(field="tower.id", title="id",filterable=false)
     */
    private $tower;
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
        $this->tower = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set completename
     *
     * @param string $completename
     * @return Employee
     */
    public function setCompletename($completename)
    {
        $this->completename = $completename;

        return $this;
    }

    /**
     * Get completename
     *
     * @return string 
     */
    public function getCompletename()
    {
        return $this->completename;
    }

    /**
     * Set idnumber
     *
     * @param string $idnumber
     * @return Employee
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
     * Set salaryamount
     *
     * @param float $salaryamount
     * @return Employee
     */
    public function setSalaryamount($salaryamount)
    {
        $this->salaryamount = $salaryamount;

        return $this;
    }

    /**
     * Get salaryamount
     *
     * @return float 
     */
    public function getSalaryamount()
    {
        return $this->salaryamount;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Employee
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set companyid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Company $companyid
     * @return Employee
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
     * Add tower
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Tower $tower
     * @return Employee
     */
    public function addTower(\Apartamentos\ApartamentosBundle\Entity\Tower $tower)
    {
        $this->tower[] = $tower;

        return $this;
    }

    /**
     * Remove tower
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Tower $tower
     */
    public function removeTower(\Apartamentos\ApartamentosBundle\Entity\Tower $tower)
    {
        $this->tower->removeElement($tower);
    }

    /**
     * Get tower
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTower()
    {
        return $this->tower;
    }
    /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
