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
        $level = $em->getRepository('AppBundle:Level')->findAll(array('id' =>'ASC'));

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'levels' => $level,
        ));
    }
}
