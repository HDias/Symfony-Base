<?php
namespace AMZ\BaseBundle\Service;

interface DeleteEntityInterface
{
    /**
     * Remove from database a entity received
     *
     * @param $entity
     * @return $entity
     */
    public function removeEntity($entity);
}