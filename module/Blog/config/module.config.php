<?php
namespace Blog;

return array(
    'controllers' => array(
        'invokables' => array(
            'Blog\Controller\Blog' => 'Blog\Controller\BlogController',
            'Blog\Controller\Post' => 'Blog\Controller\PostController',
            'Blog\Controller\Comment' => 'Blog\Controller\CommentController',
        ),
        'initializers' => array(
            'EntityManager' => 'Blog\Service\EntityManagerInitializer'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'router' => array(
        'routes' => array(
            'blog' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Blog',
                        'action' => 'index'
                    )
                )
            ),
            'post' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/:id[/]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Post',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'edit' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => 'edit[/]',
                            'defaults' => array(
                                'controller' => 'Blog\Controller\Post',
                                'action' => 'edit'
                            )
                        )
                    ),
                    'comment' => array(
                        'type' => 'segment',
                        'options' => array(
                            'verb' => 'post',
                            'route' => 'comment',
                            'defaults' => array(
                                'controller' => 'Blog\Controller\Comment',
                                'action' => 'add'
                            )
                        )
                    )
                )
            ),
            'add' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/add[/]',
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Post',
                        'action' => 'edit',
                        'id' => '0'
                    )
                )
            ),
            'delete' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/:id/delete[/]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Post',
                        'action' => 'delete',
                        'id' => '0'
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
                'paths' => array(
                    __DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )
    
);