<?php
namespace Jakub\MylangsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/* php app/console doctrine:generate:entities Jakub */
/* php app/console doctrine:schema:update --force */

/**
 * @ORM\Entity
 * @ORM\Table(name="phrases", options={"comment":"Phrases"})
 */
class Phrase {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"comment":"unique autoincremented id, id of phrase"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=50, options={"comment":"fraze or word in user native language"})
     */
    protected $native;

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
     * Set native
     *
     * @param string $native
     * @return Phrase
     */
    public function setNative($native)
    {
        $this->native = $native;

        return $this;
    }

    /**
     * Get native
     *
     * @return string 
     */
    public function getNative()
    {
        return $this->native;
    }
}
