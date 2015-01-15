<?php

namespace AMZ\ProductBundle\Service;

use AMZ\BaseBundle\Service\ServiceEntityFind;

class ProductServiceFind extends ServiceEntityFind
{
    function __construct()
    {
        $this->entity = 'AMZProductBundle:Product';
    }
}