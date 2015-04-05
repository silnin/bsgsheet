<?php

namespace Silnin\BsgSheet\CharacterBundle\Service;

use Doctrine\ORM\EntityManager;
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
}

