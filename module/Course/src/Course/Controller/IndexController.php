<?php
namespace Course\Controller;

use Zend\View\Model\ViewModel;

class IndexController extends AbstractCustomController {
		
	private $greetingService;
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
	
	
	/**
	 * 
	 */
	public function setGreetingService($service){
		$this->greetingService = $service;
	}
	
	public function indexAction(){
 		 print_r("Index controller");
  		if(!$this->entityManager){
 			$this->entityManager = $this->settings();
 		}
 		$this->categoryFacade->setEntityManager($this->entityManager);
 		$allCategories = $this->categoryFacade->findAll('Course\Entity\CourseCategory'); 
 		print_r($allCategories );
 		return new ViewModel(array('categories' => $allCategories));
	}
	
	public function index2Action(){
		$slug = $this->getEvent()->getRouteMatch()->getParam('slug');
		$ID = $this->getEvent()->getRouteMatch()->getParam('id');
		print_r("SLUG IS $slug" );
		print_r("ID  IS $ID" ); 
	}
	
	public function index3Action(){
		$slug = $this->getEvent()->getRouteMatch()->getParam('slug');
		$ID = $this->getEvent()->getRouteMatch()->getParam('id');
		print_r("SLUG IS $slug" );
		print_r("ID  IS $ID" );
	}

	public function index4Action(){
		print_r("ACTION 4SLUG IS " );
		print_r("ID  IS " );
	}
}