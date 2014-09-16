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
	
	/**
	 * Get param value
	 * @param unknown_type $strName
	 */
	public function getParam($strName){
		$params = $this->getEvent()->getRouteMatch()->getParams();
		if(isset($params[$strName])){
			return $params[$strName];
		}
		return null;
	}
}

