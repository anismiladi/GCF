<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecteurActeur
 *
 * @ORM\Table(name="secteur_acteur")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\SecteurActeurRepository")
 */
class SecteurActeur
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
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\Acteur", mappedBy="secteurActeur")
     */
    private $acteur;

    /**
     * @ORM\OneToMany(targetEntity="GCF\MainBundle\Entity\SecteurActeur", mappedBy="secteurActeurParent")
     */
    private $secteurActeurFils;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\SecteurActeur", inversedBy="secteurActeurFils")
     * @ORM\JoinColumn(name="SecteurParent", referencedColumnName="id")
     */
    private $secteurActeurParent;

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

    /**
     * Set nomFr.
     *
     * @param string $nomFr
     *
     * @return SecteurActeur
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
     * @return SecteurActeur
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
     * @return SecteurActeur
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
