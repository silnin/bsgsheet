<?php

namespace Silnin\BsgSheet\CharacterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\EntityManager;

use Silnin\BsgSheet\CharacterBundle\Service\RankService;
use Silnin\BsgSheet\CharacterBundle\Service\CharacterService;
use Silnin\BsgSheet\CharacterBundle\Entity\Character;
use Silnin\BsgSheet\CharacterBundle\Entity\Rank;

/**
 * Character Creation controller.
 *
 * @Route("/character")
 */
class RankController extends Controller
{
    /**
    * Choose a rank for this character
    *
    * @Route("/{characterId}/create-rank", name="character_create_rank")
    * @Method("POST")
    * @Template()
    *
    * @param integer $characterId
    * @return array
    */
    public function createRankAction($characterId)
    {
        return array(
            'ranks'=> [
                Rank::RANK_NANE_RECRUIT,
                Rank::RANK_NANE_VETERAN,
                Rank::RANK_NANE_SEASONED_VETERAN
            ],
            'characterId' => $characterId,
        );
    }

    /**
     * @Route("/{characterId}/set-rank/{rankName}", name="character_set_rank")
     * @Method("GET")
     * @Template()
     *
     * @param integer $characterId
     * @param string $rankName
     */
    public function setRankAction($characterId, $rankName)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        /** @var Character $character */
        $character = $em->getRepository('CharacterBundle:Character')->find($characterId);

        /** @var RankService $rankService */
        $rankService = $this->get('rank.service');

        /** @var Rank $rank */
        $rank = $rankService->createRank($rankName);

        $character->setRank($rank);

        /** @var CharacterService $characterService */
        $characterService = $this->get('character.service');
        $characterService->storeCharacter($character);

        return $this->redirectToRoute('character_edit_attributes', array('characterId' => $characterId));

        // forward to ....point buyaroo!
//        return $this->forward('CharacterBundle:Attribute:editAttributes', array(
//            'characterId'  => $characterId,
//        ));
    }
}

