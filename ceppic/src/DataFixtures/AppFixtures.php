<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Generator;
use Faker\Factory;

class AppFixtures extends Fixture
{

    private Generator $faker;

    public function __construct()
    {
        $this->faker = factory::create('fr-FR');
    }

    public function load(ObjectManager $manager): void
    {
        
        $categorie = new Categorie();
        $categorie->setTitre("gen");
        for ($i = 0; $i < 10; $i++) {
            $formation = new Formation();
            $formation->setTitre($this->faker->words(5, true));
            $formation->setDescription($this->faker->text());
            $formation->setCategorie($categorie);
            $manager->persist($formation);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
