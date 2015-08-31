<?php

namespace Login\LoginBundle\Entity;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
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
     * @GRID\Column(filterable=false)
     */
    private $id;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="roleid", referencedColumnName="id")
     * })
     * @GRID\Column(field="roleid.name", title="Rol")
     */
    private $roleid;



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
     * Set userid
     *
     * @param \Login\LoginBundle\Entity\AdminUser $userid
     * @return Userrole
     */
    public function setUserid(\Login\LoginBundle\Entity\User $userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return \Login\LoginBundle\Entity\AdminUser 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set roleid
     *
     * @param \Login\LoginBundle\Entity\Role $roleid
     * @return Userrole
     */
    public function setRoleid(\Login\LoginBundle\Entity\Role $roleid = null)
    {
        $this->roleid = $roleid;

        return $this;
    }

    /**
     * Get roleid
     *
     * @return \Login\LoginBundle\Entity\AdminRoles 
     */
    public function getRoleid()
    {
        return $this->roleid;
    }
}
