<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use App\Factory\ProductFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class ProductsFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        ProductFactory::createMany(10);
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group2'];
    }
}
