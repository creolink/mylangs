<?php

namespace Jakub\MylangsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WordType extends AbstractType {

    public function buildForm(FormBuilderInterface $oBuilder, array $aOptions) {
        $oBuilder->add('id', 'hidden');
        $oBuilder->add('type', 'text', array('label' => 'Type of word:'));
        $oBuilder->add('word_en', 'text', array('label' => 'Word in English:'));
        $oBuilder->add('word_de', 'text', array('label' => 'Word in Deutch:'));
        $oBuilder->add('native', 'password', array('label' => 'Translation:'));
        $oBuilder->add('countable', 'checkbox', array('label' => 'Is countable:'));
        
        $oBuilder->add('save', 'submit', array('label' => 'Register'));
    }

    public function getName() {
        return 'word';
    }

    public function setDefaultOptions(OptionsResolverInterface $oResolver) {
        $oResolver->setDefaults(array(
            'data_class' => 'Jakub\MylangsBundle\Entity\Word',
        ));
    }
}
