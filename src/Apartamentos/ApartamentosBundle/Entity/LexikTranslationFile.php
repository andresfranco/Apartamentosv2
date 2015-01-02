<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LexikTranslationFile
 *
 * @ORM\Table(name="lexik_translation_file", uniqueConstraints={@ORM\UniqueConstraint(name="hash_idx", columns={"hash"})})
 * @ORM\Entity
 */
class LexikTranslationFile
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
     * @ORM\Column(name="domain", type="string", length=255, nullable=false)
     */
    private $domain;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=10, nullable=false)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="extention", type="string", length=10, nullable=false)
     */
    private $extention;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=255, nullable=false)
     */
    private $hash;


}
