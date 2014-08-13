<?php
namespace Course\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Course\Service\CourseCategoryFacade;

class CategoryController extends AbstractCustomController {
	
	private $categoryFacade; 
	
	/**
	 *
	 * @param unknown_type $categoryFacade
	 */
	public function setCategoryFacade(\Course\Service\CourseCategoryFacade $categoryFacade){
		$this->categoryFacade = $categoryFacade;
	}
	
	/**
	 *
	 */
	public function getCategoryFacade(){
		return $this->categoryFacade;
	}
	
	public function categoryAction(){
		 
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Zend\Mvc\Controller.AbstractActionController::indexAction()
	 */
	public function indexAction(){
		
		/* if(!$this->entityManager){
 			$this->entityManager = $this->settings();
 		} */
 		///$this->categoryFacade->setEntityManager($this->entityManager);
 		
		
 		$allCategories = $this->categoryFacade->findAll('Course\Entity\CourseCategory'); 
 		return new ViewModel(array('categories' => $allCategories));
	}
}
