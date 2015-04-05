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
        /* @var DashboardService $dashboardService */
        $dashboardService = $this->get('dashboard.service');

        return $dashboardService->createDashboard();
    }
}