<?php

namespace Course\Entity;

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
     * Set description
     *
     * @param string $description
     * @return CourseDesigner
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
     * Set facebookPage
     *
     * @param string $facebookPage
     * @return CourseDesigner
     */
    public function setFacebookPage($facebookPage)
    {
        $this->facebookPage = $facebookPage;

        return $this;
    }

    /**
     * Get facebookPage
     *
     * @return string 
     */
    public function getFacebookPage()
    {
        return $this->facebookPage;
    }

    /**
     * Set linkedinProfile
     *
     * @param string $linkedinProfile
     * @return CourseDesigner
     */
    public function setLinkedinProfile($linkedinProfile)
    {
        $this->linkedinProfile = $linkedinProfile;

        return $this;
    }

    /**
     * Get linkedinProfile
     *
     * @return string 
     */
    public function getLinkedinProfile()
    {
        return $this->linkedinProfile;
    }

    /**
     * Set twitterAccount
     *
     * @param string $twitterAccount
     * @return CourseDesigner
     */
    public function setTwitterAccount($twitterAccount)
    {
        $this->twitterAccount = $twitterAccount;

        return $this;
    }

    /**
     * Get twitterAccount
     *
     * @return string 
     */
    public function getTwitterAccount()
    {
        return $this->twitterAccount;
    }

    /**
     * Set courseDesigner
     *
     * @param integer $courseDesigner
     * @return CourseDesigner
     */
    public function setCourseDesigner($courseDesigner)
    {
        $this->courseDesigner = $courseDesigner;

        return $this;
    }

    /**
     * Get courseDesigner
     *
     * @return integer 
     */
    public function getCourseDesigner()
    {
        return $this->courseDesigner;
    }

    /**
     * Set user
     *
     * @param \Course\Entity\User $user
     * @return CourseDesigner
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
