<?php
namespace Silnin\BsgSheet\CharacterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bsg_rank")
 */
class Rank
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", columnDefinition="ENUM('recruit', 'veteran', 'seasoned veteran', 'custom')", unique=false, nullable=false)
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