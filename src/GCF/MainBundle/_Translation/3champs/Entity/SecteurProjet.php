<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecteurProjet
 *
 * @ORM\Table(name="secteur_projet")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\SecteurProjetRepository")
 */
class SecteurProjet
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
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255)
     */
    private $couleur;

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
     * @ORM\JoinColumn(name="SecteurParent", referencedColumnName="id")
     */
    private $secteurProjetParent;

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

    /**
     * Set nomFr.
     *
     * @param string $nomFr
     *
     * @return SecteurProjet
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
     * @return SecteurProjet
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
     * @return SecteurProjet
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
