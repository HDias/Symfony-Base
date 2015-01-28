<?php

namespace AMZ\ProductBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class AbstractService implements
    CreateEntityInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Persist in database a new entity
     * @param $entity
     * @return $entity
     */
    public function insertEntity($entity)
    {
        $this->getEm()->persist($entity);
        $this->getEm()->flush();

        return $entity;
    }

    public function getEm()
    {
        return $this->entityManager;
    }
}