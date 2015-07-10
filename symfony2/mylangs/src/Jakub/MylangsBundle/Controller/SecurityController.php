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
    public function loginAction() {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        $oLogin = new Login();
        $oForm = $this->createForm(new LoginType(), $oLogin);

        $oValidator = $this->get('validator');
        $errors = $oValidator->validate($oLogin);
        
        return $this->render(
            //'JakubMylangsBundle:Account:account.html.twig',
            'JakubMylangsBundle:Home:home.html.twig',
            array(
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
                'form' => $oForm->createView()
            )
        );
    }

    public function logoutAction() {
        
    }
}