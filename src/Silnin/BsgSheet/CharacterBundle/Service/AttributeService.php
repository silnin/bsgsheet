<?php

namespace Silnin\BsgSheet\CharacterBundle\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Silnin\BsgSheet\CharacterBundle\Entity\Character;
use Silnin\BsgSheet\CharacterBundle\Entity\Attribute;

class AttributeService
{
    /**
     * @param Character $character
     * @return void
     */
    public function createAttributesForBaseCharacter(Character $character)
    {
        $attributes = new ArrayCollection;
        $attributes->add($this->createAttribute(Attribute::TYPE_STRENGTH, $character));
        $attributes->add($this->createAttribute(Attribute::TYPE_AGILITY, $character));
        $attributes->add($this->createAttribute(Attribute::TYPE_VITALITY, $character));
        $attributes->add($this->createAttribute(Attribute::TYPE_ALERTNESS, $character));
        $attributes->add($this->createAttribute(Attribute::TYPE_INTELLIGENCE, $character));
        $attributes->add($this->createAttribute(Attribute::TYPE_WILLPOWER, $character));

        $character->setAttributes($attributes);
    }

    private function createAttribute($type, Character $character)
    {
        return new Attribute($type, 0, $character, Attribute::MINIMAL_STEP_DEFAULT , Attribute::MAXIMUM_STEP_DEFAULT);
    }
}
