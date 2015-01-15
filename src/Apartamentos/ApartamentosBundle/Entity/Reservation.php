<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="fk_reservation_apartment1_idx", columns={"apartmentid"})})
 * @ORM\Entity
 */
class Reservation
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
     * @ORM\Column(name="reservename", type="string", length=45, nullable=true)
     * @GRID\Column(title="Nombre de reserva")
     */
    private $reservename;

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="string", length=45, nullable=true)
     * @GRID\Column(title="Motivo")
     */
    private $reason;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservationdate", type="date", nullable=true)
     * @GRID\Column(title="Fecha de reserva")
     */
    private $reservationdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hourfrom", type="string", nullable=true)
     * @GRID\Column(title="Hora desde")
     */
    private $hourfrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hourto", type="string", nullable=true)
     * @GRID\Column(title="Hora hasta")
     */
    private $hourto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $createdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifydate", type="datetime", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $modifydate;

    /**
     * @var string
     *
     * @ORM\Column(name="createuser", type="string", length=45, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $createuser;

    /**
     * @var string
     *
     * @ORM\Column(name="modifyuser", type="string", length=45, nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $modifyuser;

    /**
     * @var \Apartment
     *
     * @ORM\ManyToOne(targetEntity="Apartment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="apartmentid", referencedColumnName="id")
     * })
     */
    private $apartmentid;
    private $companyid;
    private $towerid;



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
     * Set reservename
     *
     * @param string $reservename
     * @return Reservation
     */
    public function setReservename($reservename)
    {
        $this->reservename = $reservename;

        return $this;
    }

    /**
     * Get reservename
     *
     * @return string 
     */
    public function getReservename()
    {
        return $this->reservename;
    }

    /**
     * Set reservationdate
     *
     * @param \DateTime $reservationdate
     * @return Reservation
     */
    public function setReservationdate($reservationdate)
    {
        $this->reservationdate = $reservationdate;

        return $this;
    }

    /**
     * Get reservationdate
     *
     * @return \DateTime
     */
    public function getReservationdate()
    {
        return $this->reservationdate;
    }
    /**
     * Set reason
     *
     * @param string $reason
     * @return Reservation
     */


    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string 
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set hourfrom
     *
     * @param \DateTime $hourfrom
     * @return Reservation
     */
    public function setHourfrom($hourfrom)
    {
        $this->hourfrom = $hourfrom;

        return $this;
    }

    /**
     * Get hourfrom
     *
     * @return \DateTime 
     */
    public function getHourfrom()
    {
        return $this->hourfrom;
    }

    /**
     * Set hourto
     *
     * @param \DateTime $hourto
     * @return Reservation
     */
    public function setHourto($hourto)
    {
        $this->hourto = $hourto;

        return $this;
    }

    /**
     * Get hourto
     *
     * @return \DateTime 
     */
    public function getHourto()
    {
        return $this->hourto;
    }

    /**
     * Set createdate
     *
     * @param \DateTime $createdate
     * @return Reservation
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
     * @return Reservation
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
     * @return Reservation
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
     * @return Reservation
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
     * Set apartmentid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Apartment $apartmentid
     * @return Reservation
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
}
