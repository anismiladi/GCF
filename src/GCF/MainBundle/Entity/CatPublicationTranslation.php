<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslation;

/**
 * @ORM\Entity
 * @ORM\Table(name="catpublication_translation",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="lookup_unique_catpublication_translation_idx", columns={
 *         "locale", "object_id", "field"
 *     })}
 * )
 */
class CatPublicationTranslation extends AbstractPersonalTranslation
{
    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\CatPublication", inversedBy="translations")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;
}