<?php

namespace AMZ\ProductBundle\Form;

use AMZ\BaseBundle\Form\FormGeneratorProvider;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\RouterInterface;

class ProductFormGenerator extends FormGeneratorProvider
{
    function __construct(RouterInterface $router, FormFactoryInterface $formFactory)
    {
        parent::__construct($router, $formFactory);

        $this->formType = 'amz_productbundle_product';
        $this->createRoute = 'product_create';
        $this->editRoute = 'product_update';
        $this->deleteRoute = 'product_delete';
    }
}