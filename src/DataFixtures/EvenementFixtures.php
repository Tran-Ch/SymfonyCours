<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EvenementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Obtenir tous les utilisateurs et les histoires existantes
        $utilisateurs = $manager->getRepository(Utilisateur::class)->findAll();
        $evenements = $manager->getRepository(Evenement::class)->findAll();

        if (!$utilisateurs || !$evenements) {
            return; // Aucune donnée à lier
        }

        for ($i = 0; $i < 20; $i++) {
            $evenement = new Evenement();
            $evenement->setNom($faker->sentence(10));
            $evenement->setDateDebut($faker->dateTimeBetween('-1 year', 'now'));
            $evenement->setDateFin($faker->dateTimeBetween('-1 year', 'now'));
            $evenement->setLieu($faker->randomElement($utilisateurs));
            $evenement->setCategorie($faker->randomElement($evenements));
            $evenement->setPrix($faker->randomFloat(2, 0, 100));
            $evenement->setImage($faker->imageUrl());

            $manager->persist($evenement);
        }

        $manager->flush();
    }
}
