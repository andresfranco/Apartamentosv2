<?php

namespace Login\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
/**
 * Multiparam
 *
 * @ORM\Table(name="multiparam", indexes={@ORM\Index(name="fk_multiparam_sysparam1_idx", columns={"sysparamid"})})
 * @ORM\Entity
 */
class Multiparam
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=45, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @GRID\Column(filterable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=1000, nullable=true)
     * @GRID\Column(title="Valor")
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     * @GRID\Column(title="Descripción")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="createuser", type="string", length=45, nullable=false)
     * @GRID\Column(filterable=false)
     */
    private $createuser;

    /**
     * @var string
     *
     * @ORM\Column(name="modifyuser", type="string", length=45, nullable=false)
     * @GRID\Column(filterable=false)
     */
    private $modifyuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=false)
     * @GRID\Column(filterable=false)
     */
    private $createdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifydate", type="datetime", nullable=false)
     * @GRID\Column(filterable=false)
     */
    private $modifydate;

    /**
     * @var \Sysparam
     *
     * @ORM\ManyToOne(targetEntity="Sysparam")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sysparamid", referencedColumnName="id")
     * })
     */
    private $sysparamid;



    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Multiparam
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Multiparam
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
     * Set createuser
     *
     * @param string $createuser
     * @return Multiparam
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
     * @return Multiparam
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
     * @return Multiparam
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
     * @return Multiparam
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
     * Set sysparamid
     *
     * @param \Login\LoginBundle\Entity\Sysparam $sysparamid
     * @return Multiparam
     */
    public function setSysparamid(\Login\LoginBundle\Entity\Sysparam $sysparamid = null)
    {
        $this->sysparamid = $sysparamid;

        return $this;
    }

    /**
     * Get sysparamid
     *
     * @return \Login\LoginBundle\Entity\Sysparam 
     */
    public function getSysparamid()
    {
        return $this->sysparamid;
    }
}
