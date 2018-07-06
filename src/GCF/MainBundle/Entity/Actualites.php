<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Actualites
 *
 * @ORM\Table(name="actualites")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\ActualitesRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\ActualitesTranslation")
 */
class Actualites extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @Gedmo\Translatable
     * @ORM\Column(name="Contenue", type="text")
     */
    private $contenue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\ActualitesTranslation",
     *     mappedBy="object",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre.
     *
     * @param string $titre
     *
     * @return Actualites
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre.
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenue.
     *
     * @param string $contenue
     *
     * @return Actualites
     */
    public function setContenue($contenue)
    {
        $this->contenue = $contenue;

        return $this;
    }

    /**
     * Get contenue.
     *
     * @return string
     */
    public function getContenue()
    {
        return $this->contenue;
    }

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
}
