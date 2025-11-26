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

        $admin = $utilisateurs[0]; // tạm dùng user đầu tiên làm “tác giả hệ thống”

            // Hà Giang
            $haGiang = (new Story())
                ->setContenu("Hà Giang – Là où commence la route de la liberté ... (mô tả ngắn hoặc dài)")
                ->setUtilisateur($admin);
            $manager->persist($haGiang);

            // Sapa
            $sapa = (new Story())
                ->setContenu("Sapa – Là où les nuages rencontrent les traditions ...")
                ->setUtilisateur($admin);
            $manager->persist($sapa);

            // Mù Cang Chải
            $muCangChai = (new Story())
                ->setContenu("Mù Cang Chải – Le royaume des courbes dorées ...")
                ->setUtilisateur($admin);
            $manager->persist($muCangChai);
        
        for ($i = 0; $i < 20; $i++) {
            $story = new Story();
            $story->setContenu($faker->paragraphs(3, true)); // Plus de contenu réaliste
            $story->setUtilisateur($faker->randomElement($utilisateurs));

            // Ajouter des événements aléatoires (entre 0 et 3 événements par histoire)
            $evenements = $manager->getRepository(\App\Entity\Evenement::class)->findAll();
            if (!empty($evenements)) {
                $nbEvenements = mt_rand(0, min(3, count($evenements)));
                $selectedEvenements = $faker->randomElements($evenements, $nbEvenements);
                
                foreach ($selectedEvenements as $evenement) {
                    $story->addEvenement($evenement);
                }
            }
            
            $manager->persist($story);
        }

        $manager->flush();
    }
}
