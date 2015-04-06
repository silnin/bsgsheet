<?php

namespace Silnin\BsgSheet\CharacterBundle\Service;

use Doctrine\ORM\EntityManager;
use Silnin\BsgSheet\CharacterBundle\Entity\Character;
use Silnin\BsgSheet\CharacterBundle\Service\AttributeService;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Silnin\BsgSheet\CharacterBundle\Service\CharacterSecurityService;


class CharacterService
{
    /** @var EntityManager  */
    protected $entityManager;

    /** @var CharacterSecurityService  */
    protected $securityService;

    /** @var AttributeService  */
    protected $attributeService;

    /**
     * @param EntityManager $em
     * @param CharacterSecurityService $securityService
     * @param AttributeService $attributeService
     */
    public function __construct(
        EntityManager $em,
        CharacterSecurityService $securityService,
        AttributeService $attributeService)
    {
        $this->entityManager = $em;
        $this->securityService = $securityService;
        $this->attributeService = $attributeService;
    }

    /**
     * @return array
     */
    public function listMySheets()
    {
        //@todo 2015-04-05: This should be refactored: Highly inefficient to load all characters. :(
        $entities = $this->entityManager->getRepository('CharacterBundle:Character')->findAll();

        return $this->securityService->filterMyCharacters($entities);
    }

    /**
     * Create an empty character
     *
     * @param boolean $persist
     * @return Character
     */
    public function createBaseCharacter($persist = true)
    {
        $character = new Character();
        $character->setName('My guy');
        $character->setCreateDate(new \DateTime("now"));
        $character->setAdvancementPoints(0);
        $character->setPlotPoints(0);
        $character->setStunRating(0);
        $character->setWoundRating(0);
        $character->setActive(false);

        //$character->setCallsign('');
        //$character->setDescription('Description here');
        //$character->setHomeworld('');

        $this->attributeService->createAttributesForBaseCharacter($character);

        // persist
        if ($persist) {
            $this->storeCharacter($character);
        }

        // make current user owner
        $this->securityService->grantAccessToOwnContent($character);

        return $character;
    }

    public function storeCharacter(Character $character)
    {
        $this->entityManager->persist($character);
        $this->entityManager->flush();

//        $this->securityService->grantAccessToOwnContent($character);
    }
}

