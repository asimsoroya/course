<?php
namespace Course;

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
