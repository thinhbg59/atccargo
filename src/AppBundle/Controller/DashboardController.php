<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();
        $transports = $em
            ->getRepository('AppBundle:Transport')
            ->findFiveActiveBy($this->getUser()->getId());

        return $this->render('@App/dashboard.html.twig', array(
            'transports' => $transports,
        ));
    }
}
