<?php
namespace Jakub\MylangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

use Jakub\MylangsBundle\Entity\Login;
use Jakub\MylangsBundle\Form\Type\LoginType;

#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller {

    public function indexAction(Request $oRequest) {
        $oLogin = new Login();
        $oForm = $this->createForm(new LoginType(), $oLogin);

        $oValidator = $this->get('validator');
        $errors = $oValidator->validate($oLogin);

        //echo '<pre>'.print_r($errors, TRUE).'</pre>'; die();

        $oForm->handleRequest($oRequest);

        if ($oForm->isValid()) {
            return $this->redirect($this->generateUrl('jakub_mylangs_account'));
        }

        return $this->render('JakubMylangsBundle:Home:home.html.twig', array('form' => $oForm->createView()));
    }

    public function loginAction() {
        
    }

}