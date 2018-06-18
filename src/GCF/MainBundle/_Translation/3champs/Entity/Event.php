<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(name="descriptionFr", type="text")
     */
    private $descriptionFr;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionEn", type="text")
     */
    private $descriptionEn;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionAr", type="text")
     */
    private $descriptionAr;

    /**
     * @var string
     *
     * @ORM\Column(name="lienFB", type="string", length=255)
     */
    private $lienFB;

    /**
     * @var string
     *
     * @ORM\Column(name="lienAutre", type="string", length=255)
     */
    private $lienAutre;

    /**
     * @var string
     *
     * @ORM\Column(name="photoCouverture", type="string", length=255)
     */
    private $photoCouverture;

    /**
     * @var string
     *
     * @ORM\Column(name="photoAffiche", type="string", length=255)
     */
    private $photoAffiche;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut", type="datetime")
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="datetime")
     */
    private $fin;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\EtatPub", inversedBy="event")
     * @ORM\JoinColumn(name="etat", referencedColumnName="id")
     */
    private $etatPub;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Event
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
     * @return Event
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
     * Set lienFB
     *
     * @param string $lienFB
     *
     * @return Event
     */
    public function setLienFB($lienFB)
    {
        $this->lienFB = $lienFB;

        return $this;
    }

    /**
     * Get lienFB
     *
     * @return string
     */
    public function getLienFB()
    {
        return $this->lienFB;
    }

    /**
     * Set lienAutre
     *
     * @param string $lienAutre
     *
     * @return Event
     */
    public function setLienAutre($lienAutre)
    {
        $this->lienAutre = $lienAutre;

        return $this;
    }

    /**
     * Get lienAutre
     *
     * @return string
     */
    public function getLienAutre()
    {
        return $this->lienAutre;
    }

    /**
     * Set photoCouverture
     *
     * @param string $photoCouverture
     *
     * @return Event
     */
    public function setPhotoCouverture($photoCouverture)
    {
        $this->photoCouverture = $photoCouverture;

        return $this;
    }

    /**
     * Get photoCouverture
     *
     * @return string
     */
    public function getPhotoCouverture()
    {
        return $this->photoCouverture;
    }

    /**
     * Set photoAffiche
     *
     * @param string $photoAffiche
     *
     * @return Event
     */
    public function setPhotoAffiche($photoAffiche)
    {
        $this->photoAffiche = $photoAffiche;

        return $this;
    }

    /**
     * Get photoAffiche
     *
     * @return string
     */
    public function getPhotoAffiche()
    {
        return $this->photoAffiche;
    }

    /**
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return Event
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Event
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Event
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set nomFr.
     *
     * @param string $nomFr
     *
     * @return Event
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
     * @return Event
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
     * @return Event
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
     * @return Event
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
     * @return Event
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
     * @return Event
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
}
