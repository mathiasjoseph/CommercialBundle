<?php

namespace Miky\Bundle\CommercialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MikyCommercialBundle:Default:index.html.twig');
    }
}
