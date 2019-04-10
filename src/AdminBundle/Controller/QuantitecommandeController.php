<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Quantitecommande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Quantitecommande controller.
 *
 * @Route("quantitecommande")
 */
class QuantitecommandeController extends Controller
{
    /**
     * Lists all quantitecommande entities.
     *
     * @Route("/", name="quantitecommande_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $quantitecommandes = $em->getRepository('AdminBundle:Quantitecommande')->findAll();

        return $this->render('quantitecommande/index.html.twig', array(
            'quantitecommandes' => $quantitecommandes,
        ));
    }

    /**
     * Creates a new quantitecommande entity.
     *
     * @Route("/new", name="quantitecommande_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $quantitecommande = new Quantitecommande();
        $form = $this->createForm('AdminBundle\Form\QuantitecommandeType', $quantitecommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quantitecommande);
            $em->flush();

            return $this->redirectToRoute('quantitecommande_show', array('id' => $quantitecommande->getId()));
        }

        return $this->render('quantitecommande/new.html.twig', array(
            'quantitecommande' => $quantitecommande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a quantitecommande entity.
     *
     * @Route("/{id}", name="quantitecommande_show")
     * @Method("GET")
     */
    public function showAction(Quantitecommande $quantitecommande)
    {
        $deleteForm = $this->createDeleteForm($quantitecommande);

        return $this->render('quantitecommande/show.html.twig', array(
            'quantitecommande' => $quantitecommande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing quantitecommande entity.
     *
     * @Route("/{id}/edit", name="quantitecommande_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Quantitecommande $quantitecommande)
    {
        $deleteForm = $this->createDeleteForm($quantitecommande);
        $editForm = $this->createForm('AdminBundle\Form\QuantitecommandeType', $quantitecommande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quantitecommande_edit', array('id' => $quantitecommande->getId()));
        }

        return $this->render('quantitecommande/edit.html.twig', array(
            'quantitecommande' => $quantitecommande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a quantitecommande entity.
     *
     * @Route("/{id}", name="quantitecommande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Quantitecommande $quantitecommande)
    {
        $form = $this->createDeleteForm($quantitecommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($quantitecommande);
            $em->flush();
        }

        return $this->redirectToRoute('quantitecommande_index');
    }

    /**
     * Creates a form to delete a quantitecommande entity.
     *
     * @param Quantitecommande $quantitecommande The quantitecommande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Quantitecommande $quantitecommande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('quantitecommande_delete', array('id' => $quantitecommande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
