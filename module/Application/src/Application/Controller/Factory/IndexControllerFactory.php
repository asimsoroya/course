<?php

namespace Application\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface
{
	/**
	 * (non-PHPdoc)
	 * @see Zend\ServiceManager.FactoryInterface::createService()
	 */
	public function createService(ServiceLocatorInterface $serviceLocator){
		
		$controller = new \Application\Controller\IndexController();
		$em = $serviceLocator->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		$di = new \Zend\Di\Di();
		$courseFacade = $di->get('Course\Service\CourseCategoryFacade');
		$courseFacade->setEntityManager($em);
		$controller->setCategoryFacade($courseFacade);
		return $controller;
	}
}
