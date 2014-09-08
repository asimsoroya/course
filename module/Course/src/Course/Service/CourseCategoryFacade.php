<?php
namespace Course\Service;

use \Doctrine\ORM\EntityManager;

class CourseCategoryFacade extends AbstractFacade {
	
 	public function findAll(){
 		return parent::findAll('Course\Entity\CourseCategory');
 	}
}
