<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatLearning
 *
 * @ORM\Table(name="cat_learning")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\CatLearningRepository")
 */
class CatLearning
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
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Elearning", mappedBy="catLearning")
     */
    private $elearning;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\CatLearning", mappedBy="catLearningParent")
     */
    private $catLearningFils;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\CatLearning", inversedBy="catLearningFils")
     * @ORM\JoinColumn(name="CatParent", referencedColumnName="id")
     */
    private $catLearningParent;

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

    /**
     * Set nomFr.
     *
     * @param string $nomFr
     *
     * @return CatLearning
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
     * @return CatLearning
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
     * @return CatLearning
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
    
    public function __toString()
    {
        return $this->getNomFr();
    }
}
