<?php

namespace Course\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CourseComments
 *
 * @ORM\Table(name="course_comments", indexes={@ORM\Index(name="ind_course_comments_course1", columns={"course_id"}), @ORM\Index(name="ind_course_comments_user1", columns={"user_id"})})
 * @ORM\Entity
 */
class CourseComments
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
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

    /**
     * @var \Course\Entity\Course
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\Course")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     * })
     */
    private $course;

    /**
     * @var \Course\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set comments
     *
     * @param string $comments
     * @return CourseComments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set course
     *
     * @param \Course\Entity\Course $course
     * @return CourseComments
     */
    public function setCourse(\Course\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \Course\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set user
     *
     * @param \Course\Entity\User $user
     * @return CourseComments
     */
    public function setUser(\Course\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Course\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
