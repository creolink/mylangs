<?php
namespace Jakub\MylangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Jakub\MylangsBundle\Entity\Register;
use Jakub\MylangsBundle\Form\Type\RegisterType;

#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class RegisterController extends Controller {

    public function indexAction(Request $oRequest) {
        $oRegister = new Register();
        $oForm = $this->createForm(new RegisterType(), $oRegister, array('action' => $this->generateUrl('register')));

        $oValidator = $this->get('validator');
        $errors = $oValidator->validate($oRegister);
        
        $oForm->handleRequest($oRequest);

        if ($oForm->isValid()) {
            
        }
        
        return $this->render(
            'JakubMylangsBundle:Register:register.html.twig',
            array(
                'form'          => $oForm->createView(),
                'error'         => ''
            )
        );
        
        return $oResponse;
    }
}