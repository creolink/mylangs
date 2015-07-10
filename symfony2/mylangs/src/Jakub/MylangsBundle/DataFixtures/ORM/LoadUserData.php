<?php
namespace Jakub\MylangsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Jakub\MylangsBundle\Entity\User;

/* php app/console doctrine:fixtures:load */

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $oContainer;
    
    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $oContainer = null)
    {
        $this->oContainer = $oContainer;
    }
    
    /**
     * {@inheritDoc}
     */
    public function loadUser(ObjectManager $oManager, $sUserName, $sPassword, $sFullName, $sEmail)
    {
        $oUser = new User();
        $oUser->setUsername($sUserName);
        //$oUser->setSalt(md5(uniqid()));
        
        $encoder = $this->oContainer->get('security.encoder_factory')->getEncoder($oUser);
        
        $oUser->setPassword($encoder->encodePassword($sPassword, $oUser->getSalt()));
        $oUser->setFullname($sFullName);
        $oUser->setEmail($sEmail);

        $oManager->persist($oUser);
        $oManager->flush();
        
        $this->addReference($sUserName, $oUser);
    }
    
    public function load(ObjectManager $oManager)
    {
        $this->loadUser($oManager, 'admin1', 'test1', 'Andrzej Kmicic', 'andrzej.kmicic@creolink.pl');
        $this->loadUser($oManager, 'admin2', 'test2', 'Jakub Luczynski', 'jakub.luczynski@creolink.pl');
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
