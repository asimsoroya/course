<?php
namespace Application\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
	/**
	 * (non-PHPdoc)
	 * @see Zend\ServiceManager.FactoryInterface::createService()
	 */
	public function createService(ServiceLocatorInterface $serviceLocator){
		print_r("APPLICATION INDEX CONTROLLER ");
		$controller = new IndexController();
		$em = $serviceLocator->get('doctrine.entitymanager.orm_default');
		$facade = $sm->get('categoryfacade');
		$controller->setEntityManager($em);
		$controller->setCategoryFacade($facade);
	//	return $controller;
	}
}
