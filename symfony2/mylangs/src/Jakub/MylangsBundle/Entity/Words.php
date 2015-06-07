<?php
namespace Jakub\MylangsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/* php app/console doctrine:generate:entities Jakub */
/* php app/console doctrine:schema:update --force */

/**
 * @ORM\Entity
 * @ORM\Table(name="words_dictionary", options={"comment":"Words in each language"})
 */
class Words {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"comment":"id of word === words.id"})
     */
    protected $words_id;
    
    /**
     * @ORM\Column(type="string", length=250, options={"comment":"fraze in selected language"})
     */
    protected $word;

    /**
     * Set words_id
     *
     * @param integer $wordsId
     * @return Words
     */
    public function setWordsId($wordsId)
    {
        $this->words_id = $wordsId;

        return $this;
    }

    /**
     * Get words_id
     *
     * @return integer 
     */
    public function getWordsId()
    {
        return $this->words_id;
    }

    /**
     * Set word
     *
     * @param string $word
     * @return Words
     */
    public function setWord($word)
    {
        $this->word = $word;

        return $this;
    }

    /**
     * Get word
     *
     * @return string 
     */
    public function getWord()
    {
        return $this->word;
    }
}
