<?php
namespace Course\Controller;

use Zend\Mvc\Controller\AbstractActionController;

abstract class AbstractCustomController extends AbstractActionController {
	protected  $entityManager;
	
	/**
	 * 
	 * @param unknown_type $entityManager
	 */
	public function setEntityManager($entityManager){
		$this->entityManager = $entityManager;
	}
	
	public function getEntityManager(){
		return $this->entityManager;
	}
}

