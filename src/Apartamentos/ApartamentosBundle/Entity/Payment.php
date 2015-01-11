<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
/**
 * Payment
 *
 * @ORM\Table(name="payment", indexes={@ORM\Index(name="fk_payment_apartment1_idx", columns={"apartmentid"})})
 * @ORM\Entity
 */
class Payment
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
     * @ORM\Column(name="paymentdate", type="date", nullable=true)
     * @GRID\Column(title="Fecha")
     */
    private $paymentdate;

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
     * @ORM\Column(name="depositor", type="string", length=45, nullable=true)
     * @GRID\Column(title="Depositante")
     */
    private $depositor;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=60, nullable=true)
     * @GRID\Column(title="Descripción")
     * @GRID\Column(filterable=false)
     */
    private $description;
    
    /**
     * @var string
     *
     * @ORM\Column(name="paymentmethod", type="string", length=45, nullable=true)
     * @GRID\Column(title="Tipo de pago")
     */
    private $paymentmethod;
    
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
     * @var \Apartment
     *
     * @ORM\ManyToOne(targetEntity="Apartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="apartmentid", referencedColumnName="id")
     * })
     * @GRID\Column(field="apartmentid.towerid.companyid.name", title="Condominio")
     * @GRID\Column(field="apartmentid.towerid.name", title="Torre")
     * @GRID\Column(field="apartmentid.number", title="Apartamento")
     */
    private $apartmentid;
    private $companyid;
    private $towerid;
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
     * Set paymentdate
     *
     * @param \DateTime $paymentdate
     * @return Payment
     */
    public function setPaymentdate($paymentdate)
    {
        $this->paymentdate = $paymentdate;

        return $this;
    }

    /**
     * Get paymentdate
     *
     * @return \DateTime 
     */
    public function getPaymentdate()
    {
        return $this->paymentdate;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Payment
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

    /**
     * Set description
     *
     * @param string $description
     * @return Payment
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
     * Set paymentmethod
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
     * Set apartmentid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Apartment $apartmentid
     * @return Payment
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
     * Set towerid
     
     */
    public function setTowerid($towerid)
    {
        $this->towerid = $towerid;

        return $this;
    }

    /**
     * Get towerid
     
     */
    public function getTowerid()
    {
        return $this->towerid;
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
     * Set depositor
     *
     * @param string $depositor
     * @return Depositor
     */
    public function setDepositor($depositor)
    {
        $this->depositor = $depositor;

        return $this;
    }

    /**
     * Get depositor
     *
     * @return string 
     */
    public function getDepositor()
    {
        return $this->depositor;
    }
    /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Payment
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
     * @return Payment
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
     * @return Payment
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
     * @return Payment
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
