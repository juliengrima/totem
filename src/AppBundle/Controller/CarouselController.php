<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Carousel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Carousel controller.
 *
 */
class CarouselController extends Controller
{
    /**
     * Lists all carousel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $carousels = $em->getRepository('AppBundle:Carousel')->findAll();

        return $this->render('carousel/index.html.twig', array(
            'carousels' => $carousels,
        ));
    }

    public function RederingCarouselAction(){
        $em = $this->getDoctrine()->getManager();

        $carousels = $em->getRepository('AppBundle:Carousel')->findAll();

        return $this->render('carousel/rendering.html.twig', array(
            'carousels' => $carousels,
        ));
    }

    /**
     * Creates a new carousel entity.
     *
     */
    public function newAction(Request $request)
    {
        $carousel = new Carousel();
        $form = $this->createForm('AppBundle\Form\CarouselType', $carousel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /* KEEP PICTURE */
            $imageForm = $form->get ('media');
            $image = $imageForm->getData ();
            if (isset($image)){

                $image->setMediaName ($image);

                if (isset($image)) {

                    /* GIVE NAME TO THE FILE : PREG_REPLACE PERMITS THE REMOVAL OF SPACES AND OTHER UNDESIRABLE CHARACTERS*/
                    $image->setMediaName (preg_replace ('/\W/', '_', "picture_" . uniqid ()));

                    // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
                    $this->get ('media.interface')->mediaUpload ($image);
                }
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($carousel);
            $em->flush();

            return $this->redirectToRoute('carousel_index', array('id' => $carousel->getId()));
        }

        return $this->render('carousel/new.html.twig', array(
            'carousel' => $carousel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing carousel entity.
     *
     */
    public function editAction(Request $request, Carousel $carousel)
    {
        $deleteForm = $this->createDeleteForm($carousel);
        $editForm = $this->createForm('AppBundle\Form\CarouselType', $carousel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            /* KEEP PICTURE */
            $imageForm = $form->get ('media');
            $image = $imageForm->getData ();
            if (isset($image)){

                $image->setMediaName ($image);

                if (isset($image)) {

                    /* GIVE NAME TO THE FILE : PREG_REPLACE PERMITS THE REMOVAL OF SPACES AND OTHER UNDESIRABLE CHARACTERS*/
                    $image->setMediaName (preg_replace ('/\W/', '_', "picture_" . uniqid ()));

                    // On appelle le service d'upload de média (AppBundle/Services/mediaInterface)
                    $this->get ('media.interface')->mediaUpload ($image);
                }
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('carousel_edit', array('id' => $carousel->getId()));
        }

        return $this->render('carousel/edit.html.twig', array(
            'carousel' => $carousel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a carousel entity.
     *
     */
    public function deleteAction(Request $request, Carousel $carousel)
    {
        $form = $this->createDeleteForm($carousel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($carousel);
            $em->flush();
        }

        return $this->redirectToRoute('carousel_index');
    }

    /**
     * Creates a form to delete a carousel entity.
     *
     * @param Carousel $carousel The carousel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Carousel $carousel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carousel_delete', array('id' => $carousel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
