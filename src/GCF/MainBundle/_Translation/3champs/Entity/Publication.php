<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\PublicationRepository")
 */
class Publication
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
     * @ORM\Column(name="titreFr", type="string", length=255)
     */
    private $titreFr;

    /**
     * @var string
     *
     * @ORM\Column(name="titreEn", type="string", length=255)
     */
    private $titreEn;


    /**
     * @var string
     *
     * @ORM\Column(name="titreAr", type="string", length=255)
     */
    private $titreAr;

    /**
     * @var string
     *
     * @ORM\Column(name="contenuFr", type="text")
     */
    private $contenuFr;

    /**
     * @var string
     *
     * @ORM\Column(name="contenuEn", type="text")
     */
    private $contenuEn;

    /**
     * @var string
     *
     * @ORM\Column(name="contenuAr", type="text")
     */
    private $contenuAr;

    /**
     * @var string
     *
     * @ORM\Column(name="emailBloggeur", type="string", length=255)
     */
    private $emailBloggeur;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\Projet", inversedBy="publication")
     * @ORM\JoinColumn(name="projet", referencedColumnName="id")
     */
    private $projet;

    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\EtatPub", inversedBy="publication")
     * @ORM\JoinColumn(name="etat", referencedColumnName="id")
     */
    private $etatPub;

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
     * Set titreFr.
     *
     * @param string $titreFr
     *
     * @return Publication
     */
    public function setTitreFr($titreFr)
    {
        $this->titreFr = $titreFr;

        return $this;
    }

    /**
     * Get titreFr.
     *
     * @return string
     */
    public function getTitreFr()
    {
        return $this->titreFr;
    }

    /**
     * Set titreEn.
     *
     * @param string $titreEn
     *
     * @return Publication
     */
    public function setTitreEn($titreEn)
    {
        $this->titreEn = $titreEn;

        return $this;
    }

    /**
     * Get titreEn.
     *
     * @return string
     */
    public function getTitreEn()
    {
        return $this->titreEn;
    }

    /**
     * Set titreAr.
     *
     * @param string $titreAr
     *
     * @return Publication
     */
    public function setTitreAr($titreAr)
    {
        $this->titreAr = $titreAr;

        return $this;
    }

    /**
     * Get titreAr.
     *
     * @return string
     */
    public function getTitreAr()
    {
        return $this->titreAr;
    }

    /**
     * Set contenuEn.
     *
     * @param string $contenuEn
     *
     * @return Publication
     */
    public function setContenuEn($contenuEn)
    {
        $this->contenuEn = $contenuEn;

        return $this;
    }

    /**
     * Get contenuEn.
     *
     * @return string
     */
    public function getContenuEn()
    {
        return $this->contenuEn;
    }

    /**
     * Set contenuAr.
     *
     * @param string $contenuAr
     *
     * @return Publication
     */
    public function setContenuAr($contenuAr)
    {
        $this->contenuAr = $contenuAr;

        return $this;
    }

    /**
     * Get contenuAr.
     *
     * @return string
     */
    public function getContenuAr()
    {
        return $this->contenuAr;
    }
    
    public function __toString()
    {
        return $this->getNomFr();
    }

    /**
     * Set contenuFr.
     *
     * @param string $contenuFr
     *
     * @return Publication
     */
    public function setContenuFr($contenuFr)
    {
        $this->contenuFr = $contenuFr;

        return $this;
    }

    /**
     * Get contenuFr.
     *
     * @return string
     */
    public function getContenuFr()
    {
        return $this->contenuFr;
    }
}
