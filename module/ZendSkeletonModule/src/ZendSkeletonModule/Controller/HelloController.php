<?php
namespace ZendSkeletonModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class HelloController extends AbstractActionController
{
    public function worldAction()
    {
    	print_r("THIS IS WORLD ACTION");
        $message = $this->params()->fromQuery('message', 'foo');
        return new ViewModel(array('message' => $message));
    }
}
