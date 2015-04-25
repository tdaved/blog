<?php
namespace Blog\Service;

use Doctrine\ORM\EntityManager;

/**
 *
 * @author David
 */
interface EntityManagerAwareInterface
{

    /**
     *
     * @return EntityManager
     */
    public function getEntityManager();

    /**
     *
     * @param EntityManager $service            
     */
    public function setEntityManager(EntityManager $service);
}