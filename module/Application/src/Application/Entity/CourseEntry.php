<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CourseEntry
 *
 * @ORM\Table(name="course_entry", indexes={@ORM\Index(name="idx_course_entry_course1", columns={"course_id"})})
 * @ORM\Entity
 */
class CourseEntry
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
     * @ORM\Column(name="descripiton", type="text", nullable=true)
     */
    private $descripiton;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_type", type="string", length=20, nullable=true)
     */
    private $entryType;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="blob", nullable=true)
     */
    private $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="referred_entry_id", type="bigint", nullable=true)
     */
    private $referredEntryId;

    /**
     * @var \Application\Entity\Course
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Course")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     * })
     */
    private $course;


}
