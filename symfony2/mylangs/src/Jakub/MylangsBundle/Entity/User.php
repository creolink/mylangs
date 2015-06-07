<?php
namespace Jakub\MylangsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/* php app/console doctrine:generate:entities Jakub/MylangsBundle/Entity/User */
/* php app/console doctrine:generate:entities Jakub */

/* php app/console doctrine:schema:update --force */

/**
 * @ORM\Entity
 * @ORM\Table(name="users", options={"comment":"Users"})
 */
class User {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"comment":"uniqe autoincremented id, user id"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=50, options={"comment":"user login"})
     */
    protected $login;
    
    /**
     * @ORM\Column(type="string", length=100, options={"comment":"user password"})
     */
    protected $passwd;
    
    /**
     * @ORM\Column(type="string", length=50, options={"comment":"user name"})
     */
    protected $name;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set passwd
     *
     * @param string $passwd
     * @return User
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }

    /**
     * Get passwd
     *
     * @return string 
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
