<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Quantiteentree;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Quantiteentree controller.
 *
 * @Route("quantiteentree")
 */
class QuantiteentreeController extends Controller
{
    /**
     * Lists all quantiteentree entities.
     *
     * @Route("/", name="quantiteentree_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $quantiteentrees = $em->getRepository('AdminBundle:Quantiteentree')->findAll();

        return $this->render('quantiteentree/index.html.twig', array(
            'quantiteentrees' => $quantiteentrees,
        ));
    }

    /**
     * Creates a new quantiteentree entity.
     *
     * @Route("/new", name="quantiteentree_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $quantiteentree = new Quantiteentree();
        $form = $this->createForm('AdminBundle\Form\QuantiteentreeType', $quantiteentree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quantiteentree);
            $em->flush();
            $produit =$quantiteentree->getPro();
           $stock= $produit->getStock();
           $stock+= $quantiteentree->getQteentree();
           $produit->setStock($stock);
            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('quantiteentree_index');
        }

        return $this->render('quantiteentree/new.html.twig', array(
            'quantiteentree' => $quantiteentree,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a quantiteentree entity.
     *
     * @Route("/{id}", name="quantiteentree_show")
     * @Method("GET")
     */
    public function showAction(Quantiteentree $quantiteentree)
    {
        $deleteForm = $this->createDeleteForm($quantiteentree);

        return $this->render('quantiteentree/show.html.twig', array(
            'quantiteentree' => $quantiteentree,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing quantiteentree entity.
     *
     * @Route("/{id}/edit", name="quantiteentree_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Quantiteentree $quantiteentree)
    {
        $deleteForm = $this->createDeleteForm($quantiteentree);
        $editForm = $this->createForm('AdminBundle\Form\QuantiteentreeType', $quantiteentree);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quantiteentree_edit', array('id' => $quantiteentree->getId()));
        }

        return $this->render('quantiteentree/edit.html.twig', array(
            'quantiteentree' => $quantiteentree,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a quantiteentree entity.
     *
     * @Route("/{id}", name="quantiteentree_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Quantiteentree $quantiteentree)
    {
        $form = $this->createDeleteForm($quantiteentree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($quantiteentree);
            $em->flush();
        }

        return $this->redirectToRoute('quantiteentree_index');
    }

    /**
     * Creates a form to delete a quantiteentree entity.
     *
     * @param Quantiteentree $quantiteentree The quantiteentree entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Quantiteentree $quantiteentree)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('quantiteentree_delete', array('id' => $quantiteentree->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
