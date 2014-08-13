<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="course", indexes={@ORM\Index(name="ind_course_coursecategory1", columns={"category_id"}), @ORM\Index(name="ind_course_course1", columns={"prereq_course_id"}), @ORM\Index(name="ind_course_user1", columns={"designer_id"})})
 * @ORM\Entity
 */
class Course
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="likes", type="integer", nullable=true)
     */
    private $likes;

    /**
     * @var integer
     *
     * @ORM\Column(name="course_left", type="bigint", nullable=true)
     */
    private $courseLeft;

    /**
     * @var integer
     *
     * @ORM\Column(name="course_right", type="bigint", nullable=true)
     */
    private $courseRight;

    /**
     * @var \Application\Entity\Course
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Course")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prereq_course_id", referencedColumnName="id")
     * })
     */
    private $prereqCourse;

    /**
     * @var \Application\Entity\CourseCategory
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\CourseCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Application\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="designer_id", referencedColumnName="id")
     * })
     */
    private $designer;


}
