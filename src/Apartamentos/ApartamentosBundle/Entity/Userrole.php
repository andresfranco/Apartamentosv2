<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userrole
 *
 * @ORM\Table(name="userrole", indexes={@ORM\Index(name="fk_userrole_admin_user1_idx", columns={"userid"}), @ORM\Index(name="fk_userrole_admin_roles1_idx", columns={"roleid"})})
 * @ORM\Entity
 */
class Userrole
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
     * @ORM\Column(name="createuser", type="string", length=45, nullable=true)
     */
    private $createuser;

    /**
     * @var string
     *
     * @ORM\Column(name="modifyuser", type="string", length=45, nullable=true)
     */
    private $modifyuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=true)
     */
    private $createdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifydate", type="datetime", nullable=true)
     */
    private $modifydate;

    /**
     * @var \AdminRoles
     *
     * @ORM\ManyToOne(targetEntity="AdminRoles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="roleid", referencedColumnName="id")
     * })
     */
    private $roleid;

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
     * @return Userrole
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
     *
     * @return Userrole
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
     *
     * @return Userrole
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
     *
     * @return Userrole
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
     * Set roleid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\AdminRoles $roleid
     *
     * @return Userrole
     */
    public function setRoleid(\Apartamentos\ApartamentosBundle\Entity\AdminRoles $roleid = null)
    {
        $this->roleid = $roleid;

        return $this;
    }

    /**
     * Get roleid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\AdminRoles
     */
    public function getRoleid()
    {
        return $this->roleid;
    }

    /**
     * Set userid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\AdminUser $userid
     *
     * @return Userrole
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
}
