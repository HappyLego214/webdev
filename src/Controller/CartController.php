<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function cart(ProductRepository $productRepo, OrderRepository $orderRepo): Response
    {
        $user = $this->getUser()->getId();

        $array = [];
        $products = [];

        $orders = $orderRepo->findBy(['userID' => $user]);
        foreach($orders as $item) {
            $productID = $item->getProductID();
            array_push($array, $productID);
        }

        foreach($array as $item) {
            array_push($products, $productRepo->findBy(['id' => $item]));
        }

        return $this->render('page/main/cart.html.twig', [
            'products' => $products,
            'orders' => $orders,
        ]);
    }

//    #[Route('/')]
//    public function addCart(): Response
//    {
//
//    }

}
