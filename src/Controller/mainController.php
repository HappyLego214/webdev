<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class mainController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homePage(): Response
    {
        return $this->render('page/main/home.html.twig');
    }

    #[Route('/profile/{slug}', name: 'app_profile')]
    public function profilePage($slug, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($slug);

        return $this->render('page/profile/profile.html.twig');
    }

    #[Route('/admin', name: 'app_admin')]
    public function adminpage(): Response
    {
        dd('check');
    }

    #[Route('/sample', name: 'app_sample')]
    public function samplePage(): Response
    {
        return $this->render('page/main/sample.html.twig');
    }

    #[Route('/about', name: 'app_about')]
    public function aboutPage(): Response
    {
        return $this->render('page/main/about.html.twig');
    }
}