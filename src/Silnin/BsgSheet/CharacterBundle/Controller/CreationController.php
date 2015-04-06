<?php

namespace Silnin\BsgSheet\CharacterBundle\Controller;

use Silnin\BsgSheet\CharacterBundle\Service\CharacterService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Silnin\BsgSheet\CharacterBundle\Entity\Character;

/**
 * Character Creation controller.
 *
 * @Route("/character")
 */
class CreationController extends Controller
{
    /**
     * Choose how to finalize this character: manually or through a wizard
     *
     * @Route("/createAndWizard", name="character_create_and_wizard")
     * @Method("GET")
     * @Template()
     */
    public function createAndWizardBaseCharacterAction()
    {
        /** @var CharacterService $characterService */
        $characterService = $this->get('character.service');
        $character = $characterService->createBaseCharacter();

        return $this->forward('CharacterBundle:Rank:createRank', array(
            'characterId'  => $character->getId(),
        ));
        // return $this->redirectToRoute('character_create_rank', array('id'=>$character->getId()));
    }

    /**
     * Choose how to finalize this character: manually or through a wizard
     *
     * @Route("/createAndEdit", name="character_create_and_edit")
     * @Method("GET")
     * @Template()
     */
    public function createAndEditBaseCharacterAction()
    {
        /** @var CharacterService $characterService */
        $characterService = $this->get('character.service');
        $character = $characterService->createBaseCharacter();

        return $this->redirectToRoute('character_edit', array('id'=>$character->getId()));
    }

    /**
     * Choose how to finalize this character: manually or through a wizard
     *
     * @Route("/new", name="character_select_create_style")
     * @Method("GET")
     * @Template()
     */
    public function selectCreateModeAction()
    {
        return array();
    }
}