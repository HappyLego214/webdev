<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Product;
use App\Form\AddOrderType;
use App\Form\AddProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    #[Route('/browse/{slug}', name: 'app_products')]
    public function productPage(ProductRepository $productRepo, string $slug = null): Response
    {
        // REFACTOR SOON
        $sortList = [
            ['name' => 'Popularity', 'link' => ''],
            ['name' => 'High Price', 'link' => '/browse/desc'],
            ['name' => 'Low Price', 'link' => '/browse/asc'],
            ['name' => 'High Reviews', 'link' => '/browse/high'],
            ['name' => 'Low Reviews', 'link' => '/browse/low'],
        ];

        $categories = [
            'Vape_Pen',
            'Box_Mod',
            'POD',
            'Disposable',
            'Cigalike',
        ];

        // REFACTOR SOON

        if ($slug == 'asc') {
            $products = $productRepo->findBy([], ['price' => $slug]);
        } else if ($slug == 'desc') {
            $products = $productRepo->findBy([], ['price' => $slug]);
        } else if ($slug == 'high') {
            $products = $productRepo->findBy([], ['rating' => 'DESC']);
        } else if ($slug == 'low') {
            $products = $productRepo->findBy([], ['rating' => 'ASC']);
        } else if ($slug != null) {
            $products = $productRepo->findBy(['category' => $slug]);
        } else {
            $products = $productRepo->findAll();
        }

        return $this->render('page/main/products.html.twig',
            [
                'products' => $products,
                'categories' => $categories,
                'sortList' => $sortList,
            ]);
    }

    #[Route('/addProduct', name: 'app_addProduct')]
    public function addProduct(EntityManagerInterface $entityManager, Request $request): Response
    {
        $product = new Product();
        $product->setName('');
        $product->setDescription('');
        $product->setPrice(0);
        $product->setQuantity(0);
        $product->setCategory('');
        $form = $this->createForm(AddProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password

            $entityManager->persist($product);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_products');
        }

        return $this->render('page/main/addproduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/browse/products/{id}', name: 'app_showProduct')]
    public function showProduct(
        $id, EntityManagerInterface $entityManager, Request $request, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($id);
        $user = $this->getUser()->getId();

        $order = new Order();
        $order->setProductID((int)$id);
        $order->setUserID($user);
        $order->setPrice($product->getPrice());
        $order->setQuantity(1);
        $form = $this->createForm(AddOrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password

            $entityManager->persist($order);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_cart');
        }

        return $this->render('page/main/item.html.twig',[
            'form' => $form->createView(),
            'product' => $product,
        ]);
    }
}