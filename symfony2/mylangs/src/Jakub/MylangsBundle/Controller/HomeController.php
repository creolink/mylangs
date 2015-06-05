<?php

namespace Jakub\MylangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    public function indexAction(Request $oRequest)
    {
		$oForm = $this->createFormBuilder()
			->add('login', 'text')
			->add('password', 'password')
			->add('lang', 'hidden')
			->add('save', 'submit')
			->getForm();
		
		if ($oRequest->isMethod('POST')) {
			$oForm->bind($oRequest);
			
			if ($oForm->isValid()) {
				return $this->redirect($this->generateUrl('jakub_mylangs_account'));
			}
		}
		
        return $this->render('JakubMylangsBundle:Home:home.html.twig', array('form' => $oForm->createView()));
    }
	
	public function loginAction()
	{

	}
}
