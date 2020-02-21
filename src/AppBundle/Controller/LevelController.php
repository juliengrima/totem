<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Level;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Level controller.
 *
 */
class LevelController extends Controller
{
    /**
     * Lists all level entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $levels = $em->getRepository('AppBundle:Level')->getlevels();

        return $this->render('level/index.html.twig', array(
            'levels' => $levels,
        ));
    }

    /**
     * Creates a new level entity.
     *
     */
    public function newAction(Request $request)
    {
        $level = new Level();
        $form = $this->createForm('AppBundle\Form\LevelType', $level);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($level);
            $em->flush();

            return $this->redirectToRoute('level_index', array('id' => $level->getId()));
        }

        return $this->render('level/new.html.twig', array(
            'level' => $level,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing level entity.
     *
     */
    public function editAction(Request $request, Level $level)
    {
        $deleteForm = $this->createDeleteForm($level);
        $editForm = $this->createForm('AppBundle\Form\LevelType', $level);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('level_index', array('id' => $level->getId()));
        }

        return $this->render('level/edit.html.twig', array(
            'level' => $level,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a level entity.
     *
     */
    public function deleteAction(Request $request, Level $level)
    {
        $form = $this->createDeleteForm($level);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($level);
            $em->flush();
        }

        return $this->redirectToRoute('level_index');
    }

    /**
     * Creates a form to delete a level entity.
     *
     * @param Level $level The level entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Level $level)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('level_delete', array('id' => $level->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
