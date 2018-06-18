<?php

namespace GCF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GCF\MainBundle\Entity\Page;

/**
 * Class PageLocale
 *
 * @package GCF\MainBundle
 *
 * @ORM\Table(name="pages_locales")
 * @ORM\Entity(repositoryClass="GCF\MainBundle\Repository\PageLocaleRepository")
 * @ORM\HasLifecycleCallbacks
 */
class PageLocale
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     * @ORM\Column(name="lang", type="string", length=5)
     */
    private $lang;

    /**
     * @var Page
     * @ORM\ManyToOne(
     *     targetEntity="Page",
     *     inversedBy="locale"
     * )
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    private $page;
}