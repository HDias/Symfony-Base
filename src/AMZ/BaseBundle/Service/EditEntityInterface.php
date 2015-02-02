<?php
namespace AMZ\BaseBundle\Service;

interface EditEntityInterface
{
    /**
     * Update in database the news dates of entity
     * @param $entity|null
     * @return $entity
     */
    public function updateEntity($entity = null);
}