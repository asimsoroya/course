<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableOfContents
 *
 * @ORM\Table(name="table_of_contents", indexes={@ORM\Index(name="idx_tableofcontents_book1", columns={"bookid"})})
 * @ORM\Entity
 */
class TableOfContents
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="leveldepth", type="integer", nullable=true)
     */
    private $leveldepth;

    /**
     * @var integer
     *
     * @ORM\Column(name="parentlevel", type="bigint", nullable=true)
     */
    private $parentlevel;

    /**
     * @var integer
     *
     * @ORM\Column(name="level_left", type="bigint", nullable=true)
     */
    private $levelLeft;

    /**
     * @var integer
     *
     * @ORM\Column(name="level_right", type="bigint", nullable=true)
     */
    private $levelRight;

    /**
     * @var \Application\Entity\Book
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Book")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bookid", referencedColumnName="id")
     * })
     */
    private $bookid;


}
