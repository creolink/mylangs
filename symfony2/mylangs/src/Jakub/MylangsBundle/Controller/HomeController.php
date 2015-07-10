<?php
namespace Jakub\MylangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Jakub\MylangsBundle\Entity\Login;
use Jakub\MylangsBundle\Form\Type\LoginType;

#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller {

    public function indexAction(Request $oRequest) {
        $oResponse = $this->forward('JakubMylangsBundle:Security:login', array($oRequest));
        
        //echo '<pre>'.print_r($response, TRUE).'</pre>'; die();
        
        return $oResponse;
    }
    
    public function loginAction() {
        
    }

}