<?php

namespace Jakub\MylangsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoginType extends AbstractType {

    public function buildForm(FormBuilderInterface $oBuilder, array $aOptions) {
        $oBuilder->add('username', 'text', array('label' => 'Your username:'));
        $oBuilder->add('password', 'password', array('label' => 'Your password:'));
        $oBuilder->add('lang', 'hidden');
        $oBuilder->add('save', 'submit', array('label' => 'Login'));
    }

    public function getName() {
        return 'login';
    }

    public function setDefaultOptions(OptionsResolverInterface $oResolver) {
        $oResolver->setDefaults(array(
            'data_class' => 'Jakub\MylangsBundle\Entity\Login',
        ));
    }

    public function configureOptions(OptionsResolver $oResolver)
    {
        $oResolver->setDefaults(array(
            'data_class' => 'Jakub\MylangsBundle\Entity\User'
        ));
    }
}
