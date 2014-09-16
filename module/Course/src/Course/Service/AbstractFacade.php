<?php
namespace Course\Service;

use \Doctrine\ORM\EntityManager; 
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractFacade implements ServiceLocatorAwareInterface, IFacade {
	
	/**
	 * @var \Doctrine\Orm\EntityManager
	 */
	protected $entityManager = null;
	protected $eventManager;
	protected $loggingService;
	protected $cacheClass;
	protected $serviceLocator;
	
	public function getEventManager(){
		return $this->eventManager;
	}
	
	public function setEventManager( $eventManager){
		$this->eventManager = $eventManager;
	}
	
	/* (non-PHPdoc)
	 * @see \Front\ORM\EntityManagerAwareInterface::setEntityManager()
	 */
	public function setEntityManager(\Doctrine\ORM\EntityManager $entityManager)
	{
	    $this->entityManager = $entityManager;
	    return $this;
	}
	
	/**
	 * @returns ServiceLocatorInterFace
	 */
	public function getServiceLocator()
	{
		return $this->serviceLocator;
	}
	
	
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
	{
		$this->serviceLocator = $serviceLocator;
	}
	 
	
	/**
	 * Getting entity manager
	 */
	public function getEntityManager(){
		return $this->entityManager;
	}
	
	public function find($repository, $id) {
		return $this->entityManager->getRepository($repository)->find($id);
	}
	
	public function findAll($repository){
		return $this->entityManager->getRepository($repository)->findAll();
	}
	
	/**
	 * 
	 * @param unknown_type $entity
	 */
	public function persist($entity){
		$this->entityManager->persist($entity);
		$this->flush();
		return $entity;
	}
	
	
	public function flush(){
		$this->entityManager->flush();		
	}
}
