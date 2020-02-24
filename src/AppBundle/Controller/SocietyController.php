<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Society;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Society controller.
 *
 */
class SocietyController extends Controller
{
    /**
     * Lists all society entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $societies = $em->getRepository('AppBundle:Society')->findAll();
        $sides = $em->getRepository('AppBundle:Side')->findBy(array('id' => $societies));
        $levels = $em->getRepository('AppBundle:Level')->findBy(array('id' => $societies));

        return $this->render('society/index.html.twig', array(
            'societies' => $societies,
            'sides' => $sides,
            'levels' => $levels
        ));
    }

    /**
     * Creates a new society entity.
     *
     */
    public function newAction(Request $request)
    {
        $society = new Society();
        $form = $this->createForm('AppBundle\Form\SocietyType', $society);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /* KEEP PICTURE */
            $imageForm = $form->get ('media');
            $image = $imageForm->getData ();
            $image->setMediaName ($image);

            if (isset($image)) {

                /* GIVE NAME TO THE FILE : PREG_REPLACE PERMITS THE REMOVAL OF SPACES AND OTHER UNDESIRABLE CHARACTERS*/
                $image->setMediaName (preg_replace ('/\W/', '_', "picture_" . uniqid ()));

                // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
                $this->get ('media.interface')->mediaUpload ($image);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($society);
            $em->flush();

            return $this->redirectToRoute('society_index', array('id' => $society->getId()));
        }

        return $this->render('society/new.html.twig', array(
            'society' => $society,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing society entity.
     *
     */
    public function editAction(Request $request, Society $society)
    {
        $deleteForm = $this->createDeleteForm($society);
        $editForm = $this->createForm('AppBundle\Form\SocietyType', $society);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('society_index', array('id' => $society->getId()));
        }

        return $this->render('society/edit.html.twig', array(
            'society' => $society,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a society entity.
     *
     */
    public function deleteAction(Request $request, Society $society)
    {
        $form = $this->createDeleteForm($society);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($society);
            $em->flush();
        }

        return $this->redirectToRoute('society_index');
    }

    /**
     * Creates a form to delete a society entity.
     *
     * @param Society $society The society entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Society $society)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('society_delete', array('id' => $society->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
