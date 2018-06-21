<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslation;

/**
 * @ORM\Entity
 * @ORM\Table(name="keyword_translation",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="lookup_unique_keyword_translation_idx", columns={
 *         "locale", "object_id", "field"
 *     })}
 * )
 */
class KeywordTranslation extends AbstractPersonalTranslation
{
    /**
     * @ORM\ManyToOne(targetEntity="GCF\MainBundle\Entity\Keyword", inversedBy="translations")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;
}