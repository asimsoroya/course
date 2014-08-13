<?php

namespace Course\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BookCategory
 *
 * @ORM\Table(name="book_category", indexes={@ORM\Index(name="idx_parent_category", columns={"parent_category"})})
 * @ORM\Entity
 */
class BookCategory
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
     * @var \Course\Entity\BookCategory
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\BookCategory")
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
     * @return BookCategory
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
     * @return BookCategory
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
     * Set parentCategory
     *
     * @param \Course\Entity\BookCategory $parentCategory
     * @return BookCategory
     */
    public function setParentCategory(\Course\Entity\BookCategory $parentCategory = null)
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    /**
     * Get parentCategory
     *
     * @return \Course\Entity\BookCategory 
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }
}
