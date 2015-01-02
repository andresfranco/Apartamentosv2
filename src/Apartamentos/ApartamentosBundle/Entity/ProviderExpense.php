<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProviderExpense
 *
 * @ORM\Table(name="provider_expense", indexes={@ORM\Index(name="IDX_DD622F01D46DAE98", columns={"expenseid"}), @ORM\Index(name="IDX_DD622F01ABC11004", columns={"providerid"})})
 * @ORM\Entity
 */
class ProviderExpense
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=true)
     */
    private $amount;

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
     * @var \Expense
     *
     * @ORM\ManyToOne(targetEntity="Expense")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="expenseid", referencedColumnName="id")
     * })
     */
    private $expenseid;



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
     * Set amount
     *
     * @param float $amount
     * @return ProviderExpense
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
     * Set providerid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Provider $providerid
     * @return ProviderExpense
     */
    public function setProviderid(\Apartamentos\ApartamentosBundle\Entity\Provider $providerid = null)
    {
        $this->providerid = $providerid;

        return $this;
    }

    /**
     * Get providerid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Provider 
     */
    public function getProviderid()
    {
        return $this->providerid;
    }

    /**
     * Set expenseid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Expense $expenseid
     * @return ProviderExpense
     */
    public function setExpenseid(\Apartamentos\ApartamentosBundle\Entity\Expense $expenseid = null)
    {
        $this->expenseid = $expenseid;

        return $this;
    }

    /**
     * Get expenseid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Expense 
     */
    public function getExpenseid()
    {
        return $this->expenseid;
    }
}
