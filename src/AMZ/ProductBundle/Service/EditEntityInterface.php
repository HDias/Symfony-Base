<?php
namespace AMZ\ProductBundle\Service;

interface EditEntityInterface
{
    /**
     * Update in database the news dates of entity
     * @param $entity
     * @return $entity
     */
    public function updateEntity($entity);
}