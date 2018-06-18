<?php

namespace GCF\MainBundle\Entity;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CatLearning
 *
 * @ORM\Table(name="cat_learning")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\CatLearningRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\CatLearningTranslation")
 */
class CatLearning extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Elearning", mappedBy="catLearning")
     */
    private $elearning;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\CatLearning", mappedBy="catLearningParent")
     */
    private $catLearningFils;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\CatLearning", inversedBy="catLearningFils")
     * @ORM\JoinColumn(name="CatParent", referencedColumnName="id", nullable=true)
     */
    private $catLearningParent;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\CatLearningTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;
    
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
     * @return mixed
     */
    public function getCatLearningFils()
    {
        return $this->catLearningFils;
    }

    /**
     * @param mixed $catLearningFils
     */
    public function setCatLearningFils($catLearningFils)
    {
        $this->catLearningFils = $catLearningFils;
    }

    /**
     * @return mixed
     */
    public function getCatLearningParent()
    {
        return $this->catLearningParent;
    }

    /**
     * @param mixed $catLearningParent
     */
    public function setCatLearningParent($catLearningParent)
    {
        $this->catLearningParent = $catLearningParent;
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
     * @return CatLearning
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
        $this->elearning = new \Doctrine\Common\Collections\ArrayCollection();
        $this->catLearningFils = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add elearning
     *
     * @param \GCF\MainBundle\Entity\Elearning $elearning
     *
     * @return CatLearning
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
     * Add catLearningFil
     *
     * @param \GCF\MainBundle\Entity\CatLearning $catLearningFil
     *
     * @return CatLearning
     */
    public function addCatLearningFil(\GCF\MainBundle\Entity\CatLearning $catLearningFil)
    {
        $this->catLearningFils[] = $catLearningFil;

        return $this;
    }

    /**
     * Remove catLearningFil
     *
     * @param \GCF\MainBundle\Entity\CatLearning $catLearningFil
     */
    public function removeCatLearningFil(\GCF\MainBundle\Entity\CatLearning $catLearningFil)
    {
        $this->catLearningFils->removeElement($catLearningFil);
    }
    
    public function __toString() {
        if ($this->getNom())
        {
          return $this->getNom();
        }
        else
            return "";
    }
}
