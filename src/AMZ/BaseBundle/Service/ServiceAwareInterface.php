<?php

namespace AMZ\BaseBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

interface ServiceAwareInterface
{
    /**
     * @param EntityManagerInterface|null $em A EntityManagerInterface instance or null
     */
    public function setEntityManager(EntityManagerInterface $em = null);

    /**
     * @return EntityManagerInterface
     */
    public function getEm();
}