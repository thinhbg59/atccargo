<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function loginAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_dashboard');
        }

        $authUtils = $this->get('security.authentication_utils');

        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('@App/user/login/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'        => $error
        ));
    }
}
