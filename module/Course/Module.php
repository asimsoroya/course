<?php
namespace Course;

use Zend\Mvc\Controller\ControllerManager;

class Module
{
	public function getAutoloaderConfig()
	{
		return array(
				'Zend\Loader\StandardAutoloader' => array(
						'namespaces' => array(
								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
						)
				)
		);
	}
	
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}
	/**
	 * F
	 */
	public function getControllerConfig(){
		print_r("GETTING CONTROLLER CONFIG");
		return array(
				'factories' => array(
						//controller name as given in rout => config
						'Course\Controller\Category' => function (ControllerManager $cm){
								print_r("CONTROLLER CONFIG CALLED");
								$sm = $cm->getServiceLocator();
								$courseFacade = $sm->get('categoryfacade');
								$em = $sm->get('doctrine.entitymanager.orm_default');
								$courseFacade->setEntityManager($em);
								//$courseFacade->setEntityManager($em);
								$ctr = new \Course\Controller\CategoryController();
								$ctr->setCategoryFacade($courseFacade);
								$ctr->setEntityManager($em);
								return $ctr;
							}
						)
				);
	}
	
	/**
	 *
	 */
	public function getServiceConfig(){
		return array(
				'invokables' => array(
						'loggingService' => 'Course\Service\LoggingService',						 
				)
		);
	}
}
