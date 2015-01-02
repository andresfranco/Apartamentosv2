<?php

namespace Apartamentos\ApartamentosBundle\Entity;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Doctrine\ORM\Mapping as ORM;

/**
 * LexikTransUnitTranslations
 *
 * @ORM\Table(name="lexik_trans_unit_translations", uniqueConstraints={@ORM\UniqueConstraint(name="trans_unit_locale_idx", columns={"trans_unit_id", "locale"})}, indexes={@ORM\Index(name="IDX_B0AA394493CB796C", columns={"file_id"}), @ORM\Index(name="IDX_B0AA3944C3C583C9", columns={"trans_unit_id"})})
 * @ORM\Entity
 */
class LexikTransUnitTranslations
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
     * @ORM\Column(name="locale", type="string", length=10, nullable=false)
     * @GRID\Column(filterable=false)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     * @GRID\Column(title="Traducción")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @GRID\Column(filterable=false)
     */
    private $updatedAt;

    /**
     * @var \LexikTranslationFile
     *
     * @ORM\ManyToOne(targetEntity="LexikTranslationFile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="file_id", referencedColumnName="id")
     * })
     */
    private $file;
    /**
     * @var \LexikTransUnit
     *
     * @ORM\ManyToOne(targetEntity="LexikTransUnit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trans_unit_id", referencedColumnName="id")
     * })
     * @GRID\Column(field="transUnit.keyName", title="Identificador") 
     * @GRID\Column(field="transUnit.domain", title="Tipo") 
     */
    private $transUnit;

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return LexikTransUnitTranslations
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Set createdAt
     *
     * @param \DateTime $updatedAt
     * @return LexikTransUnitTranslations
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAtt()
    {
        return $this->updatedAt;
    }
    /**
     * Set locale
     *
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }
    
    /**
     * Set content
     *
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
   
     /**
     * Set file
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\LexikTranslationFile $file
     * @return LexikTranslationFile
     */
    public function setFile(\Apartamentos\ApartamentosBundle\Entity\LexikTranslationFile $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\LexikTranslationFile
     */
    public function getFile()
    {
        return $this->file;
    }
    
    
     /**
     * Set file
     *
     * @param \Apartamentos\ApartamentosBundle\Entity\LexikTransUnit $transUnit
     * @return LexikTransUnit
     */
    public function setTransUnit(\Apartamentos\ApartamentosBundle\Entity\LexikTransUnit $transUnit = null)
    {
        $this->transUnit = $transUnit;

        return $this;
    }

    /**
     * Get transUnit
     *
     * @return \Apartamentos\ApartamentosBundle\Entity\LexikTransUnit
     */
    public function getTransUnit()
    {
        return $this->transUnit;
    }

}
