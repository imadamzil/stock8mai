<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Quantitelivree;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Quantitelivree controller.
 *
 * @Route("quantitelivree")
 */
class QuantitelivreeController extends Controller
{
    /**
     * Lists all quantitelivree entities.
     *
     * @Route("/", name="quantitelivree_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $quantitelivrees = $em->getRepository('AdminBundle:Quantitelivree')->findAll();

        return $this->render('quantitelivree/index.html.twig', array(
            'quantitelivrees' => $quantitelivrees,
        ));
    }
/**
     * Lists all quantitelivree entities.
     *
     * @Route("/commande_livree", name="commande_prestataire")
     * @Method("GET")
     */
    public function commandeParPrestataireAction()
    {
        $em = $this->getDoctrine()->getManager();

        $quantitelivrees = $em->getRepository('AdminBundle:Quantitelivree')->findAll();

        return $this->render('quantitelivree/commande.html.twig', array(
            'quantitelivrees' => $quantitelivrees,
        ));
    }

    /**
     * Creates a new quantitelivree entity.
     *
     * @Route("/new", name="quantitelivree_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $quantitelivree = new Quantitelivree();
        $form = $this->createForm('AdminBundle\Form\QuantitelivreeType', $quantitelivree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quantitelivree);
            $em->flush();

            return $this->redirectToRoute('quantitelivree_show', array('id' => $quantitelivree->getId()));
        }

        return $this->render('quantitelivree/new.html.twig', array(
            'quantitelivree' => $quantitelivree,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a quantitelivree entity.
     *
     * @Route("/{id}", name="quantitelivree_show")
     * @Method("GET")
     */
    public function showAction(Quantitelivree $quantitelivree)
    {
        $deleteForm = $this->createDeleteForm($quantitelivree);

        return $this->render('quantitelivree/show.html.twig', array(
            'quantitelivree' => $quantitelivree,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing quantitelivree entity.
     *
     * @Route("/{id}/edit", name="quantitelivree_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Quantitelivree $quantitelivree)
    {
        $deleteForm = $this->createDeleteForm($quantitelivree);
        $editForm = $this->createForm('AdminBundle\Form\QuantitelivreeType', $quantitelivree);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quantitelivree_edit', array('id' => $quantitelivree->getId()));
        }

        return $this->render('quantitelivree/edit.html.twig', array(
            'quantitelivree' => $quantitelivree,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a quantitelivree entity.
     *
     * @Route("/{id}", name="quantitelivree_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Quantitelivree $quantitelivree)
    {
        $form = $this->createDeleteForm($quantitelivree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($quantitelivree);
            $em->flush();
        }

        return $this->redirectToRoute('quantitelivree_index');
    }

    /**
     * Creates a form to delete a quantitelivree entity.
     *
     * @param Quantitelivree $quantitelivree The quantitelivree entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Quantitelivree $quantitelivree)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('quantitelivree_delete', array('id' => $quantitelivree->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
