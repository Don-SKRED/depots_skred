<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/connexion", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
             return $this->redirectToRoute("user_index");

        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error,]);
    }

    /**
     * @Route("/Deconnexion", name="app_logout")
     */
    public function logout()
    {
        //delete session
        //$this->get('security.token_storage')->setToken(null);
        //$request->getSession()->invalidate();
        //$url = $this->get('router')->generate('fos_user_security_login');
        //return new RedirectResponse($url);

        return $this->redirectToRoute("app_login");
       // throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');

    }
}
