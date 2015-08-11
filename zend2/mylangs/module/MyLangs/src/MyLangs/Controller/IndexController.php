<?php

namespace MyLangs\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        die('aaa');
        return new ViewModel();
    }
    
    public function loginAction()
    {
        
    }
}