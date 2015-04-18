<?php

namespace Blog\Factory;

use Blog\Controller\ListController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @author David
 */
class ListControllerFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $originServiceLocator = $serviceLocator->getServiceLocator();
        $postService = $originServiceLocator->get('Blog\Service\PostServiceInterface');
        
        return new ListController($postService);
    }
}
