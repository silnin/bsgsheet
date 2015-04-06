<?php
namespace Silnin\BsgSheet\CharacterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bsg_rank")
 */
class Rank
{
    const RANK_NANE_RECRUIT = 'recruit';
    const RANK_NANE_VETERAN = 'veteran';
    const RANK_NANE_SEASONED_VETERAN = 'seasoned veteran';

    const ATTRIBUTE_POINTS_RECRUIT = '42';
    const ATTRIBUTE_POINTS_VETERAN = '42';
    const ATTRIBUTE_POINTS_SEASONED_VETEREAN = '42';

    const SKILL_POINTS_RECRUIT = '62';
    const SKILL_POINTS_VETERAN = '62';
    const SKILL_POINTS_SEASONED_VETERAN = '62';

    const TRAIT_POINTS_RECRUIT = '0';
    const TRAIT_POINTS_VETERAN = '0';
    const TRAIT_POINTS_SEASONED_VETERAN = '0';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=32, unique=false, nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(name="attribute_points", type="integer")
     */
    protected $attributePoints;

    /**
     * @ORM\Column(name="skill_points", type="integer")
     */
    protected $skillPoints;

    /**
     * @ORM\Column(name="trait_points", type="integer")
     */
    protected $traitPoints;

    /**
     * @param mixed $attributePoints
     */
    public function setAttributePoints($attributePoints)
    {
        $this->attributePoints = $attributePoints;
    }

    /**
     * @return mixed
     */
    public function getAttributePoints()
    {
        return $this->attributePoints;
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
     * @param mixed $skillPoints
     */
    public function setSkillPoints($skillPoints)
    {
        $this->skillPoints = $skillPoints;
    }

    /**
     * @return mixed
     */
    public function getSkillPoints()
    {
        return $this->skillPoints;
    }

    /**
     * @param mixed $traitPoints
     */
    public function setTraitPoints($traitPoints)
    {
        $this->traitPoints = $traitPoints;
    }

    /**
     * @return mixed
     */
    public function getTraitPoints()
    {
        return $this->traitPoints;
    }
}