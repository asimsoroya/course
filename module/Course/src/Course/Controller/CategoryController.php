<?php
namespace Course\Controller;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Course\Service\CourseCategoryFacade;

class CategoryController extends AbstractCustomController {
	
	private $categoryFacade; 
	private $courseFacade;
	
	const PAGE_SIZE = 10;
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
		$offset = 0;
		$key = null;
		$pageSize = self::PAGE_SIZE;
		$params = $this->getEvent()->getRouteMatch()->getParams(); 
		if(isset($params['key']))
			$key = $params['key'];
		if(isset($params['offset']))
			$offset = $params['offset'];
		if(isset($params['pageSize'])){
			$pageSize =  $params['pageSize'];
		}
 		$qb = $this->entityManager->createQueryBuilder();
		$qb->select('cat')
			->from('Course\Entity\CourseCategory', 'cat')
			->orderBy('cat.name','ASC');
		if ($key){
			$qb->where(
					$qb->expr()->like('cat.name', $qb->expr()->literal("%$key%"))
				);
		}
		$query = $this->entityManager->createQuery($qb)
			->setFirstResult($offset)
			->setMaxResults($pageSize);
		$paginator = new Paginator($query,false);
		$c = count($paginator);
 		return new ViewModel(array('categories' => $paginator));
	}
 
	public function listAction(){
		$id = $this->getParam('id');
		
	}
}
