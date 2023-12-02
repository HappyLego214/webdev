<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    #[Route('/products/{slug}', name: 'app_products')]
    public function productspage(ProductRepository $productRepo, string $slug = null): Response
    {
        if ($slug == 'ASC') {
            $products = $productRepo->findBy([],['price' => $slug]);
        }
        else if ($slug == 'DESC') {
            $products = $productRepo->findBy([],['price' => $slug]);
        } else {
            $products = $productRepo->findAll();
        }

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
}