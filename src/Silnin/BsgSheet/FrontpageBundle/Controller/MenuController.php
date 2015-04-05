<?php
namespace Silnin\BsgSheet\FrontpageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Silnin\BsgSheet\UserBundle\Entity\User;

class MenuController extends Controller
{
    public function frontpageMenuAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $myname = '';
        if ($user instanceof User) {
            $myname = $user->getUsername();
        }

        return $this->render(
            'FrontpageBundle:Frontpage:menu.html.twig',
            array('myname' => $myname)
        );
    }
}
