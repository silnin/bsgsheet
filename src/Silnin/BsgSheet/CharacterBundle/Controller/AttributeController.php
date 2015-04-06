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
     * @Method("POST")
     * @Template()
     *
     * @param integer $characterId
     * @return array
     */
    public function editAttributesAction($characterId)
    {
        return array(
            'characterId' => $characterId,
        );
    }
}

