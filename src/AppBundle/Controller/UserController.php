<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ChangeAvatar;
use AppBundle\Entity\ChangePassword;
use AppBundle\Entity\User;
use AppBundle\Form\AvatarType;
use AppBundle\Form\PasswordType;
use AppBundle\Form\RoleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function changePasswordAction(Request $request)
    {
        $changePassword = new ChangePassword();
        $form = $this->createForm(PasswordType::class, $changePassword);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $user = $em
                ->getRepository('AppBundle:User')
                ->find($this->getUser()->getId());

            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $changePassword->getPlainPassword());

            $user->setPassword($password);
            $em->flush();

            $this->addFlash(
                'notice',
                'Password has been changed!'
            );

            return $this->redirectToRoute('app_user_password_change');
        }

        return $this->render('@App/user/security/password_change.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function changeAvatarAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $user = $em
            ->getRepository('AppBundle:User')
            ->find($this->getUser()->getId());

        $changeAvatar = new ChangeAvatar();
        $form = $this->createForm(AvatarType::class, $changeAvatar);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $user->setAvatar($changeAvatar->getAvatar());
            $em->flush();

            $this->addFlash(
                'notice',
                'Avatar has been changed!'
            );

            return $this->redirectToRoute('app_user_avatar_change');
        }


        return $this->render('@App/user/security/avatar_change.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function changeRoleAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em
            ->getRepository('AppBundle:User')
            ->find($id);

        $form = $this->createForm(RoleType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $user->setRoles($user->transformRoles($user->getRoles()));
            $em->flush();

            $this->addFlash(
                'notice',
                'Role has been changed!'
            );

            $uri = $request->headers->get('referer');
            return $this->redirect($uri);
        }

        return $this->render('@App/user/security/role_change.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $user = $em
            ->getRepository('AppBundle:User')
            ->find($id);

        $em->remove($user);
        $em->flush();

        $uri = $request->headers->get('referer');
        return $this->redirect($uri);
    }

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em
            ->getRepository('AppBundle:User')
            ->findDrivers();

        return $this->render('@App/user/list.html.twig', array(
            'users' => $users
        ));
    }

    public function statisticsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em
            ->getRepository('AppBundle:User')
            ->findDrivers();

        return $this->render('@App/user/statistics.html.twig', array(
            'users' => $users
        ));
    }

    public function transportsAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $transports = $em
            ->getRepository('AppBundle:Transport')
            ->findBy([
                'userId' => $id,
            ]);

        return $this->render('@App/user/transport_all.twig', array(
            'transports' => $transports
        ));
    }

    public function browseAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em
            ->getRepository('AppBundle:User')
            ->findAll();

        return $this->render('@App/user/browse.twig', array(
            'users' => $users
        ));
    }
}
