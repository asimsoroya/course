<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BookCategory
 *
 * @ORM\Table(name="book_category", indexes={@ORM\Index(name="idx_parent_category", columns={"parent_category"})})
 * @ORM\Entity
 */
class BookCategory
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
     * @ORM\Column(name="name", type="text", nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \Application\Entity\BookCategory
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\BookCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_category", referencedColumnName="id")
     * })
     */
    private $parentCategory;


}
