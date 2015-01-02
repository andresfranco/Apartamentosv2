<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Architect
 *
 * @ORM\Table(name="architect", indexes={@ORM\Index(name="fk_architect_const_company1_idx", columns={"const_companyid"})})
 * @ORM\Entity
 */
class Architect
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
     * @ORM\Column(name="name", type="string", length=60, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=true)
     */
    private $email;

    /**
     * @var \ConstCompany
     *
     * @ORM\ManyToOne(targetEntity="ConstCompany")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="const_companyid", referencedColumnName="id")
     * })
     */
    private $constCompanyid;



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
     * @return Architect
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
     * Set phone
     *
     * @param string $phone
     * @return Architect
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Architect
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set constCompanyid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\ConstCompany $constCompanyid
     * @return Architect
     */
    public function setConstCompanyid(\Apartamentos\ApartamentosBundle\Entity\ConstCompany $constCompanyid = null)
    {
        $this->constCompanyid = $constCompanyid;

        return $this;
    }

    /**
     * Get constCompanyid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\ConstCompany 
     */
    public function getConstCompanyid()
    {
        return $this->constCompanyid;
    }
}
