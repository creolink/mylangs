<?php
namespace Jakub\MylangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Jakub\MylangsBundle\Entity\Register;
use Jakub\MylangsBundle\Form\Type\RegisterType;
use Jakub\MylangsBundle\Entity\User;

#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
#use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class RegisterController extends Controller {

    public function indexAction(Request $oRequest)
    {
        $oDB = $this->getDoctrine()->getManager();
        
        $oRegister = new Register();
        $oRegister->setDB($oDB);
        
        $oForm = $this->createForm(new RegisterType(), $oRegister, array('action' => $this->generateUrl('register')));
        
        $oForm->handleRequest($oRequest);
        
        if ($oForm->isValid()) {
            $oRegistration = $oForm->getData();
            
            //echo '<pre>'.print_r($oRegistration, TRUE).'</pre>'; die();
            
            $oUser = new User();
            $oUser->setUsername($oRegistration->getUserName());
            
            $oEncoder = $this->get('security.encoder_factory')->getEncoder($oUser);
            
            $oUser->setPassword($oEncoder->encodePassword($oRegistration->getPassword(), $oUser->getSalt()));
            $oUser->setFullname('');
            $oUser->setEmail($oRegistration->getUserName());
            
            // create user
            $oDB->persist($oUser);
            $oDB->flush();
            
            // autologin after registration
            $oToken = new UsernamePasswordToken($oUser, null, 'secured_area', array('ROLE_USER'));
            $this->get('security.context')->setToken($oToken);
            $this->get('session')->set('_security_secured_area', serialize($oToken));
            
            return $this->redirect($this->generateUrl('account'));
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