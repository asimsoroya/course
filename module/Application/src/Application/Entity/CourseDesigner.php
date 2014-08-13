<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CourseDesigner
 *
 * @ORM\Table(name="course_designer", indexes={@ORM\Index(name="ind_course_designer_user1", columns={"user_id"})})
 * @ORM\Entity
 */
class CourseDesigner
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_page", type="string", length=255, nullable=true)
     */
    private $facebookPage;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin_profile", type="string", length=400, nullable=true)
     */
    private $linkedinProfile;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_account", type="string", length=400, nullable=true)
     */
    private $twitterAccount;

    /**
     * @var integer
     *
     * @ORM\Column(name="course_designer", type="bigint", nullable=true)
     */
    private $courseDesigner;

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
