<?php
namespace Course\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
	/**
	 * (non-PHPdoc)
	 * @see Zend\ServiceManager.FactoryInterface::createService()
	 */
	public function createService(ServiceLocatorInterface $serviceLocator){
		
		$ctr = new IndexController();
		/* //$em = $serviceLocator->get('doctrine.entitymanager.orm_default');
		if($em){
			print_r("ENT MGR found in controller factory");
		} */
		//$em = $serviceLocator->get('Doctrine\ORM\EntityManager');
		//print_r("Inside index controller factory");
		
		$di = new \Zend\Di\Di();
		$courseFacade = $di->get('Course\Service\CourseCategoryFacade');
		//$courseFacade->setEntityManager($em);
		$ctr->setCategoryFacade($courseFacade);
		
		/* $greetingSrv = $serviceLocator->get(
			'Helloworld\Service\GreetingService'
		);
		echo " \n Inside index controller factory";
		$ctr->setGreetingService($greetingSrv); */
		return $ctr;
 	}
}
