<?php
namespace Jakub\MylangsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Jakub\MylangsBundle\Entity\Word;
use Jakub\MylangsBundle\Form\Type\WordType;


class WordController extends Controller {

    public function indexAction() {
        
        $oForm = $this->createForm(new WordType(), new Word(), array('action' => $this->generateUrl('addword')));
        
        return $this->render(
            'JakubMylangsBundle:Account:word.html.twig',
            array(
                'form'          => $oForm->createView(),
                'error'         => ''
            )
        );
    }
}