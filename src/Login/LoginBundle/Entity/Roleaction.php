<?php

namespace Login\LoginBundle\Entity;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\ORM\Mapping as ORM;

/**
 * Roleaction
 *
 * @ORM\Table(name="roleaction", indexes={@ORM\Index(name="fk_roleaction_admin_roles1_idx", columns={"roleid"}), @ORM\Index(name="fk_roleaction_action1_idx", columns={"actionid"})})
 * @ORM\Entity
 */
class Roleaction
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
     * @var \Action
     *
     * @ORM\ManyToOne(targetEntity="Action")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="actionid", referencedColumnName="id")
     * })
     * @GRID\Column(field="actionid.actionname", title="Acción")
     */
    private $actionid;

    /**
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="roleid", referencedColumnName="id")
     * })
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
     * Set createuser
     *
     * @param string $createuser
     * @return Roleaction
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
     * @return Roleaction
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
     * @return Roleaction
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
     * @return Roleaction
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
     * Set actionid
     *
     * @param \Login\LoginBundle\Entity\Action $actionid
     * @return Roleaction
     */
    public function setActionid(\Login\LoginBundle\Entity\Action $actionid = null)
    {
        $this->actionid = $actionid;

        return $this;
    }

    /**
     * Get actionid
     *
     * @return \Login\LoginBundle\Entity\Action 
     */
    public function getActionid()
    {
        return $this->actionid;
    }

    /**
     * Set roleid
     *
     * @param \Login\LoginBundle\Entity\Role $roleid
     * @return Roleaction
     */
    public function setRoleid(\Login\LoginBundle\Entity\Role $roleid = null)
    {
        $this->roleid = $roleid;

        return $this;
    }

    /**
     * Get roleid
     *
     * @return \Login\LoginBundle\Entity\Role 
     */
    public function getRoleid()
    {
        return $this->roleid;
    }
}
