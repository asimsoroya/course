<?php

namespace Course\Service;


use Course\Entity\AbstractStructureEntity;
 
class MPOTTraversalFacade extends AbstractFacade{
	
	/**
	 * 
	 * @param AbstractStructureEntity $objRoot
	 */
	public function addRoot(AbstractStructureEntity $objRoot){
		$objRoot->setLeft(1);
		$objRoot->setRight(2);
		return $this->persist($objRoot);
	}
	
	/**
	 * 
	 * @param IStructureEntity $objParent
	 * @param IStructureEntity $objChild
	 */
	public function addChild(AbstractStructureEntity $objParent, AbstractStructureEntity $objChild){
		 if (!$objParent->getId()) {
		 	return $this->addRoot($objChild);
		 }
		 $objChild->setLeft($objParent->getRight());
		 $objChild->setRight($objChild->getLeft()+1);
		 $objParent->setRight($objParent->getRight()+2);
		 return $this->persist($objChild);
	}
	
	/**
	 * 
	 * @param AbstractStructureEntity $objElement
	 */
	public function noofDescendants(AbstractStructureEntity $objElement) {
		return ($objElement->getRight() - $objElement->getLeft())/2;
	}
	
	/**
	 * 
	 * @param AbstractStructureEntity $objElement
	 */
	public function getSubTree(AbstractStructureEntity $objElement){
		$repository = $objElement->getRepository();
		if (!$repository) {
			throw new Exception("Invalid entity set it should be instance of AbstractStructureEntity");
		}
		$qb = $this->entityManager->createQueryBuilder();
		$qb->select('cat')
			->from($repository, 'cat')
			->orderBy('cat.name','ASC');
		
		$qb->where(
			$qb->expr()->between('cat.left', $objElement->getLeft(), $objElement->getRight())
		);
	
		return $qb->getQuery()->getResult();
	}
	
	/**
	 * Checks repository
	 * @param string $repository
	 * @throws Exception
	 */
	protected function _isValidRepository($repository){
		if (!$repository){
			throw new Exception("Invalid entity set it should be instance of AbstractStructureEntity");
		}
	}
	
	/**
	 * Getting path to node, from root to this node
	 */
	public function getPathtoNode(AbstractStructureEntity $objElement){
		//SELECT title FROM tree WHERE lft < 4 AND rgt > 5 ORDER BY lft ASC;
		$repository = $objElement->getRepository();
		$this->_isValidRepository($repository);
		//SELECT title FROM tree WHERE lft < 4 AND rgt > 5 ORDER BY lft ASC;
		$qb = $this->entityManager->createQueryBuilder();
		$qb->select('cat')
			->from($repository, 'cat')
			->orderBy('cat.left','ASC'); 
		$qb->where(
			$qb->expr()->andX(
					$qb->expr()->lt('cat.left', $objElement->getLeft()),
					$qb->expr()->lt('cat.right', $objElement->getRight()))
		);
		return $qb->getQuery()->getResult();
	}
	
	/**
	 * Getting all children of the element
	 * @param AbstractStructureEntity $objElement
	 */
	public function getAllChildren(AbstractStructureEntity $objElement) {
		$repository = $objElement->getRepository();
		$this->_isValidRepository($repository);
		$query = $this->entityManager->createQuery("Select cat  FROM ".$repository. 
				" cat JOIN cat.parentCategory parent Where parent.id=".$objElement->getId());
		return $query->getResult();
/* 		//createQueryBuilder();
		/* $qb->select('cat')
			->from($repository, 'cat')
			->orderBy('cat.name','ASC');		
		$qb->where(
			$qb->expr()->eq('cat.parentCategory.id', $objElement->getId())
		); 
		return $qb->getQuery()->getResult(); */
	}
	
	
	/**
	 * 
	 * @param AbstractStructureEntity $objElement
	 * @param integer $left
	 */
	public function rebuildTree(AbstractStructureEntity $objNode, $left){
		$right = $left + 1;
		$children = $this->getAllChildren($objNode);
		foreach ($children as $childNode) {
			$right = $this->rebuildTree($childNode, $right); 
		}
		$objNode->setLeft($left);
		$objNode->setRight($right);
		$this->persist($objNode);
		return $right+1;
	}
}
