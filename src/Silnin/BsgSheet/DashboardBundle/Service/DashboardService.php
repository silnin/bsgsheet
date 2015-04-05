<?php
namespace Silnin\BsgSheet\DashboardBundle\Service;

use Silnin\BsgSheet\CharacterBundle\Service\CharacterService;
use Symfony\Component\Security\Core\SecurityContext;

class DashboardService
{
    /** @var \Symfony\Component\Security\Core\SecurityContext */
    protected $securityContext;

    /** @var CharacterService */
    protected $characterService;

    /**
     * @param SecurityContext $context
     * @param CharacterService $characterService
     */
    public function __construct(
        SecurityContext $context,
        CharacterService $characterService)
    {
        $this->securityContext = $context;
        $this->characterService = $characterService;
    }

    /**
     * Construct a dashboard for logged in user, displaying his character sheets
     * and some CRUD functionality for them
     *
     * @return array
     */
    public function createDashboard()
    {
        return array(
            'menu' => $this->createDashboardMenu(),
            'entities' => $this->listMySheets()
        );
    }

    private function createDashboardMenu()
    {
        //@todo: 2015-04-5 call User service for this, leave out security context
        $menu = 'ik ben ' . $this->securityContext->getToken()->getUser()->getUsername();
        return $menu;
    }

    // crud functionality much?
    private function listMySheets()
    {
        $myEntities = $this->characterService->listMySheets();
        // @todo: this thing should render something, i think....?

        return $myEntities;
    }
}