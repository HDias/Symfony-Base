<?php

namespace AMZ\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    public function indexAction($name)
    {
        var_dump($this->get('amz_product.form.type.product'));

        return $this->render('AMZProductBundle:Product:index.html.twig', array('name' => $name));
    }
}
