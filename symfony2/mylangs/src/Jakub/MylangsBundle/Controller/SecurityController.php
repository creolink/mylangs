<?php
namespace Jakub\MylangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

use Jakub\MylangsBundle\Entity\Login;
use Jakub\MylangsBundle\Form\Type\LoginType;

#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SecurityController extends Controller
{
    public function loginAction(Request $oRequest) {
        //echo '<pre>'.print_r($oRequest, TRUE).'</pre>'; die();
        
        $oSession = $oRequest->getSession();

        if ($oRequest->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $oRequest->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $oSession->get(SecurityContext::AUTHENTICATION_ERROR);
            $oSession->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        $oLogin = new Login();
        $oForm = $this->createForm(new LoginType(), $oLogin, array('action' => $this->generateUrl('login_check')));

        /*
        $oValidator = $this->get('validator');
        $errors = $oValidator->validate($oLogin);
        
        $oForm->handleRequest($oRequest);

        if ($oForm->isValid()) {
            return $this->redirect($this->generateUrl('account'));
        }
        */
        
        return $this->render(
            'JakubMylangsBundle:Home:home.html.twig',
            array(
                'last_username' => $oSession->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
                'form'          => $oForm->createView()
            )
        );
    }

    public function logoutAction() {
        
    }
    
    public function loginCheckAction() {
        //echo '<pre>'.print_r($_POST, TRUE).'</pre>'; die();
    }
}