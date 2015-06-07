<?php
namespace Jakub\MylangsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/* php app/console doctrine:generate:entities Jakub */
/* php app/console doctrine:schema:update --force */

/**
 * @ORM\Entity
 * @ORM\Table(name="phrases_dictionary", options={"comment":"Phrases in each language"})
 */
class Phrases {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"comment":"id of phrase === phrases.id"})
     */
    protected $phrases_id;
    
    /**
     * @ORM\Column(type="string", length=250, options={"comment":"fraze in selected language"})
     */
    protected $phrase;

    /**
     * Set phrases_id
     *
     * @param integer $phrasesId
     * @return Phrases
     */
    public function setPhrasesId($phrasesId)
    {
        $this->phrases_id = $phrasesId;

        return $this;
    }

    /**
     * Get phrases_id
     *
     * @return integer 
     */
    public function getPhrasesId()
    {
        return $this->phrases_id;
    }

    /**
     * Set phrase
     *
     * @param string $phrase
     * @return Phrases
     */
    public function setPhrase($phrase)
    {
        $this->phrase = $phrase;

        return $this;
    }

    /**
     * Get phrase
     *
     * @return string 
     */
    public function getPhrase()
    {
        return $this->phrase;
    }
}
