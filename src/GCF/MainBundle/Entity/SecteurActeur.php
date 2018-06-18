<?php

namespace GCF\MainBundle\Entity;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SecteurActeur
 *
 * @ORM\Table(name="secteur_acteur")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\SecteurActeurRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\SecteurActeurTranslation")
 */
class SecteurActeur extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Acteur", mappedBy="secteurActeur")
     */
    private $acteur;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\SecteurActeur", mappedBy="secteurActeurParent")
     */
    private $secteurActeurFils;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\SecteurActeur", inversedBy="secteurActeurFils")
     * @ORM\JoinColumn(name="SecteurParent", referencedColumnName="id", nullable=true)
     */
    private $secteurActeurParent;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\SecteurActeurTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;
    
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
    public function getSecteurActeurFils()
    {
        return $this->secteurActeurFils;
    }

    /**
     * @param mixed $secteurActeurFils
     */
    public function setSecteurActeurFils($secteurActeurFils)
    {
        $this->secteurActeurFils = $secteurActeurFils;
    }

    /**
     * @return mixed
     */
    public function getSecteurActeurParent()
    {
        return $this->secteurActeurParent;
    }

    /**
     * @param mixed $secteurActeurParent
     */
    public function setSecteurActeurParent($secteurActeurParent)
    {
        $this->secteurActeurParent = $secteurActeurParent;
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
     * @return SecteurActeur
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
        $this->acteur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->secteurActeurFils = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add acteur
     *
     * @param \GCF\MainBundle\Entity\Acteur $acteur
     *
     * @return SecteurActeur
     */
    public function addActeur(\GCF\MainBundle\Entity\Acteur $acteur)
    {
        $this->acteur[] = $acteur;

        return $this;
    }

    /**
     * Remove acteur
     *
     * @param \GCF\MainBundle\Entity\Acteur $acteur
     */
    public function removeActeur(\GCF\MainBundle\Entity\Acteur $acteur)
    {
        $this->acteur->removeElement($acteur);
    }

    /**
     * Add secteurActeurFil
     *
     * @param \GCF\MainBundle\Entity\SecteurActeur $secteurActeurFil
     *
     * @return SecteurActeur
     */
    public function addSecteurActeurFil(\GCF\MainBundle\Entity\SecteurActeur $secteurActeurFil)
    {
        $this->secteurActeurFils[] = $secteurActeurFil;

        return $this;
    }

    /**
     * Remove secteurActeurFil
     *
     * @param \GCF\MainBundle\Entity\SecteurActeur $secteurActeurFil
     */
    public function removeSecteurActeurFil(\GCF\MainBundle\Entity\SecteurActeur $secteurActeurFil)
    {
        $this->secteurActeurFils->removeElement($secteurActeurFil);
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
