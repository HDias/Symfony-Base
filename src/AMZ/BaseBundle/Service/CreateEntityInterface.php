<?php

namespace AMZ\BaseBundle\Service;

interface CreateEntityInterface
{
    /**
     * Persist in database a new entity
     * @param $entity
     * @return $entity
     */
    public function insertEntity($entity);
}