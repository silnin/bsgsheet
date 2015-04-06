<?php

namespace Silnin\BsgSheet\CharacterBundle\Service;

use Doctrine\ORM\EntityManager;
use Silnin\BsgSheet\CharacterBundle\Entity\Character;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Silnin\BsgSheet\CharacterBundle\Service\CharacterSecurityService;


class CharacterService
{
    /** @var EntityManager  */
    protected $entityManager;

    /** @var CharacterSecurityService  */
    protected $securityService;

    /**
     * @param EntityManager $em
     * @param CharacterSecurityService $securityService
     */
    public function __construct(EntityManager $em, CharacterSecurityService $securityService)
    {
        $this->entityManager = $em;
        $this->securityService = $securityService;
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
     * @return Character
     */
    public function createBaseCharacter()
    {
        $character = new Character();
        $character->setAdvancementPoints(0);
        $character->setCallsign('');
        $character->setCreateDate(date('Y-m-d H:i:s'));
        $character->setDescription('Description here');
        $character->setHomeworld('');
        $character->setName('My guy');
        $character->setPlotPoints(0);
        $character->setStunRating(0);
        $character->setWoundRating(0);
        $character->setActive(false);

        // create a rank? (done by RankService of course)

        // persist?

        return $character;
    }
}

