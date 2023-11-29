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

    #[Route('/products', name: 'app_products')]
    public function productspage(): Response
    {
        $products = [
            ['title' => 'Big Drip', 'price' => '100' ],
            ['title' => 'Elf Bar', 'price' => '75' ],
            ['title' => 'SKE', 'price' => '90' ],
            ['title' => 'RAD', 'price' => '150' ],
            ['title' => 'Loop', 'price' => '50' ],
        ];

        return $this->render('page/main/products.html.twig',
    [
        'products' => $products,
    ]);
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