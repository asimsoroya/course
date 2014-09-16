<?php
namespace CourseTests\ServiceTest;
use Course\Service\MPOTTraversalFacade;
use Course\Service\CourseCategoryFacade;
use Course\Entity\CourseCategory;
use tests\UTTestClass;

class TreeTest extends \PHPUnit_Framework_TestCase {
		protected $treeFacade;
		protected $courseFacade;
		
		public function __construct(){
			$this->treeFacade = new \Course\Service\MPOTTraversalFacade();//$di->get('Course\Service\MPOTTraversalFacade');
			$this->treeFacade->setEntityManager(UTTestClass::$entityManager);
			$this->courseFacade = new \Course\Service\CourseCategoryFacade();
			$this->courseFacade->setEntityManager(UTTestClass::$entityManager);
		}
		
		/**
		 * phpunit --bootstrap tests/bootstrapdrv.php tests\CourseTests\ServiceTest\TreeTest
		 * Testing Tree operations
		 */
		public function atestTreeMethods(){
			$courseFacade = new \Course\Service\CourseCategoryFacade();
			$courseFacade->setEntityManager(UTTestClass::$entityManager);
			$root = new \Course\Entity\CourseCategory();
			$root->setDescription("Root description");
			$root->setName("Food");
			 
			$root =$this->treeFacade->addRoot($root);
			$this->assertNotNull($root);
			$fruit = $this->addandTestChild("Fruit", $root); 
			$red = $this->addandTestChild("Red", $fruit); 
			$yellow = $this->addandTestChild("Yellow", $fruit);
			
			$banana = $this->addandTestChild("Banana", $yellow);
			$cherry = $this->addandTestChild("Cherry", $red);
			
			$meat = $this->addandTestChild("Meat", $root); 
			$beaf = $this->addandTestChild("Beaf", $meat);
			$chicken = $this->addandTestChild("Chicken", $meat);
			
			$this->treeFacade->rebuildTree($root,1);
			$subtree = $this->treeFacade->getSubTree($root);
			foreach ($subtree as $treeNode ) {
				print_r("\nTree node:".$treeNode->getName() . " Left: 
					". $treeNode->getLeft(). " Right: ". $treeNode->getRight());
				if ($treeNode->getName() == "Banana") {
					$this->assertEquals(8, $treeNode->getLeft(),"Invalid left set"); 
				}else if ($treeNode->getName() == "Cherry") {
					$this->assertEquals(5, $treeNode->getRight(),"Invalid right set");
				}else if ($treeNode->getName() == "Chicken") {
					$this->assertEquals(16, $treeNode->getRight(),"Invalid right set");
				}
			}
		}
		
		public function testDisplayTree() {
			$root = $this->courseFacade->find('Course\Entity\CourseCategory', 1);
			$this->treeFacade->getTreeHierarchy($root);
		}

		/**
		 * 
		 * @param unknown_type $childName
		 * @param unknown_type $objParent
		 */
		protected function addandTestChild($childName,$objParent) {
			$meat = new \Course\Entity\CourseCategory();
			$meat->setName($childName);
			$meat->setParentCategory($objParent);
			$meat = $this->treeFacade->addChild($objParent, $meat);
			$this->assertNotNull($meat);
			return $meat;
		}
}
