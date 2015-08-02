<?php
namespace Jakub\MylangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WordController extends Controller {

    public function indexAction() {
        return $this->render('JakubMylangsBundle:Account:account.html.twig');
    }
}