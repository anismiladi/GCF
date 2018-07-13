<?php

namespace GCF\MainBundle\Entity;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Gouvernorat
 *
 * @ORM\Table(name="gcf_gouvernorat")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\GouvernoratRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\GouvernoratTranslation")
 */
class Gouvernorat extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @var int
     *
     * @ORM\Column(name="idmap", type="integer")
     * *
     */
    private $idmap;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="GCF\MainBundle\Entity\Projet", inversedBy="gouvernorat", cascade={"persist", "remove"})
     * @ORM\JoinTable(
     *     name="gcf_gouverprojet",
     *     joinColumns={@ORM\JoinColumn(name="gouvernorat", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="projet", referencedColumnName="id", nullable=false)}
     * )
     */
    private $projet;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\GouvernoratTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getIdmap()
    {
        return $this->idmap;
    }
    
    /**
     * Set idmap
     *
     * @param int $idmap
     *
     * @return Gouvernorat
     */
    public function setIdmap($idmap)
    {
        $this->idmap = $idmap;

        return $this;
    }
    
    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Gouvernorat
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
        $this->projet = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projet
     *
     * @param \GCF\MainBundle\Entity\Projet $projet
     *
     * @return Gouvernorat
     */
    public function addProjet(\GCF\MainBundle\Entity\Projet $projet)
    {
        //$projet->setGouvernorat($this);
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

    public function __toString() {
        if ($this->getNom())
        {
            return $this->getNom();
        }
        else
            return "";
    }

    /**
     * Remove translation.
     *
     * @param \GCF\MainBundle\Entity\GouvernoratTranslation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\GCF\MainBundle\Entity\GouvernoratTranslation $translation)
    {
        return $this->translations->removeElement($translation);
    }
}
