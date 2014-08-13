<?php
namespace  Course\Controller\Plugins;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Settings extends AbstractPlugin{
	
	protected $em;
	
	public function __invoke()
	{
		$this->em = $this->getController()->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		return $this->em;
	}
}
