<?php
namespace Blog\Service;

use Doctrine\ORM\EntityManager;

trait EntityManagerAwareTrait
{

    private $em;

    /*
     * (non-PHPdoc)
     * @see \Blog\Service\EntityManagerAwareInterface::getEntityManager()
     */
    public function getEntityManager()
    {
        return $this->em;
    }

    /*
     * (non-PHPdoc)
     * @see \Blog\Service\EntityManagerAwareInterface::setEntityManager()
     */
    public function setEntityManager(EntityManager $service)
    {
        $this->em = $service;
    }
}
