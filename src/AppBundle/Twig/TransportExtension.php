<?php

namespace AppBundle\Twig;

use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class TransportExtension extends \Twig_Extension
{
    protected $doctrine;
    protected $container;
    
    public function __construct(RegistryInterface $doctrine, ContainerInterface $container)
    {
        $this->doctrine = $doctrine;
        $this->container = $container;
    }

    public function getNotifications()
    {
        $em = $this->doctrine->getManager();

        $transports = $em
            ->getRepository('AppBundle:Transport')
            ->findAllNotActive();

        if (count($transports) < 1) {
            return false;
        }

        return true;
    }
    
    public function getStatistics()
    {
        $em = $this->doctrine->getManager();

        $token = $this->container->get('security.token_storage')->getToken();

        if (!is_object($token)) {
            return null;
        }

        if (is_object($token->getUser())) {
            $money = $em
                ->getRepository('AppBundle:User')
                ->getMoney($token->getUser()->getId());

            $transportsQuantity = $em
                ->getRepository('AppBundle:User')
                ->getTransportsQuantity($token->getUser()->getId());

            $distance = $em
                ->getRepository('AppBundle:User')
                ->getDistance($token->getUser()->getId());

            $fuel = $em
                ->getRepository('AppBundle:User')
                ->getFuel($token->getUser()->getId());

            if ($money == null) {
                $money = 0;
            }

            if ($distance == null) {
                $distance = 0;
            }

            if ($fuel == null) {
                $fuel = 0;
            }

            return array(
                'transportsQuantity' => $transportsQuantity,
                'money'      => $money,
                'distance'   => $distance,
                'fuel'       => $fuel
            );
        }
    }

    public function getGlobals()
    {
        return array(
            'notifications'  => [
                'transports' => $this->getNotifications()
            ],
            'statistics'     => $this->getStatistics()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'transport';
    }
}
