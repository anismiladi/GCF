<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Focus
 *
 * @ORM\Table(name="focus")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\FocusRepository")
 */
class Focus
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
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $NomFr;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $NomEn;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $NomAr;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
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
     * @ORM\ManyToMany(targetEntity="GCF\MainBundle\Entity\Projet", inversedBy="focus")
     * @ORM\JoinTable(
     *     name="FocusProjet",
     *     joinColumns={@ORM\JoinColumn(name="focus_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="projet_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $projet;

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
     * @return Focus
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
     * Set nomFr.
     *
     * @param string|null $nomFr
     *
     * @return Focus
     */
    public function setNomFr($nomFr = null)
    {
        $this->NomFr = $nomFr;

        return $this;
    }

    /**
     * Get nomFr.
     *
     * @return string|null
     */
    public function getNomFr()
    {
        return $this->NomFr;
    }

    /**
     * Set nomEn.
     *
     * @param string|null $nomEn
     *
     * @return Focus
     */
    public function setNomEn($nomEn = null)
    {
        $this->NomEn = $nomEn;

        return $this;
    }

    /**
     * Get nomEn.
     *
     * @return string|null
     */
    public function getNomEn()
    {
        return $this->NomEn;
    }

    /**
     * Set nomAr.
     *
     * @param string|null $nomAr
     *
     * @return Focus
     */
    public function setNomAr($nomAr = null)
    {
        $this->NomAr = $nomAr;

        return $this;
    }

    /**
     * Get nomAr.
     *
     * @return string|null
     */
    public function getNomAr()
    {
        return $this->NomAr;
    }
    
    public function __toString()
    {
        return $this->getNomFr();
    }
}
