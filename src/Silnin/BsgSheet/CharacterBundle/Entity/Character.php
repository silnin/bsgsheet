<?php
namespace Silnin\BsgSheet\CharacterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bsg_character")
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
     * @ORM\Column(name="active", type="boolean")
     */
    protected $active;

    /**
     * @ORM\Column(name="name", type="string", length=64, unique=false, nullable=false)
     */
    protected $name;

    /** @ORM\Column(name="date_created", type="datetime") */
    protected $createDate;

    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(name="homeworld", type="string", length=64, nullable=true)
     */
    protected $homeworld;

    /**
     * @ORM\Column(name="callsign", type="string", length=64, nullable=true)
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

    /**
     * @ORM\OneToOne(targetEntity="Rank")
     * @ORM\JoinColumn(name="rank_id", referencedColumnName="id", nullable=true)
     **/
    protected $rank;

    /**
     * @param mixed $advancementPoints
     */
    public function setAdvancementPoints($advancementPoints)
    {
        $this->advancementPoints = $advancementPoints;
    }

    /**
     * @return mixed
     */
    public function getAdvancementPoints()
    {
        return $this->advancementPoints;
    }

    /**
     * @param mixed $callsign
     */
    public function setCallsign($callsign)
    {
        $this->callsign = $callsign;
    }

    /**
     * @return mixed
     */
    public function getCallsign()
    {
        return $this->callsign;
    }

    /**
     * @param mixed $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $homeworld
     */
    public function setHomeworld($homeworld)
    {
        $this->homeworld = $homeworld;
    }

    /**
     * @return mixed
     */
    public function getHomeworld()
    {
        return $this->homeworld;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $plotPoints
     */
    public function setPlotPoints($plotPoints)
    {
        $this->plotPoints = $plotPoints;
    }

    /**
     * @return mixed
     */
    public function getPlotPoints()
    {
        return $this->plotPoints;
    }

    /**
     * @param mixed $stunRating
     */
    public function setStunRating($stunRating)
    {
        $this->stunRating = $stunRating;
    }

    /**
     * @return mixed
     */
    public function getStunRating()
    {
        return $this->stunRating;
    }

    /**
     * @param mixed $woundRating
     */
    public function setWoundRating($woundRating)
    {
        $this->woundRating = $woundRating;
    }

    /**
     * @return mixed
     */
    public function getWoundRating()
    {
        return $this->woundRating;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }
}
