<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Story;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Obtenir tous les utilisateurs et les histoires existantes
        $utilisateurs = $manager->getRepository(Utilisateur::class)->findAll();
        $stories = $manager->getRepository(Story::class)->findAll();

        if (!$utilisateurs || !$stories) {
            return; // Aucune donnée à lier
        }

        for ($i = 0; $i < 20; $i++) {
            $comment = new Comment();
            $comment->setText($faker->sentence(10));
            $comment->setDate($faker->dateTimeBetween('-1 year', 'now'));
            $comment->setUtilisateur($faker->randomElement($utilisateurs));
            $comment->setStory($faker->randomElement($stories));

            $manager->persist($comment);
        }

        $manager->flush();
    }
}
