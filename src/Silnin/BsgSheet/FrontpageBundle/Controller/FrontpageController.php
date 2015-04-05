<?php
namespace Silnin\BsgSheet\FrontpageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FrontpageController extends Controller
{
    /**
     * @Route("/", name="frontpage")
     * @Template()
     */
    public function frontpageAction()
    {
        return array(
            'hophop' => 'jaja'
        );
    }

}
