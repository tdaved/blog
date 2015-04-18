<?php

namespace Blog\Service;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @author David
 */
class PostServiceInitializer implements InitializerInterface {
    public function initialize($instance, ServiceLocatorInterface $serviceLocator) {
        if($instance instanceof PostServiceAwareInterface) {
            $instance->setPostService($serviceLocator->get('Blog\Service\PostServiceInterface'));
        }
    }
}