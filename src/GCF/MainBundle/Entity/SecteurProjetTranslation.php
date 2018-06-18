<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslation;

/**
 * @ORM\Entity
 * @ORM\Table(name="secteurprojet_translation",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="lookup_unique_secteur_projet_translation_idx", columns={
 *         "locale", "object_id", "field"
 *     })}
 * )
 */
class SecteurProjetTranslation extends AbstractPersonalTranslation
{
    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\SecteurProjet", inversedBy="translations")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;
}