<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    public function showAction()
    {
        return $this->render('@App/user/profile/show.html.twig');
    }
}
