<?php
namespace Jakub\MylangsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/* php app/console doctrine:generate:entities Jakub */
/* php app/console doctrine:schema:update --force */

/**
 * @ORM\Entity
 * @ORM\Table(name="words", options={"comment":"Words"})
 */
class Word {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"comment":"unique autoincremented id, id of word"})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=50, options={"comment":"noun, verb, adjective"})
     */
    protected $type;
    
    /**
     * @ORM\Column(type="integer", options={"comment":"word is countable 1 or not 0"})
     */
    protected $countable;
    
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
     * Set type
     *
     * @param string $type
     * @return Word
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set countable
     *
     * @param integer $countable
     * @return Word
     */
    public function setCountable($countable)
    {
        $this->countable = $countable;

        return $this;
    }

    /**
     * Get countable
     *
     * @return integer 
     */
    public function getCountable()
    {
        return $this->countable;
    }

    /**
     * Set native
     *
     * @param string $native
     * @return Word
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
    
    // words, wordstype
    protected $words;
    
    public function getWords()
    {
        return $this->words;
    }

    public function setWords(Words $words = null)
    {
        $this->words = $words;
    }
}
