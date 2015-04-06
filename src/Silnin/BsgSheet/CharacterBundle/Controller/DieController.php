<?php

namespace Silnin\BsgSheet\CharacterBundle\Controller;

use Silnin\BsgSheet\CharacterBundle\Service\DieService;
//use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Character Creation controller.
 *
 * @Route("/translate_die/{step}")
 * @Method("GET")
 */
class DieController extends Controller
{
    public function translateDieAction($step)
    {
//        return new Response('Hello, world');
        /** @var DieService $dieService */
        $dieService = $this->get('die.service');
        $translation = $dieService->translateDie($step);
        return new Response($translation);
    }
}
