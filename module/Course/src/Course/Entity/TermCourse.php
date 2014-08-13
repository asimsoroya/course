<?php

namespace Course\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TermCourse
 *
 * @ORM\Table(name="term_course", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="idx_term_course_course1", columns={"course_id"}), @ORM\Index(name="idx_term_course_term1", columns={"term_id"})})
 * @ORM\Entity
 */
class TermCourse
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
     * @var boolean
     *
     * @ORM\Column(name="is_mandatory", type="boolean", nullable=true)
     */
    private $isMandatory;

    /**
     * @var integer
     *
     * @ORM\Column(name="credit_hour", type="integer", nullable=true)
     */
    private $creditHour;

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
     * @var \Course\Entity\Term
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\Term")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="term_id", referencedColumnName="id")
     * })
     */
    private $term;



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
     * Set isMandatory
     *
     * @param boolean $isMandatory
     * @return TermCourse
     */
    public function setIsMandatory($isMandatory)
    {
        $this->isMandatory = $isMandatory;

        return $this;
    }

    /**
     * Get isMandatory
     *
     * @return boolean 
     */
    public function getIsMandatory()
    {
        return $this->isMandatory;
    }

    /**
     * Set creditHour
     *
     * @param integer $creditHour
     * @return TermCourse
     */
    public function setCreditHour($creditHour)
    {
        $this->creditHour = $creditHour;

        return $this;
    }

    /**
     * Get creditHour
     *
     * @return integer 
     */
    public function getCreditHour()
    {
        return $this->creditHour;
    }

    /**
     * Set course
     *
     * @param \Course\Entity\Course $course
     * @return TermCourse
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
     * Set term
     *
     * @param \Course\Entity\Term $term
     * @return TermCourse
     */
    public function setTerm(\Course\Entity\Term $term = null)
    {
        $this->term = $term;

        return $this;
    }

    /**
     * Get term
     *
     * @return \Course\Entity\Term 
     */
    public function getTerm()
    {
        return $this->term;
    }
}
