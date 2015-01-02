<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProviderEmployee
 *
 * @ORM\Table(name="provider_employee", indexes={@ORM\Index(name="fk_provider_employee_provider1_idx", columns={"providerid"})})
 * @ORM\Entity
 */
class ProviderEmployee
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
     * @ORM\Column(name="idnumber", type="string", length=32, nullable=true)
     */
    private $idnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=32, nullable=true)
     */
    private $phone;

    /**
     * @var \Provider
     *
     * @ORM\ManyToOne(targetEntity="Provider")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="providerid", referencedColumnName="id")
     * })
     */
    private $providerid;



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
     * @return ProviderEmployee
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
     * Set idnumber
     *
     * @param string $idnumber
     * @return ProviderEmployee
     */
    public function setIdnumber($idnumber)
    {
        $this->idnumber = $idnumber;

        return $this;
    }

    /**
     * Get idnumber
     *
     * @return string 
     */
    public function getIdnumber()
    {
        return $this->idnumber;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return ProviderEmployee
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
     * Set providerid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Provider $providerid
     * @return ProviderEmployee
     */
    public function setProviderid(\Apartamentos\ApartamentosBundle\Entity\Provider $providerid = null)
    {
        $this->providerid = $providerid;

        return $this;
    }

    /**
     * Get providerid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Provider 
     */
    public function getProviderid()
    {
        return $this->providerid;
    }
}
