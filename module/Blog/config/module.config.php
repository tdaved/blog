<?php

namespace Blog;

return array(
    'service_manager' => array(
        'invokables' => array(
            'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Blog\Controller\Blog' => 'Blog\Controller\BlogController',
            'Blog\Controller\Post' => 'Blog\Controller\PostController'
        ),
        'initializers' => array(
            'PostServiceInit' => 'Blog\Service\PostServiceInitializer'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    ),
    'router' => array(
        'routes' => array(
            'blog' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/blog[/]',
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Blog',
                        'action' => 'index',
                    )
                )
            ),
            'post' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/blog/:id',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Post',
                        'action' => 'post'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'edit' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/edit',
                            'defaults' => array(
                                'controller' => 'Blog\Controller\Post',
                                'action' => 'edit',
                            )
                        )
                    )
                )
            ),
            'create' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/blog/create',
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Post',
                        'action' => 'create',
                    )
                )
            )
        )
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
);