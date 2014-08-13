<?php

namespace Course\Entity;

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
     * @var \Course\Entity\Course
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\Course")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prereq_course_id", referencedColumnName="id")
     * })
     */
    private $prereqCourse;

    /**
     * @var \Course\Entity\CourseCategory
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\CourseCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Course\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="designer_id", referencedColumnName="id")
     * })
     */
    private $designer;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Course
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Course
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     * @return Course
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return integer 
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set courseLeft
     *
     * @param integer $courseLeft
     * @return Course
     */
    public function setCourseLeft($courseLeft)
    {
        $this->courseLeft = $courseLeft;

        return $this;
    }

    /**
     * Get courseLeft
     *
     * @return integer 
     */
    public function getCourseLeft()
    {
        return $this->courseLeft;
    }

    /**
     * Set courseRight
     *
     * @param integer $courseRight
     * @return Course
     */
    public function setCourseRight($courseRight)
    {
        $this->courseRight = $courseRight;

        return $this;
    }

    /**
     * Get courseRight
     *
     * @return integer 
     */
    public function getCourseRight()
    {
        return $this->courseRight;
    }

    /**
     * Set prereqCourse
     *
     * @param \Course\Entity\Course $prereqCourse
     * @return Course
     */
    public function setPrereqCourse(\Course\Entity\Course $prereqCourse = null)
    {
        $this->prereqCourse = $prereqCourse;

        return $this;
    }

    /**
     * Get prereqCourse
     *
     * @return \Course\Entity\Course 
     */
    public function getPrereqCourse()
    {
        return $this->prereqCourse;
    }

    /**
     * Set category
     *
     * @param \Course\Entity\CourseCategory $category
     * @return Course
     */
    public function setCategory(\Course\Entity\CourseCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Course\Entity\CourseCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set designer
     *
     * @param \Course\Entity\User $designer
     * @return Course
     */
    public function setDesigner(\Course\Entity\User $designer = null)
    {
        $this->designer = $designer;

        return $this;
    }

    /**
     * Get designer
     *
     * @return \Course\Entity\User 
     */
    public function getDesigner()
    {
        return $this->designer;
    }
}
