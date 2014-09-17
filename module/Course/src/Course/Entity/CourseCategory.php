<?php

namespace Course\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CourseCategory
 *
 * @ORM\Table(name="course_category", indexes={@ORM\Index(name="ind_parent_category", columns={"parent_category"})})
 * @ORM\Entity
 */
class CourseCategory extends AbstractStructureEntity 
{
	
	const ENTITY_REPOSITORY = 'Course\Entity\CourseCategory';
	
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
     * @ORM\Column(name="node_left", type="integer", nullable=true)
     */
    private $left;

    /**
     * @var integer
     *
     * @ORM\Column(name="node_right", type="integer", nullable=true)
     */
    private $right;

    /**
     * @var \Course\Entity\CourseCategory
     *
     * @ORM\ManyToOne(targetEntity="Course\Entity\CourseCategory",fetch="LAZY")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parentCategory;
	
    private $arrChildren = array();
      
    
    public function addChild(CourseCategory $child) {
    	$this->arrChildren[$child->getId()] = $child;
    			/*	array('id' => $child->getId(), 
    			'name' => $child->getName());*/
    }
    
    public function unsetParent(){
    	unset($this->parentCategory);
    }

    /**
     *
     * @param integer $left
     * @return \Course\Entity\CourseCategory
     */
    public function setLeft($left){
    	if($left == null){
    		throw new Exception("Invalid parameter passed");
    	}
    	$this->left = $left;
    	return $this;
    }
     
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
     *
     * @return integer
     */
    public function getLeft(){
    	return $this->left;
    }
     
    /**
     *
     * @param integer $right
     */
    public function setRight($right){
    	if($right == null){
    		throw new \Exception("Invalid parameter passed");
    	}
    	$this->right = $right;
    	return $this;
    }
     
    /**
     *
     *  @return integer
     */
    public function getRight(){
    	return $this->right;
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
    
    /**
     * @return \Course\Entity\CourseCategory 
     */
 	public function getParent(){
 		return $this->getParentCategory();	
 	}
 	
 	/**
 	 * @return string
 	 */
 	public function getRepository(){
 		return self::ENTITY_REPOSITORY;
 	}
}
