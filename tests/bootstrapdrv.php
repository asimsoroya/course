<?php
  
 use Zend\Loader\StandardAutoloader;
 use Zend\ServiceManager\ServiceManager;
 use Zend\Mvc\Service\ServiceManagerConfig;
 require_once 'UTTestClass.php';
 
 chdir(dirname(__DIR__));

 include 'init_autoloader.php';
//where is nit_loader.php and we are linking to this
 $loader = new StandardAutoloader();
 $loader->registerNamespace('CourseTests', __DIR__ . '/ServiceTest');
 $loader->register();

 class TestBootstrap
 {
 	static public $config;
 	static public $sm;
 	static public $em;
 
 	static public function go()
 	{
 		print_r("BOOTSTRAP CALLED");
 		chdir(dirname(__DIR__));
 		include 'init_autoloader.php';
 		self::$config = include 'config/application.config.php';
 		Zend\Mvc\Application::init(self::$config);
 		self::$sm = self::getServiceManager(self::$config);
 		self::$em = self::getEntityManager(self::$sm);
 	}
 
 	static public function getServiceManager($config)
 	{
 		$serviceManager = new ServiceManager(new ServiceManagerConfig);
 		$serviceManager->setService('ApplicationConfig', $config);
 		$serviceManager->get('ModuleManager')->loadModules();
 		return $serviceManager;
 	}
 
 	static public function getEntityManager($serviceManager)
 	{
 		return $serviceManager->get('doctrine.entitymanager.orm_default');
 	}
 } 
 
 TestBootstrap::go();
 tests\UTTestClass::$entityManager = TestBootstrap::$em;
 tests\UTTestClass::$serviceManager = TestBootstrap::$sm;
 