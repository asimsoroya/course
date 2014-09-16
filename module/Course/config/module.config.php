<?php
	use Course\Service\CourseCategoryFacade;
	use Course\Service\MPOTTraversalFacade;
 
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
							'categories' => array(
									'type' => 'segment',
									'options' => array(
									'route' => '/categories[/:key][/:offset][/:pageSize]',
											'constraints' => array(
													'key' => '[a-zA-Z][a-zA-Z0-9_-]*',
													'offset'     => '[0-9]+',
													'pageSize'     => '[0-9]+',
											), 
											'defaults' => array(
													'controller' => 'Course\Controller\Category',
													'action' => 'index'
											)
									)
							),
							'category' => array(
									'type' => 'segment',
									'options' => array(
											'route' => '/category[/:id]',
											'constraints' => array( 
													'id'     => '[0-9]+', 
											),
											'defaults' => array(
													'controller' => 'Course\Controller\Category',
													'action' => 'list'
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
						'Course\Controller\Category' 
							=> 'Course\Controller\Factory\CategoryControllerFactory'		
					),					
			),
			'service_manager' => array(
					'services' => array(
							'categoryfacade' => new Course\Service\CourseCategoryFacade(),
							'treefacade' => new Course\Service\MPOTTraversalFacade()
							)
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
			'controller_plugins' => array(
				'invokables' => array(
					'settings' => 'Course\Controller\Plugins\Settings',
				)
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
							'Course\Controller\Category'  => array(
								'setCategoryFacade' => array(
										'required' => true,
								)
							),

							)
					),
					'instance' => array(
						'preferences' => array(
								'Course\Service\LoggingServiceInterface' 
									=> 'Course\Service\LoggingService', 
							),
					)
			))		
	);
	