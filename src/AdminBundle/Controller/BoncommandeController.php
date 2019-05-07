<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Boncommande;
use AdminBundle\Entity\Produit;
use AdminBundle\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Boncommande controller.
 *
 * @Route("boncommande")
 */
class BoncommandeController extends Controller
{
    /**
     * Lists all boncommande entities.
     *
     * @Route("/", name="boncommande_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $boncommandes = $em->getRepository('AdminBundle:Boncommande')->findAll();

        return $this->render('boncommande/index.html.twig', array(
            'boncommandes' => $boncommandes,
        ));
    }

    /**
     * Creates a new boncommande entity.
     *
     * @Route("/new", name="boncommande_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $boncommande = new Boncommande();
        $form = $this->createForm('AdminBundle\Form\BoncommandeType', $boncommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($boncommande);
            $em->flush();
            return $this->redirectToRoute('boncommande_index');
        }

        return $this->render('boncommande/new.html.twig', array(
            'boncommande' => $boncommande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a boncommande entity.
     *
     * @Route("/{id}", name="boncommande_show")
     * @Method("GET")
     */
    public function showAction(Boncommande $boncommande)
    {
        $deleteForm = $this->createDeleteForm($boncommande);

        return $this->render('boncommande/show.html.twig', array(
            'boncommande' => $boncommande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing boncommande entity.
     *
     * @Route("/{id}/edit", name="boncommande_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Boncommande $boncommande)
    {
        $deleteForm = $this->createDeleteForm($boncommande);
        $editForm = $this->createForm('AdminBundle\Form\BoncommandeType', $boncommande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boncommande_edit', array('id' => $boncommande->getId()));
        }

        return $this->render('boncommande/edit.html.twig', array(
            'boncommande' => $boncommande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a boncommande entity.
     *
     * @Route("/{id}", name="boncommande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Boncommande $boncommande)
    {
        $form = $this->createDeleteForm($boncommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($boncommande);
            $em->flush();
        }

        return $this->redirectToRoute('boncommande_index');
    }

    /**
     * Creates a form to delete a boncommande entity.
     *
     * @param Boncommande $boncommande The boncommande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Boncommande $boncommande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boncommande_delete', array('id' => $boncommande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
