<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function selectAction()
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_DEMO')) {
            return $this->redirectToRoute('app_dashboard');
        }

        return $this->redirectToRoute('app_user_login');
    }
}
