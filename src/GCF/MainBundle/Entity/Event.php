<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\EventRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\EventTranslation")
 */
class Event extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="lienFB", type="string", length=255)
     */
    private $lienFB;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_couverture", type="text", length=255, nullable=true)
     */
    private $photoCouverture;
    
    /**
     * @var string
     *
     * @ORM\Column(name="photo_affiche", type="text", length=255, nullable=true)
     */
    private $photoAffiche;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lienAutre", type="string", length=255)
     */
    private $lienAutre;

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
     * @Gedmo\Translatable
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\EtatPub", inversedBy="event")
     * @ORM\JoinColumn(name="etat", referencedColumnName="id",nullable=false)
     */
    private $etatPub;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\EventTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

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
     * Remove translation.
     *
     * @param \GCF\MainBundle\Entity\EventTranslation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\GCF\MainBundle\Entity\EventTranslation $translation)
    {
        return $this->translations->removeElement($translation);
    }

    /**
     * Set photoCouverture.
     *
     * @param string|null $photoCouverture
     *
     * @return Event
     */
    public function setPhotoCouverture($photoCouverture = null)
    {
        $this->photoCouverture = $photoCouverture;

        return $this;
    }

    /**
     * Get photoCouverture.
     *
     * @return string|null
     */
    public function getPhotoCouverture()
    {
        return $this->photoCouverture;
    }

    /**
     * Set photoAffiche.
     *
     * @param string|null $photoAffiche
     *
     * @return Event
     */
    public function setPhotoAffiche($photoAffiche = null)
    {
        $this->photoAffiche = $photoAffiche;

        return $this;
    }

    /**
     * Get photoAffiche.
     *
     * @return string|null
     */
    public function getPhotoAffiche()
    {
        return $this->photoAffiche;
    }
}
