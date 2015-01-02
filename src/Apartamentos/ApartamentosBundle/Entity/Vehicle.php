<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
/**
 * Vehicle
 *
 * @ORM\Table(name="vehicle", indexes={@ORM\Index(name="fk_vehicle_resident1_idx", columns={"residentid"}), @ORM\Index(name="fk_vehicle_color1_idx", columns={"colorid"}), @ORM\Index(name="fk_vehicle_brand1_idx", columns={"brandid"}), @ORM\Index(name="fk_vehicle_parking1_idx", columns={"parkingid"})})
 * @ORM\Entity
 */
class Vehicle
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
     * @ORM\Column(name="platenumber", type="string", length=45, nullable=true)
     * @GRID\Column(title="Placa")
     */
    private $platenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     * @GRID\Column(title="Tipo")
     */
    private $type;

    /**
     * @var \Parking
     *
     * @ORM\ManyToOne(targetEntity="Parking")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="parkingid", referencedColumnName="id")
     * })
     * @GRID\Column(field="parkingid.number", title="Estacionamiento")
     */
    private $parkingid;

    /**
     * @var \Brand
     *
     * @ORM\ManyToOne(targetEntity="Brand")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="brandid", referencedColumnName="id")
     * })
     */
    private $brandid;

    /**
     * @var \Color
     *
     * @ORM\ManyToOne(targetEntity="Color")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="colorid", referencedColumnName="id")
     * })
     */
    private $colorid;

    /**
     * @var \Resident
     *
     * @ORM\ManyToOne(targetEntity="Resident")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="residentid", referencedColumnName="id")
     * })
     * @GRID\Column(field="residentid.towerid.companyid.name", title="Condominio")
     * @GRID\Column(field="residentid.towerid.name", title="Torre")
     * @GRID\Column(field="residentid.apartmentid.number", title="Apartamento")
     * @GRID\Column(field="residentid.name", title="Propietario")
     */
    private $residentid;
    private $companyid;
    private $towerid;
    private $apartmentid;
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
     * Set platenumber
     *
     * @param string $platenumber
     * @return Vehicle
     */
    public function setPlatenumber($platenumber)
    {
        $this->platenumber = $platenumber;

        return $this;
    }

    /**
     * Get platenumber
     *
     * @return string 
     */
    public function getPlatenumber()
    {
        return $this->platenumber;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Vehicle
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
     * Set parkingid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Parking $parkingid
     * @return Vehicle
     */
    public function setParkingid(\Apartamentos\ApartamentosBundle\Entity\Parking $parkingid = null)
    {
        $this->parkingid = $parkingid;

        return $this;
    }

    /**
     * Get parkingid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Parking 
     */
    public function getParkingid()
    {
        return $this->parkingid;
    }

    /**
     * Set brandid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Brand $brandid
     * @return Vehicle
     */
    public function setBrandid(\Apartamentos\ApartamentosBundle\Entity\Brand $brandid = null)
    {
        $this->brandid = $brandid;

        return $this;
    }

    /**
     * Get brandid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Brand 
     */
    public function getBrandid()
    {
        return $this->brandid;
    }

    /**
     * Set colorid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Color $colorid
     * @return Vehicle
     */
    public function setColorid(\Apartamentos\ApartamentosBundle\Entity\Color $colorid = null)
    {
        $this->colorid = $colorid;

        return $this;
    }

    /**
     * Get colorid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Color 
     */
    public function getColorid()
    {
        return $this->colorid;
    }

    /**
     * Set residentid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Resident $residentid
     * @return Vehicle
     */
    public function setResidentid(\Apartamentos\ApartamentosBundle\Entity\Resident $residentid = null)
    {
        $this->residentid = $residentid;

        return $this;
    }

    /**
     * Get residentid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Resident 
     */
    public function getResidentid()
    {
        return $this->residentid;
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
     * Set towerid
     
     */
    public function setApartmentid($apartmentid)
    {
        $this->apartmentid = $apartmentid;

        return $this;
    }

    /**
     * Get towerid
     
     */
    public function getApartmentid()
    {
        return $this->apartmentid;
    }
     /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Vehicle
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
     * @return Vehicle
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
     * @return Vehicle
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
     * @return Vehicle
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
