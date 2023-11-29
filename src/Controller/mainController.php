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
        return $this->render('page/main/homepage.html.twig');
    }

    #[Route('/login', name: 'app_login')]
    public function loginpage(): Response
    {
        return $this->render('page/register/loginpage.html.twig');
    }
}