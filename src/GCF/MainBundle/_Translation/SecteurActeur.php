<?php

declare(strict_types=1);

namespace GCF\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Validator\Constraints as Assert;

use Sonata\TranslationBundle\Model\TranslatableInterface;

/**
 * SecteurActeur
 *
 * @ORM\Table(name="secteur_acteur")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\SecteurActeurRepository")
 */
class SecteurActeur implements TranslatableInterface
{
    use Common\IdTrait;
    use ORMBehaviors\Translatable\Translatable;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Acteur", mappedBy="secteurActeur")
     */
    private $acteur;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\SecteurActeur", mappedBy="secteurActeurParent")
     */
    private $secteurActeurFils;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\SecteurActeur", inversedBy="secteurActeurFils")
     * @ORM\JoinColumn(name="SecteurParent", referencedColumnName="id")
     */
    private $secteurActeurParent;

    /**
     * @return mixed
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * @param mixed $acteur
     */
    public function setActeur($acteur)
    {
        $this->acteur = $acteur;
    }

    /**
     * @return mixed
     */
    public function getSecteurActeurFils()
    {
        return $this->secteurActeurFils;
    }

    /**
     * @param mixed $secteurActeurFils
     */
    public function setSecteurActeurFils($secteurActeurFils)
    {
        $this->secteurActeurFils = $secteurActeurFils;
    }

    /**
     * @return mixed
     */
    public function getSecteurActeurParent()
    {
        return $this->secteurActeurParent;
    }

    /**
     * @param mixed $secteurActeurParent
     */
    public function setSecteurActeurParent($secteurActeurParent)
    {
        $this->secteurActeurParent = $secteurActeurParent;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return SecteurActeur
     */
    public function setNom($nom)
    {
        $this->translate(null, false)->setNom($nom);
        
        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->translate(null, false)->getNom();
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->secteurActeurFils = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add acteur
     *
     * @param \GCF\MainBundle\Entity\Acteur $acteur
     *
     * @return SecteurActeur
     */
    public function addActeur(\GCF\MainBundle\Entity\Acteur $acteur)
    {
        $this->acteur[] = $acteur;

        return $this;
    }

    /**
     * Remove acteur
     *
     * @param \GCF\MainBundle\Entity\Acteur $acteur
     */
    public function removeActeur(\GCF\MainBundle\Entity\Acteur $acteur)
    {
        $this->acteur->removeElement($acteur);
    }

    /**
     * Add secteurActeurFil
     *
     * @param \GCF\MainBundle\Entity\SecteurActeur $secteurActeurFil
     *
     * @return SecteurActeur
     */
    public function addSecteurActeurFil(\GCF\MainBundle\Entity\SecteurActeur $secteurActeurFil)
    {
        $this->secteurActeurFils[] = $secteurActeurFil;

        return $this;
    }

    /**
     * Remove secteurActeurFil
     *
     * @param \GCF\MainBundle\Entity\SecteurActeur $secteurActeurFil
     */
    public function removeSecteurActeurFil(\GCF\MainBundle\Entity\SecteurActeur $secteurActeurFil)
    {
        $this->secteurActeurFils->removeElement($secteurActeurFil);
    }

    /**
    * @param string $locale
    */
    public function setLocale($locale)
    {
        $this->setCurrentLocale($locale);

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->getCurrentLocale();
    }
    
    public function __toString()
    {
        return (string)$this->translate(null, false)->getNom();
    }
}
