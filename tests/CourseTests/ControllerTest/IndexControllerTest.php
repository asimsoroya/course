<?php

namespace CourseTests\ControllerTest;

use Zend\Mvc\MvcEvent;
use Zend\http\Request;
use Zend\Mvc\Router\Console\RouteMatch;

use Course\Controller\CategoryController;
use tests\UTTestClass;

class IndexControllerTest extends \PHPUnit_Framework_TestCase
{
	private $controller;
	private $request;
	private $routeMatch;
	private $event;

	public function setUp(){
		$this->controller = new CategoryController();
		$this->request = new Request();
		$this->routeMatch = new RouteMatch(array('controller' => 'Index'));
		$this->event = new MvcEvent();
		$this->event->setRouteMatch($this->routeMatch);
		$this->controller->setEvent($this->event);
	}
	
	public function testIndexAction(){ 	 
		$di = new \Zend\Di\Di();
		$courseFacade = $di->get('Course\Service\CourseCategoryFacade');
		if($courseFacade){
			$this->controller->setCategoryFacade($courseFacade);
		}
		$this->controller->setEntityManager(UTTestClass::$entityManager);
		$this->routeMatch->setParam('action', 'index');
		$response = $this->controller->dispatch($this->request);
		$viewModelValues = $response->getVariables();
 	 	foreach($viewModelValues['categories'] as $category ) {
 	 		print_r($category);
 	 		exit;
 	 	}
	}
}
