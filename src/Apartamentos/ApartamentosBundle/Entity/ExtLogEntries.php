<?php

namespace Apartamentos\ApartamentosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExtLogEntries
 *
 * @ORM\Table(name="ext_log_entries", indexes={@ORM\Index(name="log_class_lookup_idx", columns={"object_class"}), @ORM\Index(name="log_date_lookup_idx", columns={"logged_at"}), @ORM\Index(name="log_user_lookup_idx", columns={"username"}), @ORM\Index(name="log_version_lookup_idx", columns={"object_id", "object_class", "version"})})
 * @ORM\Entity
 */
class ExtLogEntries
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
     * @ORM\Column(name="action", type="string", length=8, nullable=false)
     */
    private $action;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="logged_at", type="datetime", nullable=false)
     */
    private $loggedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="object_id", type="string", length=64, nullable=true)
     */
    private $objectId;

    /**
     * @var string
     *
     * @ORM\Column(name="object_class", type="string", length=255, nullable=false)
     */
    private $objectClass;

    /**
     * @var integer
     *
     * @ORM\Column(name="version", type="integer", nullable=false)
     */
    private $version;

    /**
     * @var array
     *
     * @ORM\Column(name="data", type="array", nullable=true)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;


}
