<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Apropos
 *
 * @ORM\Table(name="apropos")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\AproposRepository")
 * @Gedmo\TranslationEntity(class="GCF\MainBundle\Entity\AproposTranslation")
 */
class Apropos extends AbstractPersonalTranslatable implements TranslatableInterface
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
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="GCF\MainBundle\Entity\AproposTranslation",
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
     * Set contenu.
     *
     * @param string $contenu
     *
     * @return Apropos
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu.
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Remove translation.
     *
     * @param \GCF\MainBundle\Entity\AproposTranslation $translation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTranslation(\GCF\MainBundle\Entity\AproposTranslation $translation)
    {
        return $this->translations->removeElement($translation);
    }
}
