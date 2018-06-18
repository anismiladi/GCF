<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acteur
 *
 * @ORM\Table(name="acteur")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\ActeurRepository")
 */
class Acteur
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
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="hierarchie", type="string", length=255)
     */
    private $hierarchie;

    /**
     * @var string
     *
     * @ORM\Column(name="mission", type="text")
     */
    private $mission;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=255)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="critique", type="text")
     */
    private $critique;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Acteur", mappedBy="acteurParent")
     */
    private $acteurFils;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Projet", mappedBy="acteur")
     */
    private $projet;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\Acteur", inversedBy="acteurFils")
     * @ORM\JoinColumn(name="ActeurParent", referencedColumnName="id")
     */
    private $acteurParent;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\SecteurActeur", inversedBy="acteur")
     * @ORM\JoinColumn(name="secteur", referencedColumnName="id")
     */
    private $secteurActeur;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\EtatPub", inversedBy="acteur")
     * @ORM\JoinColumn(name="etat", referencedColumnName="id")
     */
    private $etatPub;

    /**
     * @return mixed
     */
    public function getActeurFils()
    {
        return $this->acteurFils;
    }

    /**
     * @param mixed $acteurFils
     */
    public function setActeurFils($acteurFils)
    {
        $this->acteurFils = $acteurFils;
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
    public function getActeurParent()
    {
        return $this->acteurParent;
    }

    /**
     * @param mixed $acteurParent
     */
    public function setActeurParent($acteurParent)
    {
        $this->acteurParent = $acteurParent;
    }

    /**
     * @return mixed
     */
    public function getSecteurActeur()
    {
        return $this->secteurActeur;
    }

    /**
     * @param mixed $secteurActeur
     */
    public function setSecteurActeur($secteurActeur)
    {
        $this->secteurActeur = $secteurActeur;
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Acteur
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Acteur
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
     * Set description
     *
     * @param string $description
     *
     * @return Acteur
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set hierarchie
     *
     * @param string $hierarchie
     *
     * @return Acteur
     */
    public function setHierarchie($hierarchie)
    {
        $this->hierarchie = $hierarchie;

        return $this;
    }

    /**
     * Get hierarchie
     *
     * @return string
     */
    public function getHierarchie()
    {
        return $this->hierarchie;
    }

    /**
     * Set mission
     *
     * @param string $mission
     *
     * @return Acteur
     */
    public function setMission($mission)
    {
        $this->mission = $mission;

        return $this;
    }

    /**
     * Get mission
     *
     * @return string
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     *
     * @return Acteur
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return Acteur
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set critique
     *
     * @param string $critique
     *
     * @return Acteur
     */
    public function setCritique($critique)
    {
        $this->critique = $critique;

        return $this;
    }

    /**
     * Get critique
     *
     * @return string
     */
    public function getCritique()
    {
        return $this->critique;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteurFils = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projet = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add acteurFil
     *
     * @param \GCF\MainBundle\Entity\Acteur $acteurFil
     *
     * @return Acteur
     */
    public function addActeurFil(\GCF\MainBundle\Entity\Acteur $acteurFil)
    {
        $this->acteurFils[] = $acteurFil;

        return $this;
    }

    /**
     * Remove acteurFil
     *
     * @param \GCF\MainBundle\Entity\Acteur $acteurFil
     */
    public function removeActeurFil(\GCF\MainBundle\Entity\Acteur $acteurFil)
    {
        $this->acteurFils->removeElement($acteurFil);
    }

    /**
     * Add projet
     *
     * @param \GCF\MainBundle\Entity\Projet $projet
     *
     * @return Acteur
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
}
