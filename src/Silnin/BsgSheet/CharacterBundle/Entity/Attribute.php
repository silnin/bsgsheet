<?php
namespace Silnin\BsgSheet\CharacterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bsg_attribute")
 */
class Attribute
{
    const TYPE_STRENGTH = 'strength';
    const TYPE_AGILITY = 'agility';
    const TYPE_VITALITY = 'vitality';
    const TYPE_INTELLIGENCE = 'intelligence';
    const TYPE_WILLPOWER = 'willpower';
    const TYPE_ALERTNESS = 'alertness';

    const MINIMAL_STEP_DEFAULT = 2; // d4
    const MAXIMUM_STEP_DEFAULT = 12; // d12+d12...thats insane though

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Character", inversedBy="attributes")
     * @ORM\JoinColumn(name="character_id", referencedColumnName="id")
     **/
    protected $character;

    /**
     * @ORM\Column(name="type", type="string", length=32, unique=false, nullable=false)
     */
    protected $type;

    /**
     * @ORM\Column(name="step", type="integer")
     */
    protected $step;

    /**
     * @ORM\Column(name="minStep", type="integer")
     */
    protected $minStep;

    /**
     * @ORM\Column(name="maxStep", type="integer")
     */
    protected $maxStep;

    /**
     * @param string $type
     * @param integer $step
     * @param Character $character
     * @param integer $minStep
     * @param integer $maxStep
     */
    public function __construct(
        $type,
        $step,
        Character $character,
        $minStep,
        $maxStep
    ) {
        $this->type = $type;
        $this->step = $step;
        $this->character = $character;
        $this->minStep = $minStep;
        $this->maxStep = $maxStep;
    }

    /**
     * @param mixed $character
     */
    public function setCharacter($character)
    {
        $this->character = $character;
    }

    /**
     * @return mixed
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $maxStep
     */
    public function setMaxStep($maxStep)
    {
        $this->maxStep = $maxStep;
    }

    /**
     * @return mixed
     */
    public function getMaxStep()
    {
        return $this->maxStep;
    }

    /**
     * @param mixed $minStep
     */
    public function setMinStep($minStep)
    {
        $this->minStep = $minStep;
    }

    /**
     * @return mixed
     */
    public function getMinStep()
    {
        return $this->minStep;
    }

    /**
     * @param mixed $step
     */
    public function setStep($step)
    {
        $this->step = $step;
    }

    /**
     * @return mixed
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }


}
