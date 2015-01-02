<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProviderSchedule
 *
 * @ORM\Table(name="provider_schedule", indexes={@ORM\Index(name="fk_provider_schedule_provider_employee1_idx", columns={"provideremployeeid"}), @ORM\Index(name="fk_provider_schedule_day1_idx", columns={"dayid"})})
 * @ORM\Entity
 */
class ProviderSchedule
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
     * @var \ProviderEmployee
     *
     * @ORM\ManyToOne(targetEntity="ProviderEmployee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provideremployeeid", referencedColumnName="id")
     * })
     */
    private $provideremployeeid;



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
     * @return ProviderSchedule
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
     * @return ProviderSchedule
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
     * @return ProviderSchedule
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
     * Set provideremployeeid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\ProviderEmployee $provideremployeeid
     * @return ProviderSchedule
     */
    public function setProvideremployeeid(\Apartamentos\ApartamentosBundle\Entity\ProviderEmployee $provideremployeeid = null)
    {
        $this->provideremployeeid = $provideremployeeid;

        return $this;
    }

    /**
     * Get provideremployeeid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\ProviderEmployee 
     */
    public function getProvideremployeeid()
    {
        return $this->provideremployeeid;
    }
}
