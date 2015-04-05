<?php
namespace Silnin\BsgSheet\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Silnin\BsgSheet\DashboardBundle\Service\DashboardService;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     * @Template()
     */
    public function showDashboardAction()
    {
        $user = $this->getUser()->getId();
//        return array('hop'=>$user);

        /* @var DashboardService $dashboardService */
        $dashboardService = $this->get('dashboard.service');

        return $dashboardService->createDashboard();

//        /* @var LoginService $loginService */
//        $loginService = $this->get('user.login');
//        $value = $loginService->getMeSome();
//        return ['hop'=>$value];
    }
}