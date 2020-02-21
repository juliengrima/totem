<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $level = $em->getRepository('AppBundle:Level')->getlevels();
        $side = $em->getRepository('AppBundle:Side')->findAll();
        $society = $em->getRepository('AppBundle:Society')->findBy(array('id' => $level));

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'levels' => $level,
            'sides' => $side,
            'societies' => $society
        ));
    }
}
