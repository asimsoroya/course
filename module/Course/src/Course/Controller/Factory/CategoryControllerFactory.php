<?php
namespace Course\Controller\Factory;

use Course\Controller\CategoryController; 
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CategoryControllerFactory implements FactoryInterface
{
	/**
	 * (non-PHPdoc)
	 * @see Zend\ServiceManager.FactoryInterface::createService()
	 */
	public function createService(ServiceLocatorInterface $serviceLocator){
		$ctr = new CategoryController(); 
		$em = $serviceLocator->getServiceLocator()->get('doctrine.entitymanager.orm_default'); 
		$di = new \Zend\Di\Di();
		$courseFacade = $di->get('Course\Service\CourseCategoryFacade'); 
		$courseFacade->setEntityManager($em);
		$ctr->setEntityManager($em);
		$ctr->setCategoryFacade($courseFacade); 
		return $ctr;
 	}
}
