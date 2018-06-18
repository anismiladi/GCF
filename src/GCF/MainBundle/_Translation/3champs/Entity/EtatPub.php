<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtatPub
 *
 * @ORM\Table(name="etat_pub")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\EtatPubRepository")
 */
class EtatPub
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
     * @ORM\Column(name="nomFr", type="string", length=255)
     */
    private $nomFr;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEn", type="string", length=255)
     */
    private $nomEn;

    /**
     * @var string
     *
     * @ORM\Column(name="nomAr", type="string", length=255)
     */
    private $nomAr;

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
     * Set nomFr.
     *
     * @param string $nomFr
     *
     * @return EtatPub
     */
    public function setNomFr($nomFr)
    {
        $this->nomFr = $nomFr;

        return $this;
    }

    /**
     * Get nomFr.
     *
     * @return string
     */
    public function getNomFr()
    {
        return $this->nomFr;
    }

    /**
     * Set nomEn.
     *
     * @param string $nomEn
     *
     * @return EtatPub
     */
    public function setNomEn($nomEn)
    {
        $this->nomEn = $nomEn;

        return $this;
    }

    /**
     * Get nomEn.
     *
     * @return string
     */
    public function getNomEn()
    {
        return $this->nomEn;
    }

    /**
     * Set nomAr.
     *
     * @param string $nomAr
     *
     * @return EtatPub
     */
    public function setNomAr($nomAr)
    {
        $this->nomAr = $nomAr;

        return $this;
    }

    /**
     * Get nomAr.
     *
     * @return string
     */
    public function getNomAr()
    {
        return $this->nomAr;
    }
}
