<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmployeeSchedule
 *
 * @ORM\Table(name="employee_schedule", indexes={@ORM\Index(name="fk_employee_schedule_employee1_idx", columns={"employeeid"}), @ORM\Index(name="fk_employee_schedule_day1_idx", columns={"dayid"})})
 * @ORM\Entity
 */
class EmployeeSchedule
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
     * @ORM\Column(name="starttime", type="time", nullable=true)
     */
    private $starttime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endtime", type="time", nullable=true)
     */
    private $endtime;

    /**
     * @var \Day
     *
     * @ORM\ManyToOne(targetEntity="Day")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dayid", referencedColumnName="id")
     * })
     */
    private $dayid;

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
     * Set starttime
     *
     * @param \DateTime $starttime
     * @return EmployeeSchedule
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;

        return $this;
    }

    /**
     * Get starttime
     *
     * @return \DateTime 
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Set endtime
     *
     * @param \DateTime $endtime
     * @return EmployeeSchedule
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;

        return $this;
    }

    /**
     * Get endtime
     *
     * @return \DateTime 
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Set dayid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Day $dayid
     * @return EmployeeSchedule
     */
    public function setDayid(\Apartamentos\ApartamentosBundle\Entity\Day $dayid = null)
    {
        $this->dayid = $dayid;

        return $this;
    }

    /**
     * Get dayid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Day 
     */
    public function getDayid()
    {
        return $this->dayid;
    }

    /**
     * Set employeeid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Employee $employeeid
     * @return EmployeeSchedule
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
