<?php

namespace Silnin\BsgSheet\CharacterBundle\Service;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;

use Silnin\BsgSheet\CharacterBundle\Entity\Character;


class CharacterSecurityService
{
    protected $authorizationChecker;
    protected $tokenStorage;
    protected $aclProvider;

    public function __construct(
        $authorizationChecker,
        $tokenStorage,
        $aclProvider
    ) {
        $this->authorizationChecker = $authorizationChecker;
        $this->tokenStorage = $tokenStorage;
        $this->aclProvider = $aclProvider;
    }

    public function filterMyCharacters(array $characters)
    {
        $myCharacters = [];
        foreach ($characters as $character) {
            try {
                $this->checkAccess($character);
                $myCharacters[] = $character;
            } catch (AccessDeniedException $e) {
                continue;
            }
        }

        return $myCharacters;
    }

    /**
     * After creation of a character, grant the user 'owner' rights
     *
     * @param Character $character
     */
    public function grantAccessToOwnContent(Character $character)
    {
        // creating the ACL
        $objectIdentity = ObjectIdentity::fromDomainObject($character);
        $acl = $this->aclProvider->createAcl($objectIdentity);

        // retrieving the security identity of the currently logged-in user
        $user = $this->tokenStorage->getToken()->getUser();
        $securityIdentity = UserSecurityIdentity::fromAccount($user);

        // grant owner access
        $acl->insertObjectAce($securityIdentity, MaskBuilder::MASK_OWNER);
        $this->aclProvider->updateAcl($acl);
    }

    /**
     * Check whether the user is allowed to access this character
     *
     * @param Character $character
     * @throws AccessDeniedException
     */
    public function checkAccess(Character $character)
    {
        // check for edit access
        if (false === $this->authorizationChecker->isGranted('EDIT', $character)) {
            throw new AccessDeniedException();
        }
    }
}
