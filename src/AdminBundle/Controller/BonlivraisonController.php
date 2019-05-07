<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Bonlivraison;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bonlivraison controller.
 *
 * @Route("bonlivraison")
 */
class BonlivraisonController extends Controller
{
    /**
     * Lists all bonlivraison entities.
     *
     * @Route("/", name="bonlivraison_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bonlivraisons = $em->getRepository('AdminBundle:Bonlivraison')->findAll();

        return $this->render('bonlivraison/index.html.twig', array(
            'bonlivraisons' => $bonlivraisons,
        ));
    }

    /**
     * Creates a new bonlivraison entity.
     *
     * @Route("/new", name="bonlivraison_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bonlivraison = new Bonlivraison();
        $form = $this->createForm('AdminBundle\Form\BonlivraisonType', $bonlivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bonlivraison);
            $em->flush();

            return $this->redirectToRoute('bonlivraison_index');
        }

        return $this->render('bonlivraison/new.html.twig', array(
            'bonlivraison' => $bonlivraison,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bonlivraison entity.
     *
     * @Route("/{id}", name="bonlivraison_show")
     * @Method("GET")
     */
    public function showAction(Bonlivraison $bonlivraison)
    {
        $deleteForm = $this->createDeleteForm($bonlivraison);

        return $this->render('bonlivraison/show.html.twig', array(
            'bonlivraison' => $bonlivraison,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bonlivraison entity.
     *
     * @Route("/{id}/edit", name="bonlivraison_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bonlivraison $bonlivraison)
    {
        $deleteForm = $this->createDeleteForm($bonlivraison);
        $editForm = $this->createForm('AdminBundle\Form\BonlivraisonType', $bonlivraison);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bonlivraison_edit', array('id' => $bonlivraison->getId()));
        }

        return $this->render('bonlivraison/edit.html.twig', array(
            'bonlivraison' => $bonlivraison,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bonlivraison entity.
     *
     * @Route("/{id}", name="bonlivraison_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bonlivraison $bonlivraison)
    {
        $form = $this->createDeleteForm($bonlivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bonlivraison);
            $em->flush();
        }

        return $this->redirectToRoute('bonlivraison_index');
    }

    /**
     * Creates a form to delete a bonlivraison entity.
     *
     * @param Bonlivraison $bonlivraison The bonlivraison entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bonlivraison $bonlivraison)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bonlivraison_delete', array('id' => $bonlivraison->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
