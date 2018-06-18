<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\ProjetRepository")
 */
class Projet
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
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Publication", mappedBy="projet")
     */
    private $publication;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\Acteur", inversedBy="projet")
     * @ORM\JoinColumn(name="acteur", referencedColumnName="id")
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
        $this->focus->removeElement($focus);
    }

    /**
     * Set nomFr.
     *
     * @param string $nomFr
     *
     * @return Projet
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
     * @return Projet
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
     * @return Projet
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
    
    public function __toString()
    {
        return $this->getNomFr();
    }
}
