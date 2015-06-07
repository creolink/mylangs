<?php
namespace Jakub\MylangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Jakub\MylangsBundle\Entity\Login;

class AccountController extends Controller {

    public function indexAction() {
        return $this->render('JakubMylangsBundle:Account:account.html.twig');
    }

    public function loginAction() {
        
    }
}