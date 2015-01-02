<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TowerAdvertisement
 *
 * @ORM\Table(name="tower_advertisement", indexes={@ORM\Index(name="fk_tower_advertisement_tower1_idx", columns={"towerid"}), @ORM\Index(name="fk_tower_advertisement_advertisement1_idx", columns={"advertisementid"})})
 * @ORM\Entity
 */
class TowerAdvertisement
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
     * @var \Advertisement
     *
     * @ORM\ManyToOne(targetEntity="Advertisement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="advertisementid", referencedColumnName="id")
     * })
     */
    private $advertisementid;

    /**
     * @var \Tower
     *
     * @ORM\ManyToOne(targetEntity="Tower")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="towerid", referencedColumnName="id")
     * })
     */
    private $towerid;



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
     * Set advertisementid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Advertisement $advertisementid
     * @return TowerAdvertisement
     */
    public function setAdvertisementid(\Apartamentos\ApartamentosBundle\Entity\Advertisement $advertisementid = null)
    {
        $this->advertisementid = $advertisementid;

        return $this;
    }

    /**
     * Get advertisementid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Advertisement 
     */
    public function getAdvertisementid()
    {
        return $this->advertisementid;
    }

    /**
     * Set towerid
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\Tower $towerid
     * @return TowerAdvertisement
     */
    public function setTowerid(\Apartamentos\ApartamentosBundle\Entity\Tower $towerid = null)
    {
        $this->towerid = $towerid;

        return $this;
    }

    /**
     * Get towerid
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\Tower 
     */
    public function getTowerid()
    {
        return $this->towerid;
    }
}
