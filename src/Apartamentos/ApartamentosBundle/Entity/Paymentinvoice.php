<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paymentinvoice
 *
 * @ORM\Table(name="paymentinvoice", indexes={@ORM\Index(name="fk_paymentinvoice_payment1_idx", columns={"paymentid"})})
 * @ORM\Entity
 */
class Paymentinvoice
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var \Payment
     *
     * @ORM\ManyToOne(targetEntity="Payment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paymentid", referencedColumnName="id")
     * })
     */
    private $paymentid;



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
     * Set description
     *
     * @param string $description
     * @return Paymentinvoice
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
     * Set paymentid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Payment $paymentid
     * @return Paymentinvoice
     */
    public function setPaymentid(\Apartamentos\ApartamentosBundle\Entity\Payment $paymentid = null)
    {
        $this->paymentid = $paymentid;

        return $this;
    }

    /**
     * Get paymentid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Payment 
     */
    public function getPaymentid()
    {
        return $this->paymentid;
    }
}
