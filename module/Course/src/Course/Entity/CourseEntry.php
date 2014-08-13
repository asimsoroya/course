<?php

namespace Course\Entity;

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
     * @var \Course\Entity\Course
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\Course")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     * })
     */
    private $course;



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
     * @return CourseEntry
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
     * Set descripiton
     *
     * @param string $descripiton
     * @return CourseEntry
     */
    public function setDescripiton($descripiton)
    {
        $this->descripiton = $descripiton;

        return $this;
    }

    /**
     * Get descripiton
     *
     * @return string 
     */
    public function getDescripiton()
    {
        return $this->descripiton;
    }

    /**
     * Set entryType
     *
     * @param string $entryType
     * @return CourseEntry
     */
    public function setEntryType($entryType)
    {
        $this->entryType = $entryType;

        return $this;
    }

    /**
     * Get entryType
     *
     * @return string 
     */
    public function getEntryType()
    {
        return $this->entryType;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return CourseEntry
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set referredEntryId
     *
     * @param integer $referredEntryId
     * @return CourseEntry
     */
    public function setReferredEntryId($referredEntryId)
    {
        $this->referredEntryId = $referredEntryId;

        return $this;
    }

    /**
     * Get referredEntryId
     *
     * @return integer 
     */
    public function getReferredEntryId()
    {
        return $this->referredEntryId;
    }

    /**
     * Set course
     *
     * @param \Course\Entity\Course $course
     * @return CourseEntry
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
}
