<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
/**
 * Parking
 *
 * @ORM\Table(name="parking", indexes={@ORM\Index(name="fk_parking_apartment1_idx", columns={"apartmentid"}), @ORM\Index(name="fk_parking_location1_idx", columns={"locationid"})})
 * @ORM\Entity
 */
class Parking
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
     * @ORM\Column(name="number", type="string", length=45, nullable=true)
     * @GRID\Column( title="número")
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     * @GRID\Column( title="Tipo")
     */
    private $type;

    /**
     * @var \Apartment
     *
     * @ORM\ManyToOne(targetEntity="Apartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="apartmentid", referencedColumnName="id")
     * })
     * @GRID\Column(field="apartmentid.number", title="Apartamento")
     * @GRID\Column(field="apartmentid.towerid.name", title="Torre")
     * @GRID\Column(field="apartmentid.towerid.companyid.name", title="Condominio")
     */
    private $apartmentid;

    /**
     * @var \Location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="locationid", referencedColumnName="id")
     * })
     */
    private $locationid;
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
     * Set number
     *
     * @param string $number
     * @return Parking
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Parking
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set apartmentid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Apartment $apartmentid
     * @return Parking
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
     * Set locationid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Location $locationid
     * @return Parking
     */
    public function setLocationid(\Apartamentos\ApartamentosBundle\Entity\Location $locationid = null)
    {
        $this->locationid = $locationid;

        return $this;
    }

    /**
     * Get locationid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Location 
     */
    public function getLocationid()
    {
        return $this->locationid;
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
     * Get apartmentid
     
     */
    public function getTowerid()
    {
        return $this->towerid;
    }
    
    /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Parking
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
     * @return Parking
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
     * @return Parking
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
     * @return Parking
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
