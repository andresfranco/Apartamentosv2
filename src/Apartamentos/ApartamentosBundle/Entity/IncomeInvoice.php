<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IncomeInvoice
 *
 * @ORM\Table(name="income_invoice", indexes={@ORM\Index(name="fk_income_invoice_income1_idx", columns={"incomeid"}), @ORM\Index(name="fk_income_invoice_document1_idx", columns={"documentid"})})
 * @ORM\Entity
 */
class IncomeInvoice
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    protected $path;
   

    /**
     * @var \Income
     *
     * @ORM\ManyToOne(targetEntity="Income")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="incomeid", referencedColumnName="id")
     * })
     */
    private $incomeid;
    

    


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
     * @return IncomeInvoice
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
     * Set incomeid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Income $incomeid
     * @return IncomeInvoice
     */
    public function setIncomeid(\Apartamentos\ApartamentosBundle\Entity\Income $incomeid = null)
    {
        $this->incomeid = $incomeid;

        return $this;
    }

    /**
     * Get incomeid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Income 
     */
    public function getIncomeid()
    {
        return $this->incomeid;
    }
    /**
     * Set name
     *
     * @param string $name
     * @return ExpenseInvoice
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
     * Set path
     *
     * @param string $path
     * @return ExpenseInvoice
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

}
