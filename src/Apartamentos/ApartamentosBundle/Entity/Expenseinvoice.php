<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expenseinvoice
 *
 * @ORM\Table(name="expenseinvoice", indexes={@ORM\Index(name="fk_expense_invoice_expense1_idx", columns={"expenseid"})})
 * @ORM\Entity
 */
class Expenseinvoice
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
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="createuser", type="string", length=45, nullable=true)
     */
    private $createuser;

    /**
     * @var string
     *
     * @ORM\Column(name="modifyuser", type="string", length=45, nullable=true)
     */
    private $modifyuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=true)
     */
    private $createdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifydate", type="datetime", nullable=true)
     */
    private $modifydate;

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
     * Set description
     *
     * @param string $description
     *
     * @return Expenseinvoice
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
     * Set name
     *
     * @param string $name
     *
     * @return Expenseinvoice
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
     *
     * @return Expenseinvoice
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

    /**
     * Set createuser
     *
     * @param string $createuser
     *
     * @return Expenseinvoice
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
     *
     * @return Expenseinvoice
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

    /**
     * Set createdate
     *
     * @param \DateTime $createdate
     *
     * @return Expenseinvoice
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
     *
     * @return Expenseinvoice
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
     * Set expenseid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Expense $expenseid
     *
     * @return Expenseinvoice
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
