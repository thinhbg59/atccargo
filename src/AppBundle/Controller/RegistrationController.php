<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Invitation;
use AppBundle\Entity\User;
use AppBundle\Form\RegistrationType;
use AppBundle\Form\VerificationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    public function registerAction(Request $request)
    {
        $invitation = $this->get('session')->get('invitation');
        if (!isset($invitation)) {
            return $this->redirectToRoute('app_user_register_verification');
        }

        $em = $this->getDoctrine()->getManager();
        // Merge deatched entity to EntityManager
        $invitation = $em->merge(end($invitation));

        $invitation = $em
            ->getRepository('AppBundle:Invitation')
            ->findBy(array(
                'email' => $invitation->getEmail(),
                'code'  => $invitation->getCode()
            ))
        ;

        if (empty($invitation)) {
            return $this->redirectToRoute('app_user_register_verification');
        }

        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setRoles('ROLE_BOSS');

            $em->persist($user);
            $em->flush();
            $this->get('session')->clear();

            $this->addFlash(
                'notice',
                'Account has been created!'
            );

            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('@App/user/registration/register.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function verificateAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_dashboard');
        }

        $invitation = $this->get('session')->get('invitation');
        if (isset($invitation)) {
            return $this->redirectToRoute('app_user_register');
        }

        $invitation = new Invitation();
        $form = $this->createForm(VerificationType::class, $invitation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $invitation = $em
                ->getRepository('AppBundle:Invitation')
                ->findBy(array(
                    'email' => $invitation->getEmail(),
                    'code'  => $invitation->getCode()
                ));

            if (empty($invitation)) {
                $this->addFlash(
                    'error',
                    'Email address or code is incorrect!'
                );

                return $this->redirectToRoute('app_user_register_verification');
            }

            $em->detach((object)$invitation);
            $this->get('session')->set('invitation', $invitation);

            return $this->redirectToRoute('app_user_register');
        }
        
        return $this->render('@App/user/registration/verification.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
