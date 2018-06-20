<?php

namespace GCF\MainBundle\Entity;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\ProjetRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\ProjetTranslation")
 */
class Projet extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @Gedmo\Translatable
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="text", length=255, nullable=true)
     */
    private $fichier;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\ProjetTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;
    
    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Publication", mappedBy="projet")
     */
    private $publication;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\Acteur", inversedBy="projet")
     * @ORM\JoinColumn(name="acteur", referencedColumnName="id", nullable=true)
     */
    private $acteur;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\SecteurProjet", inversedBy="projet")
     * @ORM\JoinColumn(name="secteur", referencedColumnName="id")
     */
    private $secteurProjet;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\EtatPub", inversedBy="projet")
     * @ORM\JoinColumn(name="etat", referencedColumnName="id")
     */
    private $etatPub;

    /**
     * @ORM\ManyToMany(targetEntity="GCF\MainBundle\Entity\Gouvernorat", mappedBy="projet")
     */
    private $gouvernorat;

    /**
     * @ORM\ManyToMany(targetEntity="GCF\MainBundle\Entity\Focus", mappedBy="projet")
     */
    private $focus;

    /**
     * @return mixed
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * @param mixed $publication
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;
    }

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
    public function getSecteurProjet()
    {
        return $this->secteurProjet;
    }

    /**
     * @param mixed $secteurProjet
     */
    public function setSecteurProjet($secteurProjet)
    {
        $this->secteurProjet = $secteurProjet;
    }

    /**
     * @return mixed
     */
    public function getEtatPub()
    {
        return $this->etatPub;
    }

    /**
     * @param mixed $etatPub
     */
    public function setEtatPub($etatPub)
    {
        $this->etatPub = $etatPub;
    }

    /**
     * @return mixed
     */
    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    /**
     * @param mixed $gouvernorat
     */
    public function setGouvernorat($gouvernorat)
    {
        $this->gouvernorat = $gouvernorat;
    }

    /**
     * @return mixed
     */
    public function getFocus()
    {
        return $this->focus;
    }

    /**
     * @param mixed $focus
     */
    public function setFocus($focus)
    {
        $this->focus = $focus;
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
     * @return Projet
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
     * Constructor
     */
    public function __construct()
    {
        $this->publication = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gouvernorat = new \Doctrine\Common\Collections\ArrayCollection();
        $this->focus = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add publication
     *
     * @param \GCF\MainBundle\Entity\Publication $publication
     *
     * @return Projet
     */
    public function addPublication(\GCF\MainBundle\Entity\Publication $publication)
    {
        $this->publication[] = $publication;

        return $this;
    }

    /**
     * Remove publication
     *
     * @param \GCF\MainBundle\Entity\Publication $publication
     */
    public function removePublication(\GCF\MainBundle\Entity\Publication $publication)
    {
        $this->publication->removeElement($publication);
    }

    /**
     * Add gouvernorat
     *
     * @param \GCF\MainBundle\Entity\Gouvernorat $gouvernorat
     *
     * @return Projet
     */
    public function addGouvernorat(\GCF\MainBundle\Entity\Gouvernorat $gouvernorat)
    {
        //echo "addGouvernorat";
        $gouvernorat->addProjet($this);
        $this->gouvernorat[] = $gouvernorat;

        return $this;
    }

    /**
     * Remove gouvernorat
     *
     * @param \GCF\MainBundle\Entity\Gouvernorat $gouvernorat
     */
    public function removeGouvernorat(\GCF\MainBundle\Entity\Gouvernorat $gouvernorat)
    {
        //echo "removeGouvernorat";
        $gouvernorat->removeProjet($this);
        $this->gouvernorat->removeElement($gouvernorat);
    }

    /**
     * Add focus
     *
     * @param \GCF\MainBundle\Entity\Focus $focus
     *
     * @return Projet
     */
    public function addFocus(\GCF\MainBundle\Entity\Focus $focus)
    {
        //echo "addFocus";
        $focus->addProjet($this);
        $this->focus[] = $focus;

        return $this;
    }

    /**
     * Remove focus
     *
     * @param \GCF\MainBundle\Entity\Focus $focus
     */
    public function removeFocus(\GCF\MainBundle\Entity\Focus $focus)
    {
        //echo "removeFocus";
        $focus->removeProjet($this);
        $this->focus->removeElement($focus);
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Projet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Remove translation.
     *
     * @param \GCF\MainBundle\Entity\ProjetTranslation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\GCF\MainBundle\Entity\ProjetTranslation $translation)
    {
        return $this->translations->removeElement($translation);
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        if($this->getNom())
            return $this->getNom();
        else
            return "";
    }
    
    
    /**
     * Set fichier
     *
     * @param string $fichier
     *
     * @return Projet
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return string
     */
    public function getFichier()
    {
        return $this->fichier;
    }
}
