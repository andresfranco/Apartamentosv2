<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
/**
 * Expense
 *
 * @ORM\Table(name="expense", indexes={@ORM\Index(name="fk_expense_tower1_idx", columns={"towerid"}), @ORM\Index(name="fk_expense_cause1_idx", columns={"causeid"})})
 * @ORM\Entity
 */
class Expense
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
     * @var \DateTime
     *
     * @ORM\Column(name="expensedate", type="date", nullable=true)
     * @GRID\Column(title="Fecha")
     */
    private $expensedate;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=18, scale=2, nullable=true)
     * @GRID\Column(title="Monto")
     */
    private $amount;
    /**
     * @var string
     *
     * @ORM\Column(name="paymentmethod", type="string", length=45, nullable=true)
     * @GRID\Column(title="Tipo de pago")
     */
    private $paymentmethod;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     * @GRID\Column(title="Descripción")
     */
    private $description;
	/**
     * @var \Account
     *
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="accountid", referencedColumnName="id")
     * })
     */
    private $accountid;
   
    /**
     * @var \Cause
     *
     * @ORM\ManyToOne(targetEntity="Cause")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="causeid", referencedColumnName="id")
     * })
     * @GRID\Column(field="causeid.cause", title="Causa")
     */
    private $causeid;

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
     * @var \Provider
     *
     * @ORM\ManyToOne(targetEntity="Provider")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="providerid", referencedColumnName="id")
     * })
     */
    private $providerid;
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
     * Set expensedate
     *
     * @param \DateTime $expensedate
     * @return Expense
     */
    public function setExpensedate($expensedate)
    {
        $this->expensedate = $expensedate;

        return $this;
    }

    /**
     * Get expensedate
     *
     * @return \DateTime 
     */
    public function getExpensedate()
    {
        return $this->expensedate;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Expense
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }
     /* Set paymentmethod
     *
     * @param string $paymentmethod
     */
    public function setPaymentmethod($paymentmethod)
    {
        $this->paymentmethod = $paymentmethod;

        return $this;
    }

    /**
     * Get paymentmethod
     *
     * @return string 
     */
    public function getPaymentmethod()
    {
        return $this->paymentmethod;
    }
    /**
     * Set description
     *
     * @param string $description
     * @return Expense
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
	 /**
     * Set accountid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Account $accountid
     * @return Expense
     */
    public function setAccountid(\Apartamentos\ApartamentosBundle\Entity\Account $accountid = null)
    {
        $this->accountid = $accountid;

        return $this;
    }

    /**
     * Get accountid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Account 
     */
    public function getAccountid()
    {
        return $this->accountid;
    }
    /**
     * Set causeid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Cause $causeid
     * @return Expense
     */
    public function setCauseid(\Apartamentos\ApartamentosBundle\Entity\Cause $causeid = null)
    {
        $this->causeid = $causeid;

        return $this;
    }

    /**
     * Get causeid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Cause 
     */
    public function getCauseid()
    {
        return $this->causeid;
    }

    /**
     * Set towerid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Tower $towerid
     * @return Expense
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
     * Get providerid
     *
     * @return integer 
     */
    public function getProviderid()
    {
        return $this->providerid;
    }
    
      /**
     * Set providerid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Provider $providerid
     * @return Expense
     */
    public function setProviderid(\Apartamentos\ApartamentosBundle\Entity\Provider $providerid = null)
    {
        $this->providerid = $providerid;

        return $this;
    }
     /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Expense
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
     * @return Expense
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
     * @return Expense
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
     * @return Expense
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
