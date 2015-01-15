<?php
/**
 * Created by PhpStorm.
 * User: AMZ Dev
 * Date: 01/02/15
 * Time: 00:30
 */

namespace AMZ\BaseBundle\Form;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Form\FormFactoryInterface;

abstract class FormGeneratorAware implements FormGeneratorAwareInterface
{

    private $formFactory;

    private $router;

    public function __construct(RouterInterface $router, FormFactoryInterface $formFactory)
    {
        $this->router = $router;
        $this->formFactory = $formFactory;
    }

    /**
     * {@inheritDoc}
     */
    public function createForm($type, $data = null, array $options = array())
    {
        return $this->formFactory->create($type, $data, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function generateUrl($route, $parameters = array(), $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->router->generate($route, $parameters, $referenceType);
    }

    /**
     * {@inheritDoc}
     */
    public function createFormBuilder($data = null, array $options = array())
    {
        return $this->formFactory->createBuilder('form', $data, $options);
    }
} 