<?php
namespace Silnin\BsgSheet\CharacterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Silnin\BsgSheet\CharacterBundle\Service\CharacterService;
use Silnin\BsgSheet\CharacterBundle\Entity\Character;

/**
 * Character Creation controller.
 *
 * @Route("/character")
 */
class EditController extends Controller
{
    /**
    * Choose a rank for this character
    *
    * @Route("/{id}/edit", name="character_edit")
    * @Method("GET")
    * @Template()
    *
    * @param integer $id
    * @return array
    */
    public function editCharacterAction($id)
    {
        //@todo this should be in a different Controller! EditController probably
        return array('id'=>$id);
    }
}