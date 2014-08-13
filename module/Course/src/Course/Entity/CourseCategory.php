<?php

namespace Course\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CourseCategory
 *
 * @ORM\Table(name="course_category", indexes={@ORM\Index(name="ind_parent_category", columns={"parent_category"})})
 * @ORM\Entity
 */
class CourseCategory
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
     * @ORM\Column(name="name", type="text", nullable=false)
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
     * @ORM\Column(name="category_left", type="bigint", nullable=true)
     */
    private $categoryLeft;

    /**
     * @var integer
     *
     * @ORM\Column(name="category_right", type="bigint", nullable=true)
     */
    private $categoryRight;

    /**
     * @var \Course\Entity\CourseCategory
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\CourseCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_category", referencedColumnName="id")
     * })
     */
    private $parentCategory;
	
    


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
     * @return CourseCategory
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
     * @return CourseCategory
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
     * Set categoryLeft
     *
     * @param integer $categoryLeft
     * @return CourseCategory
     */
    public function setCategoryLeft($categoryLeft)
    {
        $this->categoryLeft = $categoryLeft;

        return $this;
    }

    /**
     * Get categoryLeft
     *
     * @return integer 
     */
    public function getCategoryLeft()
    {
        return $this->categoryLeft;
    }

    /**
     * Set categoryRight
     *
     * @param integer $categoryRight
     * @return CourseCategory
     */
    public function setCategoryRight($categoryRight)
    {
        $this->categoryRight = $categoryRight;

        return $this;
    }

    /**
     * Get categoryRight
     *
     * @return integer 
     */
    public function getCategoryRight()
    {
        return $this->categoryRight;
    }

    /**
     * Set parentCategory
     *
     * @param \Course\Entity\CourseCategory $parentCategory
     * @return CourseCategory
     */
    public function setParentCategory(\Course\Entity\CourseCategory $parentCategory = null)
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    /**
     * Get parentCategory
     *
     * @return \Course\Entity\CourseCategory 
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }
}
