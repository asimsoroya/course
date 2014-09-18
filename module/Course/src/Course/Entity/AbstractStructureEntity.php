<?php

namespace Course\Entity;
 
use Doctrine\Common\Proxy\Exception\InvalidArgumentException;

abstract class AbstractStructureEntity {

	abstract public function getId();
	
	abstract public function getLeft();
	abstract public function setLeft($left); 
	
	abstract public function getRight();
	abstract public function setRight($right);
	abstract public function getParent();
	abstract public function addChild(AbstractStructureEntity $child);
	abstract public function getChildren();
	/**
	 * @return string
	 */
	abstract public function getRepository();
}
