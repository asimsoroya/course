<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Controller\AbstractCustomController;

class IndexController extends AbstractCustomController
{
	
    public function indexAction()
    { 
    	print_r("Index controller");
        return new ViewModel();
    }

    public function addAction()
    {
        return new ViewModel();
    }
    
    /**
     *
     * @param unknown_type $categoryFacade
     */
    public function setCategoryFacade(\Course\Service\CourseCategoryFacade $categoryFacade){
    	$this->categoryFacade = $categoryFacade;
    }
    
    /**
     *
     */
    public function getCategoryFacade(){
    	return $this->categoryFacade;
    }
}
