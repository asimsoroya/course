<?php

namespace Course\Service;

class LoggingService implements LoggingServiceInterface{
	
	public function onGetGreeting(){
		echo "\n onGetGreeting called";
	}
	
	/**
	 * Logging a string
	 * @param unknown_type $str
	 */
	public function log($str){
		echo "\nLogging message: $str";
	}
}
