<?php

namespace GCF\MainBundle\Entity;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Keyword
 *
 * @ORM\Table(name="gcf_keyword")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\KeywordRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\KeywordTranslation")
 */
class Keyword extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @ORM\Column(name="label", type="string", length=255)
     */
    private $label;

    /**
     * @ORM\ManyToMany(targetEntity="GCF\MainBundle\Entity\Projet", inversedBy="keyword", cascade={"persist", "remove"})
     * @ORM\JoinTable(
     *     name="gcf_keywordprojet",
     *     joinColumns={@ORM\JoinColumn(name="keyword", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="projet", referencedColumnName="id", nullable=false)}
     * )
     */
    private $projet;

    /**
     * @ORM\ManyToMany(targetEntity="GCF\MainBundle\Entity\Publication", inversedBy="keyword", cascade={"persist", "remove"})
     * @ORM\JoinTable(
     *     name="gcf_keywordpublication",
     *     joinColumns={@ORM\JoinColumn(name="keyword", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="publication", referencedColumnName="id", nullable=false)}
     * )
     */
    private $publication;

    /**
     * @ORM\ManyToMany(targetEntity="GCF\MainBundle\Entity\Elearning", inversedBy="keyword", cascade={"persist", "remove"})
     * @ORM\JoinTable(
     *     name="gcf_keywordelearning",
     *     joinColumns={@ORM\JoinColumn(name="keyword", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="elearning", referencedColumnName="id", nullable=false)}
     * )
     */
    private $elearning;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\KeywordTranslation",
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
     * Set label.
     *
     * @param string $label
     *
     * @return Keyword
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Remove translation.
     *
     * @param \GCF\MainBundle\Entity\KeywordTranslation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\GCF\MainBundle\Entity\KeywordTranslation $translation)
    {
        return $this->translations->removeElement($translation);
    }
    
    public function __toString() {
        if ($this->getLabel())
        {
            return $this->getLabel();
        }
        else
            return "";
    }

    /**
     * Add publication.
     *
     * @param \GCF\MainBundle\Entity\Publication $publication
     *
     * @return Keyword
     */
    public function addPublication(\GCF\MainBundle\Entity\Publication $publication)
    {
        $this->publication[] = $publication;

        return $this;
    }

    /**
     * Remove publication.
     *
     * @param \GCF\MainBundle\Entity\Publication $publication
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePublication(\GCF\MainBundle\Entity\Publication $publication)
    {
        return $this->publication->removeElement($publication);
    }

    /**
     * Get publication.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Add elearning.
     *
     * @param \GCF\MainBundle\Entity\Elearning $elearning
     *
     * @return Keyword
     */
    public function addElearning(\GCF\MainBundle\Entity\Elearning $elearning)
    {
        $this->elearning[] = $elearning;

        return $this;
    }

    /**
     * Remove elearning.
     *
     * @param \GCF\MainBundle\Entity\Elearning $elearning
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeElearning(\GCF\MainBundle\Entity\Elearning $elearning)
    {
        return $this->elearning->removeElement($elearning);
    }

    /**
     * Get elearning.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getElearning()
    {
        return $this->elearning;
    }
    
    public function jsonSerialize()
    {
        return array(
            'id' => $this->id,
            'label' => $this->label,
        );
    }
}
