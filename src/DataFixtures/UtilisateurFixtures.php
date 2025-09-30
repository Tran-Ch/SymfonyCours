<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class UtilisateurFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;
    private \Faker\Generator $faker;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
        $this->faker = Factory::create('fr_FR');
    }
    
    public function load(ObjectManager $manager): void
    {
        try {
            // 1. Création de l'administrateur
            $this->createAdmin($manager);
            
            // 2. Création des utilisateurs normaux
            $this->createRegularUsers($manager, 10);
            
            // 3. Sauvegarde finale
            $manager->flush();
        } catch (\Exception $e) {
            throw new \RuntimeException(sprintf('Erreur lors du chargement des fixtures : %s', $e->getMessage()), 0, $e);
        }
    }
    
    private function createAdmin(ObjectManager $manager): void
    {
        $admin = new Utilisateur();
        $adminEmail = 'admin@example.com';
        
        $admin->setEmail($adminEmail);
        $admin->setPassword($this->passwordHasher->hashPassword(
            $admin,
            'Admin123!'
        ));
        $admin->setRoles(['ROLE_ADMIN']);
        
        $manager->persist($admin);
        $this->addReference('admin', $admin);
        $manager->flush(); // Flush immédiat pour l'admin
    }
    
    private function createRegularUsers(ObjectManager $manager, int $count): void
    {
        $batchSize = 5;
        
        for ($i = 1; $i <= $count; $i++) {
            $user = new Utilisateur();
            
            // Génération d'un email unique
            $user->setEmail(sprintf('user%d@example.com', $i));
            
            // Génération d'un mot de passe sécurisé
            $password = sprintf('User%d@%s', $i, bin2hex(random_bytes(3)));
            $user->setPassword($this->passwordHasher->hashPassword($user, $password));
            
            // 30% de chance d'avoir le rôle éditeur
            if ($this->faker->boolean(30)) {
                $user->setRoles(['ROLE_EDITOR']);
            }
            
            $manager->persist($user);
            $this->addReference('user_' . $i, $user);
            
            // Gestion des lots (batch)
            if (($i % $batchSize) === 0) {
                $manager->flush();
                $manager->clear();
            }
        }
    }
}