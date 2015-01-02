<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abssenceday
 *
 * @ORM\Table(name="abssenceday", indexes={@ORM\Index(name="fk_abssenceday_employee1_idx", columns={"employeeid"}), @ORM\Index(name="fk_abssenceday_document1_idx", columns={"documentid"})})
 * @ORM\Entity
 */
class Abssenceday
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
     * @var \DateTime
     *
     * @ORM\Column(name="absencedate", type="date", nullable=true)
     */
    private $absencedate;

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="string", length=45, nullable=true)
     */
    private $reason;


    /**
     * @var \Employee
     *
     * @ORM\ManyToOne(targetEntity="Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employeeid", referencedColumnName="id")
     * })
     */
    private $employeeid;



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
     * Set absencedate
     *
     * @param \DateTime $absencedate
     * @return Abssenceday
     */
    public function setAbsencedate($absencedate)
    {
        $this->absencedate = $absencedate;

        return $this;
    }

    /**
     * Get absencedate
     *
     * @return \DateTime 
     */
    public function getAbsencedate()
    {
        return $this->absencedate;
    }

    /**
     * Set reason
     *
     * @param string $reason
     * @return Abssenceday
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
     * Set employeeid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Employee $employeeid
     * @return Abssenceday
     */
    public function setEmployeeid(\Apartamentos\ApartamentosBundle\Entity\Employee $employeeid = null)
    {
        $this->employeeid = $employeeid;

        return $this;
    }

    /**
     * Get employeeid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Employee 
     */
    public function getEmployeeid()
    {
        return $this->employeeid;
    }
}
