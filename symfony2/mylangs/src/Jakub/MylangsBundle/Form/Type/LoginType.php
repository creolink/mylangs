<?php

namespace Jakub\MylangsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $oBuilder, array $aOptions)
    {
        $oBuilder->add('login', 'text', array('label' => 'Your username:'));
        $oBuilder->add('password', 'password', array('label' => 'Your password:'));
		$oBuilder->add('lang', 'hidden');
		$oBuilder->add('save', 'submit', array('label' => 'Login'));
    }

    public function getName()
    {
        return 'login';
    }
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'Jakub\MylangsBundle\Entity\Login',
		));
	}
}