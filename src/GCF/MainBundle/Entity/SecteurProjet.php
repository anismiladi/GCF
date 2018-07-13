<?php

namespace GCF\MainBundle\Entity;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SecteurProjet
 *
 * @ORM\Table(name="gcf_secteur_projet")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\SecteurProjetRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\SecteurProjetTranslation")
 */
class SecteurProjet extends AbstractPersonalTranslatable implements TranslatableInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="text", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="Projet", mappedBy="secteurProjet")
     */
    private $projet;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\SecteurProjet", mappedBy="secteurProjetParent")
     */
    private $secteurProjetFils;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\SecteurProjet", inversedBy="secteurProjetFils")
     * @ORM\JoinColumn(name="SecteurParent", referencedColumnName="id", nullable=true)
     */
    private $secteurProjetParent;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\SecteurProjetTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;
    
    /**
     * @return mixed
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * @param mixed $projet
     */
    public function setProjet($projet)
    {
        $this->projet = $projet;
    }

    /**
     * @return mixed
     */
    public function getSecteurProjetFils()
    {
        return $this->secteurProjetFils;
    }

    /**
     * @param mixed $secteurProjetFils
     */
    public function setSecteurProjetFils($secteurProjetFils)
    {
        $this->secteurProjetFils = $secteurProjetFils;
    }

    /**
     * @return mixed
     */
    public function getSecteurProjetParent()
    {
        return $this->secteurProjetParent;
    }

    /**
     * @param mixed $secteurProjetParent
     */
    public function setSecteurProjetParent($secteurProjetParent)
    {
        $this->secteurProjetParent = $secteurProjetParent;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return SecteurProjet
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

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return SecteurProjet
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projet = new \Doctrine\Common\Collections\ArrayCollection();
        $this->secteurProjetFils = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projet
     *
     * @param \GCF\MainBundle\Entity\Projet $projet
     *
     * @return SecteurProjet
     */
    public function addProjet(\GCF\MainBundle\Entity\Projet $projet)
    {
        $this->projet[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \GCF\MainBundle\Entity\Projet $projet
     */
    public function removeProjet(\GCF\MainBundle\Entity\Projet $projet)
    {
        $this->projet->removeElement($projet);
    }

    /**
     * Add secteurProjetFil
     *
     * @param \GCF\MainBundle\Entity\SecteurProjet $secteurProjetFil
     *
     * @return SecteurProjet
     */
    public function addSecteurProjetFil(\GCF\MainBundle\Entity\SecteurProjet $secteurProjetFil)
    {
        $this->secteurProjetFils[] = $secteurProjetFil;

        return $this;
    }

    /**
     * Remove secteurProjetFil
     *
     * @param \GCF\MainBundle\Entity\SecteurProjet $secteurProjetFil
     */
    public function removeSecteurProjetFil(\GCF\MainBundle\Entity\SecteurProjet $secteurProjetFil)
    {
        $this->secteurProjetFils->removeElement($secteurProjetFil);
    }
    
    public function __toString() {
        if ($this->getNom())
        {
            return $this->getNom();
        }
        else
            return "";
    }

    /**
     * Remove translation.
     *
     * @param \GCF\MainBundle\Entity\SecteurProjetTranslation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\GCF\MainBundle\Entity\SecteurProjetTranslation $translation)
    {
        return $this->translations->removeElement($translation);
    }

    /**
     * Set logo.
     *
     * @param string|null $logo
     *
     * @return SecteurProjet
     */
    public function setLogo($logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo.
     *
     * @return string|null
     */
    public function getLogo()
    {
        return $this->logo;
    }
}
