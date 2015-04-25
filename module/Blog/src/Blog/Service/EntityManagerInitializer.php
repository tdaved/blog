<?php
namespace Blog\Service;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 *
 * @author David
 */
class EntityManagerInitializer implements InitializerInterface
{

    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof EntityManagerAwareInterface) {
            $instance->setEntityManager($serviceLocator->getServiceLocator()
                ->get('doctrine.entitymanager.orm_default'));
        }
    }
}