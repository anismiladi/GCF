<?php

declare(strict_types=1);

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
//use Doctrine\ORM\Mapping\MappedSuperclass;

//@ORM\Table(name="secteur_acteur_translation")
/**
 * 
 * @ORM\Entity
 */
class SecteurActeurTranslation
{
    use ORMBehaviors\Translatable\Translation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return SecteurActeurTranslation
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

}
