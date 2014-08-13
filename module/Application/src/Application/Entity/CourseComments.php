<?php

namespace Application\Entity;

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
     * @var \Application\Entity\Course
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Course")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     * })
     */
    private $course;

    /**
     * @var \Application\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


}
