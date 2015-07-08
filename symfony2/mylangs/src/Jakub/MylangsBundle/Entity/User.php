<?php
namespace Jakub\MylangsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/* php app/console doctrine:generate:entities Jakub/MylangsBundle/Entity/User */
/* php app/console doctrine:generate:entities Jakub */

/* php app/console doctrine:schema:update --force */

/**
 * @ORM\Entity
 * @ORM\Table(name="users", options={"comment":"Users"})
 */
class User implements UserInterface, \Serializable {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"comment":"uniqe autoincremented id, user id"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=50, options={"comment":"user name"})
     */
    private $username;
    
    /**
     * @ORM\Column(type="string", length=100, options={"comment":"user password"})
     */
    private $password;
    
    /**
     * @ORM\Column(name="fullname", type="string", length=50, options={"comment":"user name and lastname"})
     */
    private $fullname;
    
    /**
     * @ORM\Column(type="string", length=60, unique=true, options={"comment":"user email"})
     */
    private $email;
    
    /**
     * @ORM\Column(name="is_active", type="boolean", options={"comment":"user flag, 0 - blocked, 1 - active"})
     */
    private $isActive;

    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));
    }
    
    public function getRoles()
    {
        return array('ROLE_USER');
    }
    
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }
    
    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
    
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    
    public function eraseCredentials()
    {
    }

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     * @return User
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string 
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}