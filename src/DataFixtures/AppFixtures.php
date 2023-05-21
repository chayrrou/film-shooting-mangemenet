<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Factory\FilmFactory;
use App\Factory\LieuFactory;
use App\Factory\RealisateurFactory;
use App\Factory\SocieteDeProductionFactory;
use App\Factory\TournageFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        FilmFactory::createMany(5);
        LieuFactory::createMany(5);
        RealisateurFactory::createMany(5);
        SocieteDeProductionFactory::createMany(5);
        TournageFactory::createMany(5);

        $manager->flush();
    }
}
