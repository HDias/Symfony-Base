<?php

namespace AMZ\ProductBundle\Form;

use AMZ\ProductBundle\Entity\Product;

class FormGenerator extends FormProvider
{
    /**
     * Creates a form to create a Category entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createCreateForm(Product $entity)
    {
        $form = $this->createForm('amz_productbundle_product', $entity, array(
            'action' => $this->generateUrl('product_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Creates a form to edit a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createEditForm(Product $entity)
    {
        $form = $this->createForm('amz_productbundle_product', $entity, array(
            'action' => $this->generateUrl('product_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

    /**
     * Creates a form to delete a Product entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
}