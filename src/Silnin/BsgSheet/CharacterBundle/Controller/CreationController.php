<?php

namespace Silnin\BsgSheet\CharacterBundle\Controller;

use Silnin\BsgSheet\CharacterBundle\Service\CharacterService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use Symfony\Component\Security\Core\Exception\AccessDeniedException;
//use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
//use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
//use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Silnin\BsgSheet\CharacterBundle\Entity\Character;


/**
 * Character controller.
 *
 * @Route("/character")
 */
class CharacterController extends Controller
{
    /**
     * Choose how to finalize this character: manually or through a wizard
     *
     * @Route("/createAndWizard", name="character_create_and_wizard")
     * @Method("GET")
     * @Template()
     */
    public function createAndWizardBaseCharacter()
    {
        /** @var CharacterService $characterService */
        $characterService = $this->get('character.service');
        $character = $characterService->createBaseCharacter();

        $path = '/character/' . $character->getId() . '/rank';
        return $this->redirectToRoute($path, array($character->getId()));
    }

    /**
     * Choose how to finalize this character: manually or through a wizard
     *
     * @Route("/new", name="character_select_create_style")
     * @Method("GET")
     * @Template()
     */
    public function selectCreateMode()
    {
        // display choice: manual or wizard?
        return array('manual_path'=>'/createAndEdit', 'wizard_path'=>'/createAndWizard');

        //@todo direct edit or wizard of this character (do in template)
    }

    /**
     * Choose a rank for this character
     *
     * @Route("/{id}/rank", name="character_rank")
     * @Method("GET")
     * @Template()
     *
     * @param integer $id
     */
    public function selectRank($id)
    {
        //@todo redirects to next question (custom rank or attributes buy
    }
}