<?php
namespace Helloworld\Controller;

use Zend\View\Helper\ViewModel;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController {
		
	public $greeringService;
	
	public function indexAction(){
		$greetingSrv = $this->getServiceLocator()->get('greetingService'); 
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		
		return 	array('greeting' => $greetingSrv->getGreeting());
	}
	
	public function setGreetingService($service)
	{
		$this->greetingService = $service;
	}
}
