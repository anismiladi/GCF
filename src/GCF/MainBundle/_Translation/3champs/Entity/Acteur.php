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
     * @ORM\Column(name="descriptioFr", type="string", length=255)
     */
    private $descriptionFr;
    
        
    /**
     * @var string
     *
     * @ORM\Column(name="descriptionEn", type="string", length=255)
     */
    private $descriptionEn;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descriptionAr", type="string", length=255)
     */
    private $descriptionAr;

    /**
     * @var string
     *
     * @ORM\Column(name="hierarchie", type="string", length=255)
     */
    private $hierarchie;

    /**
     * @var string
     *
     * @ORM\Column(name="missionFr", type="text")
     */
    private $missionFr;
    
    /**
     * @var string
     *
     * @ORM\Column(name="missionEn", type="text")
     */
    private $missionEn;
    
    /**
     * @var string
     *
     * @ORM\Column(name="missionAr", type="text")
     */
    private $missionAr;
    
    /**
     * @var string
     *
     * @ORM\Column(name="responsableFr", type="string", length=255)
     */
    private $responsableFr;
    
    /**
     * @var string
     *
     * @ORM\Column(name="responsableEn", type="string", length=255)
     */
    private $responsableEn;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="responsableAr", type="string", length=255)
     */
    private $responsableAr;
    
    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="critiqueFr", type="text")
     */
    private $critiqueFr;

    
    /**
     * @var string
     *
     * @ORM\Column(name="critiqueEn", type="text")
     */
    private $critiqueEn;
    
    /**
     * @var string
     *
     * @ORM\Column(name="critiqueAr", type="text")
     */
    private $critiqueAr;
    
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

    /**
     * Set nomFr.
     *
     * @param string $nomFr
     *
     * @return Acteur
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
     * @return Acteur
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
     * @return Acteur
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

    /**
     * Set descriptionFr.
     *
     * @param string $descriptionFr
     *
     * @return Acteur
     */
    public function setDescriptionFr($descriptionFr)
    {
        $this->descriptionFr = $descriptionFr;

        return $this;
    }

    /**
     * Get descriptionFr.
     *
     * @return string
     */
    public function getDescriptionFr()
    {
        return $this->descriptionFr;
    }

    /**
     * Set descriptionEn.
     *
     * @param string $descriptionEn
     *
     * @return Acteur
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    /**
     * Get descriptionEn.
     *
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * Set descriptionAr.
     *
     * @param string $descriptionAr
     *
     * @return Acteur
     */
    public function setDescriptionAr($descriptionAr)
    {
        $this->descriptionAr = $descriptionAr;

        return $this;
    }

    /**
     * Get descriptionAr.
     *
     * @return string
     */
    public function getDescriptionAr()
    {
        return $this->descriptionAr;
    }

    /**
     * Set missionFr.
     *
     * @param string $missionFr
     *
     * @return Acteur
     */
    public function setMissionFr($missionFr)
    {
        $this->missionFr = $missionFr;

        return $this;
    }

    /**
     * Get missionFr.
     *
     * @return string
     */
    public function getMissionFr()
    {
        return $this->missionFr;
    }

    /**
     * Set missionEn.
     *
     * @param string $missionEn
     *
     * @return Acteur
     */
    public function setMissionEn($missionEn)
    {
        $this->missionEn = $missionEn;

        return $this;
    }

    /**
     * Get missionEn.
     *
     * @return string
     */
    public function getMissionEn()
    {
        return $this->missionEn;
    }

    /**
     * Set missionAr.
     *
     * @param string $missionAr
     *
     * @return Acteur
     */
    public function setMissionAr($missionAr)
    {
        $this->missionAr = $missionAr;

        return $this;
    }

    /**
     * Get missionAr.
     *
     * @return string
     */
    public function getMissionAr()
    {
        return $this->missionAr;
    }

    /**
     * Set responsableFr.
     *
     * @param string $responsableFr
     *
     * @return Acteur
     */
    public function setResponsableFr($responsableFr)
    {
        $this->responsableFr = $responsableFr;

        return $this;
    }

    /**
     * Get responsableFr.
     *
     * @return string
     */
    public function getResponsableFr()
    {
        return $this->responsableFr;
    }

    /**
     * Set responsableEn.
     *
     * @param string $responsableEn
     *
     * @return Acteur
     */
    public function setResponsableEn($responsableEn)
    {
        $this->responsableEn = $responsableEn;

        return $this;
    }

    /**
     * Get responsableEn.
     *
     * @return string
     */
    public function getResponsableEn()
    {
        return $this->responsableEn;
    }

    /**
     * Set responsableAr.
     *
     * @param string $responsableAr
     *
     * @return Acteur
     */
    public function setResponsableAr($responsableAr)
    {
        $this->responsableAr = $responsableAr;

        return $this;
    }

    /**
     * Get responsableAr.
     *
     * @return string
     */
    public function getResponsableAr()
    {
        return $this->responsableAr;
    }

    /**
     * Set critiqueFr.
     *
     * @param string $critiqueFr
     *
     * @return Acteur
     */
    public function setCritiqueFr($critiqueFr)
    {
        $this->critiqueFr = $critiqueFr;

        return $this;
    }

    /**
     * Get critiqueFr.
     *
     * @return string
     */
    public function getCritiqueFr()
    {
        return $this->critiqueFr;
    }

    /**
     * Set critiqueEn.
     *
     * @param string $critiqueEn
     *
     * @return Acteur
     */
    public function setCritiqueEn($critiqueEn)
    {
        $this->critiqueEn = $critiqueEn;

        return $this;
    }

    /**
     * Get critiqueEn.
     *
     * @return string
     */
    public function getCritiqueEn()
    {
        return $this->critiqueEn;
    }

    /**
     * Set critiqueAr.
     *
     * @param string $critiqueAr
     *
     * @return Acteur
     */
    public function setCritiqueAr($critiqueAr)
    {
        $this->critiqueAr = $critiqueAr;

        return $this;
    }

    /**
     * Get critiqueAr.
     *
     * @return string
     */
    public function getCritiqueAr()
    {
        return $this->critiqueAr;
    }
    
    public function __toString()
    {
        return $this->getNomFr();
    }
}
