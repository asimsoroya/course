<?php

namespace Application\Entity;

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
     * @var \Application\Entity\Course
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Course")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     * })
     */
    private $course;

    /**
     * @var \Application\Entity\Term
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Term")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="term_id", referencedColumnName="id")
     * })
     */
    private $term;


}
