<?php
namespace Silnin\SilninBsgDashboardBundle\Service;

use Symfony\Component\Security\Core\SecurityContext;

class DashboardService
{
    /** @var \Symfony\Component\Security\Core\SecurityContext */
    protected $securityContext;

    /**
     * @param SecurityContext $context
     */
    public function __construct(SecurityContext $context)
    {
        $this->securityContext = $context;
    }

    /**
     * Construct a dashboard for logged in user, displaying his character sheets
     * and some CRUD functionality for them
     * 
     * @return array
     */
    public function createDashboard()
    {
        return array('hop'=>'ingelogd als ' . $this->securityContext->getToken()->getUser()->getUsername());
    }
}