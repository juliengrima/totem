<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Side;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Side controller.
 *
 */
class SideController extends Controller
{
    /**
     * Lists all side entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sides = $em->getRepository('AppBundle:Side')->findAll();

        return $this->render('side/index.html.twig', array(
            'sides' => $sides,
        ));
    }

    /**
     * Creates a new side entity.
     *
     */
    public function newAction(Request $request)
    {
        $side = new Side();
        $form = $this->createForm('AppBundle\Form\SideType', $side);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($side);
            $em->flush();

            return $this->redirectToRoute('side_index', array('id' => $side->getId()));
        }

        return $this->render('side/new.html.twig', array(
            'side' => $side,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing side entity.
     *
     */
    public function editAction(Request $request, Side $side)
    {
        $deleteForm = $this->createDeleteForm($side);
        $editForm = $this->createForm('AppBundle\Form\SideType', $side);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('side_index', array('id' => $side->getId()));
        }

        return $this->render('side/edit.html.twig', array(
            'side' => $side,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a side entity.
     *
     */
    public function deleteAction(Request $request, Side $side)
    {
        $form = $this->createDeleteForm($side);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($side);
            $em->flush();
        }

        return $this->redirectToRoute('side_index');
    }

    /**
     * Creates a form to delete a side entity.
     *
     * @param Side $side The side entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Side $side)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('side_delete', array('id' => $side->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
