<?php

namespace App\DataFixtures;

use App\Entity\Story;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class StoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Obtenir tous les utilisateurs et les histoires existantes
        $utilisateurs = $manager->getRepository(Utilisateur::class)->findAll();

        if (!$utilisateurs) {
            return; // Aucune donnée à lier
        }

        for ($i = 0; $i < 20; $i++) {
            $story = new Story();
            $story->setContenu($faker->sentence(10));
            $story->setAuteurld($faker->randomElement($utilisateurs));

            $manager->persist($story);
        }

        $manager->flush();
    }
}
