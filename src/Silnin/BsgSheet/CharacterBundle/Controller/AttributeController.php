<?php

namespace Silnin\BsgSheet\CharacterBundle\Controller;

use Silnin\BsgSheet\CharacterBundle\Entity\Attribute;
use Silnin\BsgSheet\CharacterBundle\Entity\Character;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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

    /**
     * Choose a rank for this character
     *
     * @Route("/{characterId}/sell-attribute/{attributeId}", name="character_sell_attribute")
     * @Method("GET")
     *
     * @param integer $characterId
     * @param integer $attributeId
     * @return array
     */
    public function sellAttributeAction($characterId, $attributeId)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var Character $character */
        $character = $em->getRepository('CharacterBundle:Character')->find($characterId);

        /** @var Attribute $attribute */
        $attribute = $em->getRepository('CharacterBundle:Attribute')->find($attributeId);

        // allow lessing is attribute step is more than minimal step
        if ($attribute->getStep() <= $attribute->getMinStep()) {
            // NOK: Not enough saldo: flash notice?
            $this->addFlash(
                'notice',
                $attribute->getType() . ' cannot be lowered.'
            );
            // redirect back character_edit_attributes
            return $this->redirectToRoute('character_edit_attributes', array('characterId' => $characterId));
        }

        // ok: +2 attr points. step-1
        $loweredStep = $attribute->getStep()-1;
        $increasedAttributePoints = $character->getRank()->getAttributePoints() + 2;

        $attribute->setStep($loweredStep);
        $character->getRank()->setAttributePoints($increasedAttributePoints);

        // store updated character
        $em->persist($character);
        $em->flush();

        // OK flash
        $this->addFlash(
            'notice',
            $attribute->getType() . ' downgraded'
        );

        // redirect back character_edit_attributes
        return $this->redirectToRoute('character_edit_attributes', array('characterId' => $characterId));
    }

    /**
     * Choose a rank for this character
     *
     * @Route("/{characterId}/buy-attribute/{attributeId}", name="character_buy_attribute")
     * @Method("GET")
     *
     * @param integer $characterId
     * @param integer $attributeId
     * @return array
     */
    public function buyAttributeAction($characterId, $attributeId)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var Character $character */
        $character = $em->getRepository('CharacterBundle:Character')->find($characterId);

        /** @var Attribute $attribute */
        $attribute = $em->getRepository('CharacterBundle:Attribute')->find($attributeId);

        ///** @var Rank $attribute */
        //$attribute = $em->getRepository('CharacterBundle:Attribute')->find($attributeId);

        $cost = 2;
        $stepUp = 1;

        // check price for this purchase
        // (if this attribute = 0, then cost = 4, but gets die 2)
        // (else cost is 2 and step goes up 1)
        if ($attribute->getStep() == 0) {
            $cost = 4;
            $stepUp = 2;
        }

        // check if the rank has enough points
        if ($character->getRank()->getAttributePoints() < $cost) {
            // NOK: Not enough saldo: flash notice?
            $this->addFlash(
                'notice',
                'You don\'t have enough Attribute Points to buy more ' . $attribute->getType()
            );
            // redirect back character_edit_attributes
            //return $this->redirectToRoute('character_edit_attributes', array('characterId' => $characterId));
            $response = new Response();

            $response->setContent('');
            $response->setStatusCode(999);
            $response->headers->set('Content-Type', 'text/html');

            // prints the HTTP headers followed by the content
            $response->send();
            die();
        }

        // confirm > store character

        // reduce attribute points by cost
        $character->getRank()->setAttributePoints(($character->getRank()->getAttributePoints()-$cost));

        $em->persist($character);

        // add step
        $newStep = $attribute->getStep() + $stepUp;
        $attribute->setStep($newStep);

        $em->persist($attribute);

        // $character->getAttributes()->add($attribute);
        $em->flush();

        // OK flash
        $this->addFlash(
            'notice',
            $attribute->getType() . ' upgraded!'
        );

        // redirect back character_edit_attributes
        $response = new Response();

        $content = $character->translateDie($attribute->getStep()) . ',' . $character->getRank()->getAttributePoints();
        $response->setContent($content);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/html');

        // prints the HTTP headers followed by the content
        $response->send();
        die();
    }
}
