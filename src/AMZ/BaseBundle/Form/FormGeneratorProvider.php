<?php

namespace AMZ\BaseBundle\Form;

class FormGeneratorProvider extends FormGeneratorAware
{

    protected $formType;

    protected $deleteRoute;

    /**
     * Creates a form to create a entity.
     *
     * @param Object $entity The entity
     * @param string $router The name of router
     * @param string $method The request method
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function generateCreateForm($entity, $router, $method)
    {
        return $this->createForm(
            $this->formType,
            $entity,
            array(
                'action' => $this->generateUrl($router),
                'method' => $method,
            )
        );
    }

    /**
     * Creates a form to create a entity.
     *
     * @param Object $entity The entity
     * @param string $router The name of router
     * @param string $method The request method
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function generateEditForm($entity, $router, $method)
    {
        return $this->createForm(
            $this->formType,
            $entity,
            array(
                'action' => $this->generateUrl($router, array('id' => $entity->getId())),
                'method' => $method,
            )
        );
    }

    /**
     * Creates a form to delete a Video entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function generateDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($this->deleteRoute, array('id' => $id)))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}