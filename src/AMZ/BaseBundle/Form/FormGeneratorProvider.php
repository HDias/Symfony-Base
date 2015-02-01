<?php

namespace AMZ\BaseBundle\Form;

class FormGeneratorProvider extends FormGeneratorAware
{

    protected $formType;

    protected $createRoute;

    protected $editRoute;

    protected $deleteRoute;

    /**
     * Creates a form to create a entity.
     *
     * @param Object $entity The entity
     * @param string $method The request method
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function generateCreateForm($entity, $method)
    {
        return $this->createForm(
            $this->formType,
            $entity,
            array(
                'action' => $this->generateUrl($this->createRoute),
                'method' => $method,
            )
        );
    }

    /**
     * Creates a form to create a entity.
     *
     * @param Object $entity The entity
     * @param string $method The request method
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function generateEditForm($entity, $method)
    {
        return $this->createForm(
            $this->formType,
            $entity,
            array(
                'action' => $this->generateUrl($this->editRoute, array('id' => $entity->getId())),
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
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
}