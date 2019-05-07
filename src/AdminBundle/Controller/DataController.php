<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Data;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * data controller.
 *
 * @Route("data")
 */
class DataController extends Controller
{
    /**
     * Lists all data entities.
     *
     * @Route("/", name="data_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $datas = $em->getRepository('AdminBundle:Data')->findAll();

        return $this->render('data/index.html.twig', array(
            'datas' => $datas,
        ));
    }

    /**
     * Creates a new data entity.
     *
     * @Route("/new", name="data_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = new Data();
        $form = $this->createForm('AdminBundle\Form\DataType', $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();

            return $this->redirectToRoute('data_index');
        }

        return $this->render('data/new.html.twig', array(
            'data' => $data,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a data entity.
     *
     * @Route("/{id}", name="data_show")
     * @Method("GET")
     */
    public function showAction(Data $data)
    {
        $deleteForm = $this->createDeleteForm($data);

        return $this->render('data/show.html.twig', array(
            'data' => $data,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing data entity.
     *
     * @Route("/{id}/edit", name="data_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Data $data)
    {
        $deleteForm = $this->createDeleteForm($data);
        $editForm = $this->createForm('AdminBundle\Form\DataType', $data);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('data_edit', array('id' => $data->getId()));
        }

        return $this->render('data/edit.html.twig', array(
            'data' => $data,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a data entity.
     *
     * @Route("/{id}", name="data_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Data $data)
    {
        $form = $this->createDeleteForm($data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($data);
            $em->flush();
        }

        return $this->redirectToRoute('data_index');
    }

    /**
     * Creates a form to delete a data entity.
     *
     * @param Data $data The data entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Data $data)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('data_delete', array('id' => $data->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
