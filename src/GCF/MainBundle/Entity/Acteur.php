<?php

namespace GCF\MainBundle\Entity;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use JsonSerializable;

/**
 * Acteur
 *
 * @ORM\Table(name="gcf_acteur")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\ActeurRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\ActeurTranslation")
 */
class Acteur extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @ORM\Column(name="logo", type="text", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="nomcomplet", type="string", length=255)
     */
    private $nomcomplet;

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
     * @ORM\Column(name="hierarchie", type="text", nullable=true)
     */
    private $hierarchie;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="mission", type="text", nullable=true)
     */
    private $mission;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="responsable", type="string", length=255, nullable=true)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="emailresponsable", type="string", length=255, nullable=true)
     */
    private $emailresponsable;
    
    /**
     * @var string
     *
     * @ORM\Column(name="telresponsable", type="string", length=255, nullable=true)
     */
    private $telresponsable;
    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255, nullable=true)
     */
    private $contact;
    
    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="adresse", type="text", nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="siteweb", type="string", length=255, nullable=true)
     */
    private $siteweb;
    
    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="critique", type="text", nullable=true)
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
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\ActeurTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

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
     * Set nomcomplet.
     *
     * @param string $nomcomplet
     *
     * @return Acteur
     */
    public function setNomcomplet($nomcomplet)
    {
        $this->nomcomplet = $nomcomplet;

        return $this;
    }

    /**
     * Get nomcomplet.
     *
     * @return string
     */
    public function getNomcomplet()
    {
        return $this->nomcomplet;
    }

    /**
     * Remove translation.
     *
     * @param \GCF\MainBundle\Entity\ActeurTranslation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\GCF\MainBundle\Entity\ActeurTranslation $translation)
    {
        return $this->translations->removeElement($translation);
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
     * Set adresse.
     *
     * @param string|null $adresse
     *
     * @return Acteur
     */
    public function setAdresse($adresse = null)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse.
     *
     * @return string|null
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set tel.
     *
     * @param string|null $tel
     *
     * @return Acteur
     */
    public function setTel($tel = null)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel.
     *
     * @return string|null
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set fax.
     *
     * @param string|null $fax
     *
     * @return Acteur
     */
    public function setFax($fax = null)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax.
     *
     * @return string|null
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set siteweb.
     *
     * @param string|null $siteweb
     *
     * @return Acteur
     */
    public function setSiteweb($siteweb = null)
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    /**
     * Get siteweb.
     *
     * @return string|null
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * Set emailresponsable.
     *
     * @param string|null $emailresponsable
     *
     * @return Acteur
     */
    public function setEmailresponsable($emailresponsable = null)
    {
        $this->emailresponsable = $emailresponsable;

        return $this;
    }

    /**
     * Get emailresponsable.
     *
     * @return string|null
     */
    public function getEmailresponsable()
    {
        return $this->emailresponsable;
    }

    /**
     * Set telresponsable.
     *
     * @param string|null $telresponsable
     *
     * @return Acteur
     */
    public function setTelresponsable($telresponsable = null)
    {
        $this->telresponsable = $telresponsable;

        return $this;
    }

    /**
     * Get telresponsable.
     *
     * @return string|null
     */
    public function getTelresponsable()
    {
        return $this->telresponsable;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Acteur
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    public function jsonSerialize()
    {
        
        return array(
            'id' => $this->id,
            'logo' => $this->logo,
            'nom' => $this->nom,
            'nomcomplet' => $this->nomcomplet,
            'description' => $this->description,
            'hierarchie' => $this->hierarchie,
            'mission' => $this->mission,
            'responsable' => $this->responsable,
            'emailresponsable' => $this->emailresponsable,
            'telresponsable' => $this->telresponsable,
            'contact' => $this->contact,
            'adresse' => $this->adresse,
            'email' => $this->email,
            'tel' => $this->tel,
            'fax' => $this->fax,
            'siteweb' => $this->siteweb,
            'acteurFils' => $this->acteurFils,
            'projet' => $this->projet,
            'acteurParent' => $this->acteurParent,
        );
    }
}
