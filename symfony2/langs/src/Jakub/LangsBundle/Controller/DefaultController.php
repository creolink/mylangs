<?php

namespace Jakub\LangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JakubLangsBundle:Default:index.html.twig', array('name' => $name));
    }
}
