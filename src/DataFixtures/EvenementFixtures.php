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

        // Récupérer tous les utilisateurs existants
        $utilisateurs = $manager->getRepository(Utilisateur::class)->findAll();

        // Récupérer tous les événements existants (inutile ici, peut être supprimé)
        $evenements = $manager->getRepository(Evenement::class)->findAll();

        if (!$utilisateurs || !$evenements) {
            return; // Aucune donnée à associer
        }

        for ($i = 0; $i < 20; $i++) {
            $evenement = new Evenement();
            $evenement->setNom($faker->sentence(10));
            $evenement->setDateDebut($faker->dateTimeBetween('-1 year', 'now'));
            $evenement->setDateFin($faker->dateTimeBetween('-1 year', 'now'));

            // ⚠️ Correction : lieu et catégorie sont des chaînes de caractères, pas des objets
            $evenement->setLieu($faker->city);
            $evenement->setCategorie($faker->randomElement(['Musique', 'Sport', 'Culture', 'Art']));

            $evenement->setPrix($faker->randomFloat(2, 0, 100));
            $evenement->setImage($faker->imageUrl());

            $manager->persist($evenement);
        }

        $manager->flush();
    }
}