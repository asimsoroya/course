<?php
	return array(
			'view_manager' => array(
					'template_path_stack' => array(
						__DIR__ . '/../view',
					),
			),
			'router' => array(
					'routes' => array(
							'course' => array(
									'type' => 'Zend\Mvc\Router\Http\Literal',
									'options' => array(
											'route' => '/course',
											'defaults' => array(
													'controller' => 'Course\Controller\Index',
													'action' => 'index'
											)
									)
							),
							'course2' => array(
									'type' => 'Zend\Mvc\Router\Http\Regex',
									'options' => array(
											'regex' => '/course2/(?<slug>[a-zA-Z0-9_-]+)/(?<id>[0-9]+)',
											'spec' => '/%slug%/%id%',
											'defaults' => array(
												'controller' => 'Course\Controller\Index',
												'action' => 'index2'
											),
									),
							),
							'course3' => array(
									'type' => 'Zend\Mvc\Router\Http\Segment',
									'options' => array(
 										'route' => '/course3/:slug/:id',
										'defaults' => array(
											'controller' =>  'Course\Controller\Index',
											'action' => 'index3'
										),
									),
							),
							'course4' => array(
									'type' => 'Zend\Mvc\Router\Http\Literal',
									'options' => array(
										'route' => '/course4',
										'defaults' => array(
											'__NAMESPACE__' => 'Course\Controller',
											'controller' =>  'Course\Controller\Index',
											'action' => 'index4'
										),
									), 				
							),		
					),	 	
			),
			'controllers' => array(
					'factories' => array(
						'Course\Controller\Index' 
							=> 'Course\Controller\IndexControllerFactory'		
					),
					'invokables' => array(
						'Course\Controller\Category' 
							=> 'Course\Controller\CategoryController'
					),
			),
			'doctrine' => array(
					'driver' => array(
							'Entity_driver' => array(
									'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
									'cache' => 'array',
									'paths' => array(__DIR__ . '/../src/Course/Entity')
							),
							'orm_default' => array(
									'drivers' => array(
											'Course\Entity' =>  'Entity_driver'
									),
							),
					),
			),
			'di' => array(
				array(
					'definition' => array(
						'class' => array(
								'Course\Service\GreetingService' => array(
										'setLoggingService' => array(
												'required' => true,
												)
								),
								'Course\Service\CourseCategoryFacade' => array(
										'setEntityManager' => array(
												'required' => true,
											)
									)
								)
					),
					'instance' => array(
						'preferences' => array(
								'Course\Service\LoggingServiceInterface' 
									=> 'Course\Service\LoggingService',
								'\Doctrine\ORM\EntityManager'
									=> 'orm_default'
							)
					)
		))		
	);
	