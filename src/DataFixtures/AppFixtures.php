<?php

namespace App\DataFixtures;

use App\Entity\Clinton;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    private Generator $faker;
    public function __construct()
    {
       $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {   
        for ($i=0; $i <=50 ; $i++) { 
            # code...
            $clinton = new Clinton();
            $clinton->setName($this->faker->word())
                 ->setFirstName($this->faker->word())
                 ->setAges(mt_rand(0, 100))
                 ->setImage($this->faker->word(30))
                 ->setSex($this->faker->word(3))
                 ->setAdress($this->faker->word(5))
                 ->setMail($this->faker->word());
     
             $manager->persist($clinton);
        }
      
        $manager->flush();
    }
}
