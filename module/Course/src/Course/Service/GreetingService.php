<?php
namespace Course\Service;
use Zend\EventManager\EventManagerInterface;
 
 class GreetingService 
 {
 	private $eventManager;
 	/**
 	 * 
 	 * @var LoggingServiceInterface
 	 */
 	private $loggingService;
 	
 	
 	public function testGetGreeting(){
 		$greetingService = new GreetingService();
 		$fakeLoggingService = new FakeLoggingService();
 		$greetingService->setLoggingService($fakeLoggingService);
 		$result = $greetingService->getGreeting();
 		//$this->assertEquals(/* [..] */);
 	}
 	
 	/*
 	 * 
 	 */
 	public function setLoggingService(LoggingServiceInterface $logginService){
 		$this->loggingService = $logginService;
 	}
 	
 	public function getLoggingService(){
 		return $this->loggingService;
 	}
 	
	public function getGreeting()
	{
		$this->loggingService->log("getGreeting executed");
		
		 if(date("H") <= 11)
			  return "Good morning, world!";
		  else if (date("H") > 11 && date("H") < 17)
			  return "Hello, world!";
		  else
			  return "Good evening, world!";
	}
	/**
	 * 
	 */
	public function getEventManager()
	{
		return $this->eventManager;
	}
	/**
	 * 
	 * @param EventManagerInterface $em
	 */
	public function setEventManager(EventManagerInterface $em)
	{
		$this->eventManager = $em;
	}
}
