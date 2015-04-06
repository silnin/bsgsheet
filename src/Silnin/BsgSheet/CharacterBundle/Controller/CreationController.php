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
     * @Route("/create", name="character_create")
     * @Method("GET")
     * @Template()
     */
    public function createBaseCharacter()
    {
        /** @var CharacterService $characterService */
        $characterService = $this->get('character.service');
        $character = $characterService->createBaseCharacter();

        //@todo store character in session? or i in url..is better i think...

        //@todo redirect wiz or manual
    }

    /**
     * Choose how to finalize this character: manually or through a wizard
     *
     * @Route("/{id}/create", name="character_createstyle")
     * @Method("GET")
     * @Template()
     *
     * @param integer $id
     */
    public function selectCreateMode($id)
    {
        //@todo direct edit or wizard of this character
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