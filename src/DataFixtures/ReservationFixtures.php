<?php

namespace App\DataFixtures;

use App\Entity\Reservation;
use App\Entity\Utilisateur;
use App\Entity\Evenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Obtenir tous les utilisateurs et événements existants
        $utilisateurs = $manager->getRepository(Utilisateur::class)->findAll();
        $evenements = $manager->getRepository(Evenement::class)->findAll();

        if (!$utilisateurs || !$evenements) {
            return; // Aucune donnée à lier
        }

        for ($i = 0; $i < 20; $i++) {
            $reservation = new Reservation();
            $reservation->setDateReservation($faker->dateTimeBetween('-1 year', 'now'));
            $reservation->setUtilisateur($faker->randomElement($utilisateurs));
            $reservation->setEvenement($faker->randomElement($evenements));

            $manager->persist($reservation);
        }

        $manager->flush();
    }
}
