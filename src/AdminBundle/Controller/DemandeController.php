<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Demande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Demande controller.
 *
 * @Route("demande")
 */
class DemandeController extends Controller
{
    /**
     * Lists all demande entities.
     *
     * @Route("/", name="demande_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository('AdminBundle:Demande')->findAll();

        return $this->render('demande/index.html.twig', array(
            'demandes' => $demandes,
        ));
    }

    /**
     * Creates a new demande entity.
     *
     * @Route("/new", name="demande_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $demande = new Demande();
        $form = $this->createForm('AdminBundle\Form\DemandeType', $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            return $this->redirectToRoute('demande_index');
        }

        return $this->render('demande/new.html.twig', array(
            'demande' => $demande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demande entity.
     *
     * @Route("/{id}", name="demande_show")
     * @Method("GET")
     */
    public function showAction(Demande $demande)
    {
        $deleteForm = $this->createDeleteForm($demande);

        return $this->render('demande/show.html.twig', array(
            'demande' => $demande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing demande entity.
     *
     * @Route("/{id}/edit", name="demande_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Demande $demande)
    {
        $deleteForm = $this->createDeleteForm($demande);
        $editForm = $this->createForm('AdminBundle\Form\DemandeType', $demande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demande_edit', array('id' => $demande->getId()));
        }

        return $this->render('demande/edit.html.twig', array(
            'demande' => $demande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a demande entity.
     *
     * @Route("/{id}", name="demande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Demande $demande)
    {
        $form = $this->createDeleteForm($demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demande);
            $em->flush();
        }

        return $this->redirectToRoute('demande_index');
    }

    /**
     * Creates a form to delete a demande entity.
     *
     * @param Demande $demande The demande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Demande $demande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demande_delete', array('id' => $demande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
