<?php
namespace Silnin\SilninBsgDashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     * @Template()
     */
    public function showDashboardAction()
    {
         return array('hop'=>'tja');

//        /* @var LoginService $loginService */
//        $loginService = $this->get('user.login');
//        $value = $loginService->getMeSome();
//        return ['hop'=>$value];
    }
}