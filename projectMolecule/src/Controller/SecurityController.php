<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * Authentification function
     * @Route("/login", name="adminLogin")
     */
    public function login(AuthenticationUtils $helper): Response
    {
        return $this->render('admin/adminLogin.html.twig', [
            // Last username wrote
            'last_username' => $helper->getLastUsername(),
            // Last error connection
            'error' => $helper->getLastAuthenticationError(),
        ]);
    }

    /**
     * @Route("/admin/logout", name="adminLogout")
     */
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }
}
