<?php

namespace Jakub\MylangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Jakub\MylangsBundle\Entity\Login;
use Jakub\MylangsBundle\Form\Type\LoginType;

#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    public function indexAction(Request $oRequest)
    {
		$oLogin = new Login();
		
		$oForm = $this->createForm(new LoginType(), $oLogin);
		
		/*
		$oForm = $this->createFormBuilder($oLogin)
			->setMethod('POST')
			->add('login', 'text', array('label' => 'Your username:'))
			->add('password', 'password', array('label' => 'Your password:'))
			->add('lang', 'hidden')
			->add('save', 'submit', array('label' => 'Login'))
			->getForm();
		*/
		
		$oForm->handleRequest($oRequest);
		
		if ($oForm->isValid()) {
			return $this->redirect($this->generateUrl('jakub_mylangs_account'));
		}
		
        return $this->render('JakubMylangsBundle:Home:home.html.twig', array('form' => $oForm->createView()));
    }
	
	public function loginAction()
	{

	}
}
