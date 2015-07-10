<?php

namespace Jakub\MylangsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegisterType extends AbstractType {

    public function buildForm(FormBuilderInterface $oBuilder, array $aOptions) {
        $oBuilder->add('username', 'text', array('label' => 'Your username:'));
        $oBuilder->add('password', 'password', array('label' => 'Your password:'));
        $oBuilder->add('confirm', 'password', array('label' => 'Confirm password:'));
        $oBuilder->add('save', 'submit', array('label' => 'Register'));
    }

    public function getName() {
        return 'register';
    }

    public function setDefaultOptions(OptionsResolverInterface $oResolver) {
        $oResolver->setDefaults(array(
            'data_class' => 'Jakub\MylangsBundle\Entity\Register',
        ));
    }
}
