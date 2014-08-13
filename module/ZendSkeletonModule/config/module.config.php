<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'ZendSkeletonModule\Controller\Skeleton' => 'ZendSkeletonModule\Controller\SkeletonController',
        	'ZendSkeletonModule\Controller\Hello' => 'ZendSkeletonModule\Controller\HelloController'
        ),
    ),
    'router' => array(
        'routes' => array(
            'ZendSkeletonModule' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/ZendSkeletonModule',
                    'defaults' => array(
                        'controller'    => 'ZendSkeletonModule\Controller\Hello',
                        'action'        => 'world',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'ZendSkeletonModule' => __DIR__ . '/../view',
        ),
    ),
);
