<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class mainController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('page/main/home.html.twig');
    }

    #[Route('/sample', name: 'app_sample')]
    public function samplepage(): Response
    {
        return $this->render('page/main/sample.html.twig');
    }

    #[Route('/about', name: 'app_about')]
    public function aboutpage(): Response
    {
        return $this->render('page/main/about.html.twig');
    }

    #[Route('/login', name: 'app_login')]
    public function loginpage(): Response
    {
        return $this->render('page/register/login.html.twig');
    }

    #[Route('/signup', name: 'app_signup')]
    public function registerpage(): Response
    {
        return $this->render('page/register/signup.html.twig');
    }
}