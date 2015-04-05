<?php
namespace Silnin\SilninUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Silnin\SilninUserBundle\Service\LoginService;

class UserController extends Controller
{
    /**
     * @Route("/", name="login")
     * @Route("/bla/{destinationRoute}", name="login")
     * @Template()
     */
    public function loginAction($destinationRoute)
    {
       // return array('hop'=>'tja');

        /* @var LoginService $loginService */
        $loginService = $this->get('user.login');
        $value = $loginService->getMeSome();
        return ['hop'=>$value];
    }
}