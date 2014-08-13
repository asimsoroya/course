<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CourseCategory
 *
 * @ORM\Table(name="course_category", indexes={@ORM\Index(name="ind_parent_category", columns={"parent_category"})})
 * @ORM\Entity
 */
class CourseCategory
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
     * @var integer
     *
     * @ORM\Column(name="category_left", type="bigint", nullable=true)
     */
    private $categoryLeft;

    /**
     * @var integer
     *
     * @ORM\Column(name="category_right", type="bigint", nullable=true)
     */
    private $categoryRight;

    /**
     * @var \Application\Entity\CourseCategory
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\CourseCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_category", referencedColumnName="id")
     * })
     */
    private $parentCategory;


}
