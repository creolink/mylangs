<?php

namespace Jakub\MylangsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WordsType extends AbstractType {

    public function buildForm(FormBuilderInterface $oBuilder, array $aOptions) {
        $oBuilder->add('words_id', 'hidden');
        $oBuilder->add('word', 'text', array('label' => 'The word:'));
    }

    public function getName() {
        return 'words';
    }

    public function setDefaultOptions(OptionsResolverInterface $oResolver) {
        $oResolver->setDefaults(array(
            'data_class' => 'Jakub\MylangsBundle\Entity\Words',
        ));
    }
}
