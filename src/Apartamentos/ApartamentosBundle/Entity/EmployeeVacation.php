<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmployeeVacation
 *
 * @ORM\Table(name="employee_vacation", indexes={@ORM\Index(name="fk_employee_vacation_employee1_idx", columns={"employeeid"})})
 * @ORM\Entity
 */
class EmployeeVacation
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
     * @ORM\Column(name="startdate", type="date", nullable=true)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate", type="date", nullable=true)
     */
    private $enddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="totaldays", type="integer", nullable=true)
     */
    private $totaldays;

    /**
     * @var integer
     *
     * @ORM\Column(name="totaldaymissing", type="integer", nullable=true)
     */
    private $totaldaymissing;

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
     * Set startdate
     *
     * @param \DateTime $startdate
     * @return EmployeeVacation
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime 
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     * @return EmployeeVacation
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime 
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set totaldays
     *
     * @param integer $totaldays
     * @return EmployeeVacation
     */
    public function setTotaldays($totaldays)
    {
        $this->totaldays = $totaldays;

        return $this;
    }

    /**
     * Get totaldays
     *
     * @return integer 
     */
    public function getTotaldays()
    {
        return $this->totaldays;
    }

    /**
     * Set totaldaymissing
     *
     * @param integer $totaldaymissing
     * @return EmployeeVacation
     */
    public function setTotaldaymissing($totaldaymissing)
    {
        $this->totaldaymissing = $totaldaymissing;

        return $this;
    }

    /**
     * Get totaldaymissing
     *
     * @return integer 
     */
    public function getTotaldaymissing()
    {
        return $this->totaldaymissing;
    }

    /**
     * Set employeeid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Employee $employeeid
     * @return EmployeeVacation
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
