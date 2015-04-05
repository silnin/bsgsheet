<?php
namespace Silnin\BsgSheet\CharacterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="character")
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=64, unique=false, nullable=false)
     */
    protected $name;

    /** @ORM\Column(name="date_created", type="datetime") */
    protected $createDate;

    /**
     * @ORM\Column(name="description", type="string", length=255)
     */
    protected $description;

    /**
     * @ORM\Column(name="homeworld", type="string", length=64)
     */
    protected $homeworld;

    /**
     * @ORM\Column(name="callsign", type="string", length=64)
     */
    protected $callsign;

    /**
     * @ORM\Column(name="plot_points", type="integer")
     */
    protected $plotPoints;

    /**
     * @ORM\Column(name="adv_points", type="integer")
     */
    protected $advancementPoints;

    /**
     * @ORM\Column(name="wound_rating", type="integer")
     */
    protected $woundRating;

    /**
     * @ORM\Column(name="stun_rating", type="integer")
     */
    protected $stunRating;
}