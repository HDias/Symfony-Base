<?php

namespace AMZ\BaseBundle\Service;

class ServicePersist extends ServiceAware implements
        CreateEntityInterface,
        EditEntityInterface,
        DeleteEntityInterface
{


    /**
     * {@inheritDoc}
     */
    public function insertEntity($entity)
    {
        $this->getEm()->persist($entity);
        $this->getEm()->flush();

        return $entity;
    }

    /**
     * {@inheritDoc}
     */
    public function updateEntity($entity = null)
    {
        $this->getEm()->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function removeEntity($entity)
    {
        $this->getEm()->remove($entity);
        $this->getEm()->flush();

        return $entity;
    }
}