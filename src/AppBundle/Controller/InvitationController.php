<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Invitation;
use AppBundle\Form\InvitationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InvitationController extends Controller
{
    public function addAction(Request $request)
    {
        $invitation = new Invitation();
        $form = $this->createForm(InvitationType::class, $invitation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $invitation->setCode(rand(10000, 99999));

            $em = $this->getDoctrine()->getManager();
            $em->persist($invitation);
            $em->flush();

            $message = \Swift_Message::newInstance()
                ->setSubject($this->getParameter('invitation_email_subject'))
                ->setFrom($this->getParameter('invitation_email_from'))
                ->setTo($invitation->getEmail())
                ->setBody(
                    $this->renderView(
                        '@App/invitation/email.html.twig',
                        array(
                            'position' => $invitation->getRoles(),
                            'email'    => $invitation->getEmail(),
                            'code'     => $invitation->getCode()
                        )
                    ),
                    'text/html'
                )
            ;
            $this->get('mailer')->send($message);

            $this->addFlash(
                'notice',
                'Invitation has been sent!'
            );

            return $this->redirectToRoute('app_invitation_add');
        }

        return $this->render('@App/invitation/add.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
