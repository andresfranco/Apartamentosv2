<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * Cause
 *
 * @ORM\Table(name="cause")
 * @ORM\Entity
 */
class Cause
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
     * @ORM\Column(name="cause", type="string", length=60, nullable=true)
     * @GRID\Column(title="Causa")
     */
    private $cause;
     /**
     * @var \Causetype
     *
     * @ORM\ManyToOne(targetEntity="Causetype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="causetypeid", referencedColumnName="id")
     * })
     */
    private $causetypeid;
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
     * Set cause
     *
     * @param string $cause
     * @return Cause
     */
    public function setCause($cause)
    {
        $this->cause = $cause;

        return $this;
    }

    /**
     * Get cause
     *
     * @return string 
     */
    public function getCause()
    {
        return $this->cause;
    }
    /**
    * Set causetypeid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Causetype $causetypeid
     * @return Expense
     */
    public function setCausetypeid(\Apartamentos\ApartamentosBundle\Entity\Causetype $causetypeid = null)
    {
        $this->causetypeid = $causetypeid;

        return $this;
    }

    /**
     * Get causetypeid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Causetype 
     */
    public function getCausetypeid()
    {
        return $this->causetypeid;
    }
    /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Cause
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
     * @return Cause
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
     * @return Cause
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
     * @return Cause
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
