<?php
namespace Silnin\BsgSheet\CharacterBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;

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
     * @ORM\Column(name="name", type="string", length=64)
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
     * @ORM\OneToOne(targetEntity="Rank", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="rank_id", referencedColumnName="id", nullable=true)
     **/
    protected $rank;

    /**
     * @ORM\OneToMany(targetEntity="Attribute", mappedBy="character", cascade={"persist", "remove"})
     **/
    protected $attributes;

    public function __construct()
    {
        $this->attributes = new ArrayCollection();
    }

    /**
     * @param integer $advancementPoints
     */
    public function setAdvancementPoints($advancementPoints)
    {
        $this->advancementPoints = $advancementPoints;
    }

    /**
     * @return integer
     */
    public function getAdvancementPoints()
    {
        return $this->advancementPoints;
    }

    /**
     * @param string $callsign
     */
    public function setCallsign($callsign)
    {
        $this->callsign = $callsign;
    }

    /**
     * @return string
     */
    public function getCallsign()
    {
        return $this->callsign;
    }

    /**
     * @param string $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return string
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $homeworld
     */
    public function setHomeworld($homeworld)
    {
        $this->homeworld = $homeworld;
    }

    /**
     * @return string
     */
    public function getHomeworld()
    {
        return $this->homeworld;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param integer $plotPoints
     */
    public function setPlotPoints($plotPoints)
    {
        $this->plotPoints = $plotPoints;
    }

    /**
     * @return integer
     */
    public function getPlotPoints()
    {
        return $this->plotPoints;
    }

    /**
     * @param integer $stunRating
     */
    public function setStunRating($stunRating)
    {
        $this->stunRating = $stunRating;
    }

    /**
     * @return integer
     */
    public function getStunRating()
    {
        return $this->stunRating;
    }

    /**
     * @param integer $woundRating
     */
    public function setWoundRating($woundRating)
    {
        $this->woundRating = $woundRating;
    }

    /**
     * @return integer
     */
    public function getWoundRating()
    {
        return $this->woundRating;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param Rank $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return Rank
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param ArrayCollection $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return ArrayCollection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Retrieve a specific Attribute of a given name
     *
     * @param string $type
     * @return Attribute
     */
    private function getNamedAttribute($type) {
        $types = array($type);
        $criteria = Criteria::create()->where(Criteria::expr()->in("type", $types));
        return $this->getAttributes()->matching($criteria)->first();
    }

    /**
     * Return the step value of the character's strength
     * @return integer
     */
    public function getStrength()
    {
        return $this->getNamedAttribute('strength')->getStep();
    }

    /**
     * Return the step value of the character's agility
     * @return integer
     */
    public function getAgility()
    {
        return $this->getNamedAttribute('agility')->getStep();
    }

    /**
     * Return the step value of the character's vitality
     * @return integer
     */
    public function getVitality()
    {
        return $this->getNamedAttribute('vitality')->getStep();
    }

    /**
     * Return the step value of the character's alertness
     * @return integer
     */
    public function getAlertness()
    {
        return $this->getNamedAttribute('alertness')->getStep();
    }

    /**
     * Return the step value of the character's intelligence
     * @return integer
     */
    public function getIntelligence()
    {
        return $this->getNamedAttribute('intelligence')->getStep();
    }

    /**
     * Return the step value of the character's willpower
     * @return integer
     */
    public function getWillpower()
    {
        return $this->getNamedAttribute('willpower')->getStep();
    }

    /**
     * Return the die type of the character's strength
     * @return string
     */
    public function getStrengthDie()
    {
        return $this->translateDie($this->getNamedAttribute('strength')->getStep());
    }

    /**
     * Return the die type of the character's agility
     * @return string
     */
    public function getAgilityDie()
    {
        return $this->translateDie($this->getNamedAttribute('agility')->getStep());
    }

    /**
     * Return the die type of the character's vitality
     * @return string
     */
    public function getVitalityDie()
    {
        return $this->translateDie($this->getNamedAttribute('vitality')->getStep());
    }

    /**
     * Return the die type of the character's alertness
     * @return string
     */
    public function getAlertnessDie()
    {
        return $this->translateDie($this->getNamedAttribute('alertness')->getStep());
    }

    /**
     * Return the die type of the character's intelligence
     * @return string
     */
    public function getIntelligenceDie()
    {
        return $this->translateDie($this->getNamedAttribute('intelligence')->getStep());
    }

    /**
     * Return the die type of the character's willpower
     * @return string
     */
    public function getWillpowerDie()
    {
        return $this->translateDie($this->getNamedAttribute('willpower')->getStep());
    }

    /**
     * param string $property
     * return string
     */
    public function getDie($property)
    {
        // stub for magic function to find the die of any stat (attr, skill, traits, weapon dmg?)
    }

    /**
     * @return string
     */
    public function getLifePointsDie() {
        return  $this->getVitalityDie() . '  ' . $this->getWillpowerDie();
    }

    /**
     * @return string
     */
    public function getInitiativeDie() {
        return  $this->getAgilityDie() . '  ' . $this->getAlertnessDie();
    }

    /**
     * @return string
     */
    public function getEnduranceDie() {
        return  $this->getVitalityDie() . '  ' . $this->getWillpowerDie();
    }

    /**
     * @return string
     */
    public function getResistanceDie() {
        return  $this->getVitalityDie() . '  ' . $this->getVitalityDie();
    }

    /**
     * translates a die type (integer 1 to infinite) into a string of dice from d2 to d12. 1=d2,6=d12, interval of 2
     *
     * @param integer $die
     * @return string
     */
    public function translateDie($die) {
        $result = '';

        if ($die == 0) {
            return '0';
        }

        if ($die > 6) {
            $result .= '+d12';
            $die -= 6;
            $result .= $this->translateDie($die);
        } else
        {
            $result .= '+d' . ($die*2);
        }

        return $result;
    }
}
