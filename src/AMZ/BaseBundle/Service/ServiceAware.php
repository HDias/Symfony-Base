<?php

namespace AMZ\BaseBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

abstract class ServiceAware implements
    ServiceAwareInterface
{
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    public function setEntityManager(EntityManagerInterface $em = null)
    {
        $this->entityManager = $em;
    }

    /**
     * {@inheritDoc}
     */
    public function getEm()
    {
       return $this->entityManager;
    }
}