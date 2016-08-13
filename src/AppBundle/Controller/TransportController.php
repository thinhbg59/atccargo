<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Transport;
use AppBundle\Form\TransportType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TransportController extends Controller
{
    public function addAction(Request $request)
    {
        $transport = new Transport();
        $form = $this->createForm(TransportType::class, $transport);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $transportQuantity = $em
                ->getRepository('AppBundle:Transport')
                ->findAll();
            $transportQuantity = count($transportQuantity);
            $multipler         = $this->getUser()->getMultipler();

            $identificator = $identificator = 'CGGE/'.date('M')[0].'000'.date('WdN').date('z')[0].$transportQuantity.'/'.date('isd');
            $score         = ($transport->getDistance() * $multipler) * ((100-$transport->getDamage()) / 100);

            $file = $transport->getScreenshot();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('screenshots_directory'),
                $fileName
            );

            $transport->setUserId($this->getUser()->getId());
            $transport->setIdentificator($identificator);
            $transport->setScore($score);
            $transport->setScreenshot($fileName);

            $em->persist($transport);
            $em->flush($transport);

            $this->addFlash(
                'notice',
                'Transport has been reported!'
            );

            return $this->redirectToRoute('app_transport_add');
        }

        return $this->render('@App/transport/add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function activateAction(Request $request, $id)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_BOSS')) {
            $em = $this->getDoctrine()->getManager();

            $transport = $em
                ->getRepository('AppBundle:Transport')
                ->find($id)
            ;

            $transport->setActive(1);
            $em->flush();

            $uri = $request->headers->get('referer');
            return $this->redirect($uri);
        }

        return $this->redirectToRoute('dashboard');
    }

    public function deactivateAction(Request $request, $id)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_BOSS')) {
            $em = $this->getDoctrine()->getManager();

            $transport = $em
                ->getRepository('AppBundle:Transport')
                ->find($id)
            ;

            $transport->setActive(0);
            $em->flush();

            $uri = $request->headers->get('referer');
            return $this->redirect($uri);
        }

        return $this->redirectToRoute('dashboard');
    }

    public function deleteAction(Request $request, $id)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_BOSS')) {
            $em = $this->getDoctrine()->getManager();

            $transport = $em
                ->getRepository('AppBundle:Transport')
                ->find($id)
            ;

            $em->remove($transport);
            $em->flush();

            $uri = $request->headers->get('referer');
            return $this->redirect($uri);
        }

        return $this->redirectToRoute('dashboard');
    }

    public function getAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transports = $em
            ->getRepository('AppBundle:Transport')
            ->findAllActiveBy($this->getUser()->getId());

        return $this->render('@App/user/transport_last.html.twig', array(
            'transports' => $transports
        ));
    }

    public function browseAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transports = $em
            ->getRepository('AppBundle:Transport')
            ->findAllNotActive();

        return $this->render('@App/transport/browse.html.twig', array(
            'transports' => $transports
        ));
    }
}
