<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action")
 * @ORM\Entity
 */
class Action
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
     * @ORM\Column(name="actionname", type="string", length=45, nullable=true)
     */
    private $actionname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set actionname
     *
     * @param string $actionname
     *
     * @return Action
     */
    public function setActionname($actionname)
    {
        $this->actionname = $actionname;

        return $this;
    }

    /**
     * Get actionname
     *
     * @return string
     */
    public function getActionname()
    {
        return $this->actionname;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Action
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createuser
     *
     * @param string $createuser
     *
     * @return Action
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
     * @return Action
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
     * @return Action
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
     * @return Action
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
}
