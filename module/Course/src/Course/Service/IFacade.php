<?php
namespace Course\Service;

interface IFacade {
	
	
	/**
	 * Finding object from a repository using id
	 * @param String $repository
	 * @param int $id
	 */
	public function find($repository,$id);
	
	/**
	 * 
	 * @param String $repository
	 */
	public function findAll($repository);
	
	/**
	 * Flush entities to DB
	 */
	public function flush();
	
}
