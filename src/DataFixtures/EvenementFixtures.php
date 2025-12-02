<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EvenementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Helper nhỏ để tạo DateTime nhanh
        $d = fn(string $date) => new \DateTime($date);

        /*
         * TẤT CẢ ảnh đều nằm trong: public/Image
         * Trường image trong DB chỉ lưu tên file,
         * ví dụ: "Tet-NouvelAn.jpg"
         *
         * Ở Twig dùng:
         *     <img src="{{ asset('Image/' ~ evenement.image) }}">
         */

        $data = [
            // ========= BẮC – FESTIVALS / CULTURE =========
            [
                'nom'       => 'Tết 2026 – Nouvel an lunaire',
                'debut'     => '2026-02-17 09:00',
                'fin'       => '2026-02-22 22:00',
                'lieu'      => 'Buôn Ma Thuột',
                'categorie' => 'festival',
                'prix'      => 25,
                'image'     => 'Tet-NouvelAn.jpg',
            ],
            [
                'nom'       => 'Fête de la mi-automne',
                'debut'     => '2025-10-06 18:00',
                'fin'       => '2025-10-07 23:00',
                'lieu'      => 'Ho Chi Minh',
                'categorie' => 'festival',
                'prix'      => 0,
                'image'     => 'FeteMiAutomne.jpg',
            ],
            [
                'nom'       => 'La saison des fleurs de sarrasin',
                'debut'     => '2025-12-06 06:00',
                'fin'       => '2025-12-07 18:00',
                'lieu'      => 'Hà Giang',
                'categorie' => 'nature',
                'prix'      => 0,
                'image'     => 'Fleurs-de-sarrasin.jpg',
            ],
            [
                'nom'       => 'Workshop Đông Hồ',
                'debut'     => '2025-11-15 15:00',
                'fin'       => '2025-11-15 18:00',
                'lieu'      => 'Ân Kinh, Bắc Ninh',
                'categorie' => 'atelier',
                'prix'      => 45,
                'image'     => 'Workshop-Dong-Ho.jpg',
            ],
            [
                'nom'       => 'Journée culturelle du Nord-Ouest 2026',
                'debut'     => '2026-06-10 09:00',
                'fin'       => '2026-06-12 18:00',
                'lieu'      => 'Điện Biên - Hòa Bình - Hà Nội',
                'categorie' => 'culture',
                'prix'      => 20,
                'image'     => 'Journee-culturelle-du-Nord-Ouest.jpg',
            ],

            // ========= TRUNG – FESTIVALS / FEUX D’ARTIFICE =========
            [
                'nom'       => 'Festival Huế',
                'debut'     => '2026-06-04 20:00',
                'fin'       => '2026-06-14 21:00',
                'lieu'      => 'Huế',
                'categorie' => 'festival',
                'prix'      => 50,
                'image'     => 'Festival-Hue.jpg',
            ],
            [
                'nom'       => 'Festival international de feux d\'artifice de Đà Nẵng',
                'debut'     => '2026-05-13 20:00',
                'fin'       => '2026-05-14 23:00',
                'lieu'      => 'Đà Nẵng',
                'categorie' => 'festival',
                'prix'      => 40,
                'image'     => 'Festival-de-feux-d-artifice.jpg',
            ],
            [
                'nom'       => 'Festival du café à Buôn Ma Thuột',
                'debut'     => '2026-03-10 09:00',
                'fin'       => '2026-03-14 21:00',
                'lieu'      => 'Buôn Ma Thuột',
                'categorie' => 'festival',
                'prix'      => 35,
                'image'     => 'Festival-du-cafe.jpg',
            ],
            [
                'nom'       => 'Initiation à la poterie traditionnelle vietnamienne',
                'debut'     => '2025-12-10 15:30',
                'fin'       => '2025-12-10 18:00',
                'lieu'      => 'Bát Tràng - Hà Nội',
                'categorie' => 'atelier',
                'prix'      => 30,
                'image'     => 'la-poterie-traditionnelle.jpg',
            ],

            // ========= NAM – ATELIERS / ARTISANAT =========
            [
                'nom'       => 'Expérience culturelle : teinture artisanale de brocart',
                'debut'     => '2025-12-14 09:30',
                'fin'       => '2025-12-14 17:00',
                'lieu'      => 'Lâm Đồng',
                'categorie' => 'atelier',
                'prix'      => 45,
                'image'     => 'tissu-brocart.jpg',
            ],
            [
                'nom'       => 'Initiation à l’art des lanternes vietnamiennes à Hội An',
                'debut'     => '2026-01-10 14:30',
                'fin'       => '2026-01-10 17:00',
                'lieu'      => 'Hội An - Đà Nẵng',
                'categorie' => 'atelier',
                'prix'      => 30,
                'image'     => 'L-art-des-lanternes.jpg',
            ],
        ];

        foreach ($data as $row) {
            $e = new Evenement();
            $e->setNom($row['nom']);
            $e->setDateDebut($d($row['debut']));
            $e->setDateFin($d($row['fin']));
            $e->setLieu($row['lieu']);
            $e->setCategorie($row['categorie']);
            $e->setPrix($row['prix']);
            $e->setImage($row['image']);

            $manager->persist($e);
        }

        $manager->flush();
    }
}
