<?php

namespace AMZ\ProductBundle\Service;

use AMZ\BaseBundle\Service\ServicePersist;

class ProductService extends ServicePersist
{
    protected $entity = 'AMZProductBundle:Product';

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