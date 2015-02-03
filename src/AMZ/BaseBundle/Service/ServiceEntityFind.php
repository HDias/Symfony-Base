<?php
/**
 * Created by PhpStorm.
 * User: hdias
 * Date: 02/02/15
 * Time: 23:57
 */

namespace AMZ\BaseBundle\Service;


class ServiceEntityFind extends ServiceAware
{
    protected $entity;

    public function findAll()
    {
        return $this->getEm()
            ->getRepository($this->entity)
            ->findAll();
    }

    /**
     * @param $id A ID of Entity
     * @return object $entity
     */
    public function find($id)
    {
        return $this->getEm()
            ->getRepository($this->entity)
            ->find($id);
    }

    /**
     * @param $id A ID of Entity
     * @return \Doctrine\ORM\Proxy\ProxyFactory $entity
     */
    public function findByReference($id)
    {
        return $this->getEm()
            ->getReference($this->entity, $id);
    }

}