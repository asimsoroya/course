<?php
namespace Course\Controller;

use Zend\Mvc\Controller\AbstractActionController;


class CategoryController extends AbstractCustomController {
	
	private $categoryFacade; 
	
	/**
	 *
	 * @param unknown_type $categoryFacade
	 */
	public function setCategoryFacade($categoryFacade){
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
		if($this->getServiceLocator()){
			$this->entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		}
		$this->categoryFacade->setEntityManager($this->entityManager);
		$allCategories = $this->categoryFacade->findAll('Course\Entity\CourseCategory');
		return new ViewModel(array('categories' => $allCategories));
	}
}
