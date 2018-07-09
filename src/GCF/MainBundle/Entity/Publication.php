<?php

namespace GCF\MainBundle\Entity;
use GCF\MainBundle\Repository\EtatPubRepository;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\PublicationRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\PublicationTranslation")
 */
class Publication extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="featuredImage", type="string", length=255, nullable=true)
     */
    private $featuredImage;
    
    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="contenu", type="text", nullable=false)
     */
    private $contenu;

    /**
     * @ORM\ManyToMany(targetEntity="GCF\MainBundle\Entity\Keyword", mappedBy="publication")
     */
    private $keyword;
    
    /**
     * @var string
     *
     * @ORM\Column(name="emailBloggeur", type="string", length=255, nullable=true)
     */
    private $emailBloggeur;

    /**
     * @var string
     *
     * @ORM\Column(name="nomBloggeur", type="string", length=255, nullable=true)
     */
    private $nomBloggeur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomBloggeur", type="string", length=255, nullable=true)
     */
    private $prenomBloggeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return string
     */
    public function getNomBloggeur()
    {
        return $this->nomBloggeur;
    }

    /**
     * @param string $nomBloggeur
     */
    public function setNomBloggeur($nomBloggeur)
    {
        $this->nomBloggeur = $nomBloggeur;
    }

    /**
     * @return string
     */
    public function getPrenomBloggeur()
    {
        return $this->prenomBloggeur;
    }

    /**
     * @param string $prenomBloggeur
     */
    public function setPrenomBloggeur($prenomBloggeur)
    {
        $this->prenomBloggeur = $prenomBloggeur;
    }
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\PublicationTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;
    
    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\Projet", inversedBy="publication")
     * @ORM\JoinColumn(name="projet", referencedColumnName="id", nullable=true)
     */
    private $projet;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\EtatPub", inversedBy="publication")
     * @ORM\JoinColumn(name="etat", referencedColumnName="id", nullable=false)
     */
    private $etatPub;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\CatPublication" )
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     */
    private $categorie;



    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Publication
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Publication
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set emailBloggeur
     *
     * @param string $emailBloggeur
     *
     * @return Publication
     */
    public function setEmailBloggeur($emailBloggeur)
    {
        $this->emailBloggeur = $emailBloggeur;

        return $this;
    }

    /**
     * Get emailBloggeur
     *
     * @return string
     */
    public function getEmailBloggeur()
    {
        return $this->emailBloggeur;
    }

    /**
     * Remove translation.
     *
     * @param \GCF\MainBundle\Entity\PublicationTranslation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\GCF\MainBundle\Entity\PublicationTranslation $translation)
    {
        return $this->translations->removeElement($translation);
    }

    /**
     * Set featuredImage.
     *
     * @param string|null $featuredImage
     *
     * @return Publication
     */
    public function setFeaturedImage($featuredImage = null)
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }

    /**
     * Get featuredImage.
     *
     * @return string|null
     */
    public function getFeaturedImage()
    {
        return $this->featuredImage;
    }

    /**
     * Add keyword.
     *
     * @param \GCF\MainBundle\Entity\Keyword $keyword
     *
     * @return Publication
     */
    public function addKeyword(\GCF\MainBundle\Entity\Keyword $keyword)
    {
        $keyword->addPublication($this);
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
        $keyword->removePublication($this);
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

}
