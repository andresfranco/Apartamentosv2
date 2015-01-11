<?php

namespace Login\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Multiparam
 *
 * @ORM\Table(name="multiparam")
 * @ORM\Entity
 */
class Multiparam
{
    /**
     * @var string
     *
     * @ORM\Column(name="idparam", type="string", length=45, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idparam;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=1000, nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;



    /**
     * Get idparam
     *
     * @return string 
     */
    public function getIdparam()
    {
        return $this->idparam;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Multiparam
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
     * @return Multiparam
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
}
