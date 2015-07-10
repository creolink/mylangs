<?php
namespace Jakub\MylangsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Jakub\MylangsBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;
    
    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setSalt(md5(uniqid()));
        
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($userAdmin);
        
        $userAdmin->setPassword($encoder->encodePassword('secret', $userAdmin->getSalt()));
        $userAdmin->setFullname('Jakub Luczynski');
        $userAdmin->setEmail('jakub.luczynski@gmail.com');

        $manager->persist($userAdmin);
        $manager->flush();
        
        $this->addReference('admin-user', $userAdmin);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
