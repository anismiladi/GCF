<?php

namespace GCF\MainBundle\Entity;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * EtatPub
 *
 * @ORM\Table(name="gcf_etat_pub")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\EtatPubRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\EtatPubTranslation")
 */
class EtatPub extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\EtatPubTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Acteur", mappedBy="etatPub")
     */
    private $acteur;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Projet", mappedBy="etatPub")
     */
    private $projet;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Publication", mappedBy="etatPub")
     */
    private $publication;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Event", mappedBy="etatPub")
     */
    private $event;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Elearning", mappedBy="etatPub")
     */
    private $elearning;

    /**
     * @return mixed
     */
    public function getActualities()
    {
        return $this->actualities;
    }

    /**
     * @param mixed $actualities
     */
    public function setActualities($actualities)
    {
        $this->actualities = $actualities;
    }

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Actualites", mappedBy="etatPub")
     */
    private $actualities;

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
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param mixed $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return mixed
     */
    public function getElearning()
    {
        return $this->elearning;
    }

    /**
     * @param mixed $elearning
     */
    public function setElearning($elearning)
    {
        $this->elearning = $elearning;
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
     * @return EtatPub
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
    
    public function __toString() {
        if ($this->getNom())
        {
            return $this->getNom();
        }
        else
            return "";
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projet = new \Doctrine\Common\Collections\ArrayCollection();
        $this->publication = new \Doctrine\Common\Collections\ArrayCollection();
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
        $this->elearning = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add acteur
     *
     * @param \GCF\MainBundle\Entity\Acteur $acteur
     *
     * @return EtatPub
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
     * Add projet
     *
     * @param \GCF\MainBundle\Entity\Projet $projet
     *
     * @return EtatPub
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
     * Add publication
     *
     * @param \GCF\MainBundle\Entity\Publication $publication
     *
     * @return EtatPub
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
     * Add event
     *
     * @param \GCF\MainBundle\Entity\Event $event
     *
     * @return EtatPub
     */
    public function addEvent(\GCF\MainBundle\Entity\Event $event)
    {
        $this->event[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \GCF\MainBundle\Entity\Event $event
     */
    public function removeEvent(\GCF\MainBundle\Entity\Event $event)
    {
        $this->event->removeElement($event);
    }

    /**
     * Add elearning
     *
     * @param \GCF\MainBundle\Entity\Elearning $elearning
     *
     * @return EtatPub
     */
    public function addElearning(\GCF\MainBundle\Entity\Elearning $elearning)
    {
        $this->elearning[] = $elearning;

        return $this;
    }

    /**
     * Remove elearning
     *
     * @param \GCF\MainBundle\Entity\Elearning $elearning
     */
    public function removeElearning(\GCF\MainBundle\Entity\Elearning $elearning)
    {
        $this->elearning->removeElement($elearning);
    }


    /**
     * Remove translation.
     *
     * @param \GCF\MainBundle\Entity\EtatPubTranslation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\GCF\MainBundle\Entity\EtatPubTranslation $translation)
    {
        return $this->translations->removeElement($translation);
    }

    /**
     * Add actuality.
     *
     * @param \GCF\MainBundle\Entity\Actualites $actuality
     *
     * @return EtatPub
     */
    public function addActuality(\GCF\MainBundle\Entity\Actualites $actuality)
    {
        $this->actualities[] = $actuality;

        return $this;
    }

    /**
     * Remove actuality.
     *
     * @param \GCF\MainBundle\Entity\Actualites $actuality
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeActuality(\GCF\MainBundle\Entity\Actualites $actuality)
    {
        return $this->actualities->removeElement($actuality);
    }
}
