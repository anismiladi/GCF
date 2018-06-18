<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Elearning
 *
 * @ORM\Table(name="elearning")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\ElearningRepository")
 */
class Elearning
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
     * @ORM\Column(name="descriptionfr", type="text")
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
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\CatLearning", inversedBy="elearning")
     * @ORM\JoinColumn(name="categorie", referencedColumnName="id")
     */
    private $catLearning;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\EtatPub", inversedBy="elearning")
     * @ORM\JoinColumn(name="etat", referencedColumnName="id")
     */
    private $etatPub;

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
     * Set nomFr.
     *
     * @param string $nomFr
     *
     * @return Elearning
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
     * @return Elearning
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
     * @return Elearning
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
     * @return Elearning
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
     * @return Elearning
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
     * @return Elearning
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
