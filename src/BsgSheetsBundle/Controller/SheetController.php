<?php

namespace BsgSheetsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

//use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\HttpFoundation\Request;

class SheetController extends Controller
{
    /**
     * @Route("/", name="_sheet")
     * @Template()
     */
    public function dashboardAction()
    {
//        return "Fuck yeah!";
        return array('yup'=>'zozeg');
        
    }
}
