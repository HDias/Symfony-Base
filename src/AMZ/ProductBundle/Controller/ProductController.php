<?php

namespace AMZ\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        //FindAll
        $productService = $this->get('amz_product.service.product_find');
        $entities       = $productService->findAll();

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

        $productService = $this->get('amz_product.service.product_persist');
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
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        //FindOne
        $productService = $this->get('amz_product.service.product_find');
        $entity         = $productService->find($id);

        if ( ! $entity) {
            throw $this->createNotFoundException('Unable to find Product entity.', new \OutOfBoundsException());
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
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id)
    {
        //FindOne
        $productService = $this->get('amz_product.service.product_find');
        $entity         = $productService->find($id);

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
     *
     * @param Request $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateAction(Request $request, $id)
    {
        //FindOne
        $productServiceFind = $this->get('amz_product.service.product_find');
        $entity         = $productServiceFind->find($id);

        if ( ! $entity) {
            throw $this->createNotFoundException('Unable to find Product entity.', new \OutOfBoundsException());
        }

        $formGenerator  = $this->get('amz_product.form_generator');
        $editForm       = $formGenerator->generateEditForm($entity);

        $editForm->handleRequest($request);

        if ( ! $editForm->isValid()) {
            throw $this->createNotFoundException('Valores inválidos para os Campos', new \UnexpectedValueException());
        }

        //Update Entity
        $productServicePersist = $this->get('amz_product.service.product_persist');
        $productServicePersist->updateEntity();

        return $this->redirect($this->generateUrl('product_edit', array('id' => $id)));
    }

    /**
     * Deletes a Product entity.
     *
     */
    public function deleteAction($id)
    {
        //FindOne
        $productServiceFind = $this->get('amz_product.service.product_find');
        $entity             = $productServiceFind->find($id);

        if ( ! $entity) {
            throw $this->createNotFoundException('Unable to find Product entity.', new \OutOfBoundsException());
        }

        // Remove entity from database
        $productServicePersist = $this->get('amz_product.service.product_persist');
        $productServicePersist->removeEntity($entity);

        return $this->redirect($this->generateUrl('product'));
    }
}
