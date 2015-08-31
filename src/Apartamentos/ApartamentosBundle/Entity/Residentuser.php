<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Residentuser
 *
 * @ORM\Table(name="residentuser", indexes={@ORM\Index(name="fk_residentuser_resident1_idx", columns={"residentid"}), @ORM\Index(name="fk_residentuser_admin_user1_idx", columns={"userid"})})
 * @ORM\Entity
 */
class Residentuser
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
     * @ORM\Column(name="createuser", type="string", length=45, nullable=false)
     */
    private $createuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=false)
     */
    private $createdate;

    /**
     * @var string
     *
     * @ORM\Column(name="modifyuser", type="string", length=45, nullable=false)
     */
    private $modifyuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifydate", type="datetime", nullable=false)
     */
    private $modifydate;

    /**
     * @var \AdminUser
     *
     * @ORM\ManyToOne(targetEntity="AdminUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @var \Resident
     *
     * @ORM\ManyToOne(targetEntity="Resident")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="residentid", referencedColumnName="id")
     * })
     */
    private $residentid;



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
     * Set createuser
     *
     * @param string $createuser
     *
     * @return Residentuser
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
     * Set createdate
     *
     * @param \DateTime $createdate
     *
     * @return Residentuser
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
     * Set modifyuser
     *
     * @param string $modifyuser
     *
     * @return Residentuser
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
     * Set modifydate
     *
     * @param \DateTime $modifydate
     *
     * @return Residentuser
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
     * Set userid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\AdminUser $userid
     *
     * @return Residentuser
     */
    public function setUserid(\Apartamentos\ApartamentosBundle\Entity\AdminUser $userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\AdminUser
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set residentid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Resident $residentid
     *
     * @return Residentuser
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
}
