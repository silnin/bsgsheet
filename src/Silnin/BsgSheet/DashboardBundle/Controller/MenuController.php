<?php
namespace Silnin\BsgSheet\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MenuController extends Controller
{
    public function dashboardMenuAction()
    {
        $myname = $this->get('security.context')->getToken()->getUser()->getUsername();

        return $this->render(
            'DashboardBundle:Dashboard:menu.html.twig',
            array('myname' => $myname)
        );
    }
}
