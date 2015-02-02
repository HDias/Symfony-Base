<?php

namespace AMZ\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AMZ\ProductBundle\Entity\Product;
use AMZ\ProductBundle\Form\ProductType;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{
    /**
     * Lists all Product entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AMZProductBundle:Product')->findAll();

        return $this->render('AMZProductBundle:Product:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Product entity.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $entity         = $this->get('amz_product.entity.product');
        $formGenerator  = $this->get('amz_product.form_generator');
        $form           = $formGenerator->generateCreateForm($entity);

        $form->handleRequest($request);

        if ( ! $form->isValid()) {
            throw $this->createNotFoundException('Valores inválidos para os Campos', new \UnexpectedValueException());
        }

        $productService = $this->get('amz_product.service.product');
        $productService->insertEntity($form->getData());

        return $this->redirect($this->generateUrl('product_show', array('id' => $form->getData()->getId())));
    }

    /**
     * Displays a form to create a new Product entity.
     *
     */
    public function newAction()
    {
        $entity         = $this->get('amz_product.entity.product');
        $formGenerator  = $this->get('amz_product.form_generator');
        $form           = $formGenerator->generateCreateForm($entity);

        return $this->render('AMZProductBundle:Product:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AMZProductBundle:Product')->find($id);

        if ( ! $entity) {
            throw $this->createNotFoundException('Unable to find Product entity.', new \OutOfBoundsException()););
        }

        $formGenerator = $this->get('amz_product.form_generator');
        $deleteForm = $formGenerator->generateDeleteForm($id);

        return $this->render('AMZProductBundle:Product:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Product entity.
     *
     */
    public function editAction($id)
    {
        $em     = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AMZProductBundle:Product')->find($id);

        if ( ! $entity) {
            throw $this->createNotFoundException('Unable to find Product entity.', new \OutOfBoundsException());
        }

        $formGenerator  = $this->get('amz_product.form_generator');
        $editForm       = $formGenerator->generateEditForm($entity);
        $deleteForm     = $formGenerator->generateDeleteForm($id);

        return $this->render('AMZProductBundle:Product:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Product entity.
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateAction(Request $request, $id)
    {
        $em     = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AMZProductBundle:Product')->find($id);

        if ( ! $entity) {
            throw $this->createNotFoundException('Unable to find Product entity.', new \OutOfBoundsException()););
        }

        $formGenerator  = $this->get('amz_product.form_generator');
        $editForm       = $formGenerator->generateEditForm($entity);

        $editForm->handleRequest($request);

        if ( ! $editForm->isValid()) {
            throw $this->createNotFoundException('Valores inválidos para os Campos', new \UnexpectedValueException());
        }

        $em->flush();

        return $this->redirect($this->generateUrl('product_edit', array('id' => $id)));
    }

    /**
     * Deletes a Product entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AMZProductBundle:Product')->find($id);

        if ( ! $entity) {
            throw $this->createNotFoundException('Unable to find Product entity.', new \OutOfBoundsException()););
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('product'));
    }

    /**
     * Creates a form to delete a Product entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
