<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sysparam
 *
 * @ORM\Table(name="sysparam")
 * @ORM\Entity
 */
class Sysparam
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
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=200, nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="createuser", type="string", length=45, nullable=false)
     */
    private $createuser;

    /**
     * @var string
     *
     * @ORM\Column(name="modifyuser", type="string", length=45, nullable=false)
     */
    private $modifyuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=false)
     */
    private $createdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifydate", type="datetime", nullable=false)
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
     * Set name
     *
     * @param string $name
     *
     * @return Sysparam
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Sysparam
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Sysparam
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
     * @return Sysparam
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
     * @return Sysparam
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
     * @return Sysparam
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
     * @return Sysparam
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
