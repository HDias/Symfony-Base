<?php
namespace AMZ\ProductBundle\Service;

interface DeleteEntityInterface
{
    /**
     * Remove of database a entity received
     *
     * @param $id A ID of entity
     * @return $id
     */
    public function removeEntity($id);
}