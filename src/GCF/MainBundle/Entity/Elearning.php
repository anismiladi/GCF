<?php

namespace GCF\MainBundle\Entity;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Elearning
 *
 * @ORM\Table(name="elearning")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\ElearningRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\ElearningTranslation")
 */
class Elearning extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @ORM\ManyToMany(targetEntity="GCF\MainBundle\Entity\Keyword", mappedBy="elearning")
     */
    private $keyword;
    
    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="text", length=255, nullable=true)
     */
    private $youtube;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="fichier", type="text", length=255, nullable=true)
     */
    private $fichier;
    
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="text", length=255, nullable=true)
     */
    private $image;
    
    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\CatLearning", inversedBy="elearning")
     * @ORM\JoinColumn(name="categorie", referencedColumnName="id")
     */
    private $catLearning;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\EtatPub", inversedBy="elearning")
     * @ORM\JoinColumn(name="etat", referencedColumnName="id",nullable=false)
     */
    private $etatPub;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\ElearningTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;
    
    /**
     * @return mixed
     */
    public function getCatLearning()
    {
        return $this->catLearning;
    }

    /**
     * @param mixed $catLearning
     */
    public function setCatLearning($catLearning)
    {
        $this->catLearning = $catLearning;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Elearning
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
     * @return Elearning
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
     * Set lien
     *
     * @param string $lien
     *
     * @return Elearning
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Remove translation.
     *
     * @param \GCF\MainBundle\Entity\ElearningTranslation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\GCF\MainBundle\Entity\ElearningTranslation $translation)
    {
        return $this->translations->removeElement($translation);
    }
    
        
    /**
     * Set fichier
     *
     * @param string $fichier
     *
     * @return Elearning
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
    
        
    /**
     * Set youtube
     *
     * @param string $youtube
     *
     * @return Elearning
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get youtube
     *
     * @return string
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Add keyword.
     *
     * @param \GCF\MainBundle\Entity\Keyword $keyword
     *
     * @return Elearning
     */
    public function addKeyword(\GCF\MainBundle\Entity\Keyword $keyword)
    {
        $keyword->addElearning($this);
        $this->keyword[] = $keyword;

        return $this;
    }

    /**
     * Remove keyword.
     *
     * @param \GCF\MainBundle\Entity\Keyword $keyword
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeKeyword(\GCF\MainBundle\Entity\Keyword $keyword)
    {
        $keyword->removeElearning($this);
        return $this->keyword->removeElement($keyword);
    }

    /**
     * Get keyword.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set image.
     *
     * @param string|null $image
     *
     * @return Elearning
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }
}
