<?php

namespace Silnin\BsgSheet\CharacterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\EntityManager;

/**
 * Character Creation controller.
 *
 * @Route("/character")
 */
class AttributeController extends Controller
{
    /**
     * Choose a rank for this character
     *
     * @Route("/{characterId}/edit-attributes", name="character_edit_attributes")
     * @Method("GET")
     * @Template()
     *
     * @param integer $characterId
     * @return array
     */
    public function editAttributesAction($characterId)
    {
        $em = $this->getDoctrine()->getManager();

        $character = $em->getRepository('CharacterBundle:Character')->find($characterId);

        return array(
            'characterId' => $characterId,
            'character' => $character
        );
    }

    public function buyAttribute($characterId, $attributeType)
    {
        // check if the rank has enough points
        // (if this attribute = 0, then cost = 4, but gets die 2)
        // (else cost is 2 and step goes up 1)
    }
}

