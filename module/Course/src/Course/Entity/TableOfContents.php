<?php

namespace Course\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableOfContents
 *
 * @ORM\Table(name="table_of_contents", indexes={@ORM\Index(name="idx_tableofcontents_book1", columns={"bookid"})})
 * @ORM\Entity
 */
class TableOfContents
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
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="leveldepth", type="integer", nullable=true)
     */
    private $leveldepth;

    /**
     * @var integer
     *
     * @ORM\Column(name="parentlevel", type="bigint", nullable=true)
     */
    private $parentlevel;

    /**
     * @var integer
     *
     * @ORM\Column(name="level_left", type="bigint", nullable=true)
     */
    private $levelLeft;

    /**
     * @var integer
     *
     * @ORM\Column(name="level_right", type="bigint", nullable=true)
     */
    private $levelRight;

    /**
     * @var \Course\Entity\Book
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\Book")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bookid", referencedColumnName="id")
     * })
     */
    private $bookid;



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
     * @return TableOfContents
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
     * @return TableOfContents
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
     * Set leveldepth
     *
     * @param integer $leveldepth
     * @return TableOfContents
     */
    public function setLeveldepth($leveldepth)
    {
        $this->leveldepth = $leveldepth;

        return $this;
    }

    /**
     * Get leveldepth
     *
     * @return integer 
     */
    public function getLeveldepth()
    {
        return $this->leveldepth;
    }

    /**
     * Set parentlevel
     *
     * @param integer $parentlevel
     * @return TableOfContents
     */
    public function setParentlevel($parentlevel)
    {
        $this->parentlevel = $parentlevel;

        return $this;
    }

    /**
     * Get parentlevel
     *
     * @return integer 
     */
    public function getParentlevel()
    {
        return $this->parentlevel;
    }

    /**
     * Set levelLeft
     *
     * @param integer $levelLeft
     * @return TableOfContents
     */
    public function setLevelLeft($levelLeft)
    {
        $this->levelLeft = $levelLeft;

        return $this;
    }

    /**
     * Get levelLeft
     *
     * @return integer 
     */
    public function getLevelLeft()
    {
        return $this->levelLeft;
    }

    /**
     * Set levelRight
     *
     * @param integer $levelRight
     * @return TableOfContents
     */
    public function setLevelRight($levelRight)
    {
        $this->levelRight = $levelRight;

        return $this;
    }

    /**
     * Get levelRight
     *
     * @return integer 
     */
    public function getLevelRight()
    {
        return $this->levelRight;
    }

    /**
     * Set bookid
     *
     * @param \Course\Entity\Book $bookid
     * @return TableOfContents
     */
    public function setBookid(\Course\Entity\Book $bookid = null)
    {
        $this->bookid = $bookid;

        return $this;
    }

    /**
     * Get bookid
     *
     * @return \Course\Entity\Book 
     */
    public function getBookid()
    {
        return $this->bookid;
    }
}
