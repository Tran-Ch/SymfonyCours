<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'quiz')]
    public function index(): Response
    {
        $questions = [
            ["q" => "En voyage, qu’est-ce qui vous enthousiasme le plus ?", "options" => [
                ["val"=>"adventure","label"=>"Explorer la nature grandiose 🧗"],
                ["val"=>"culture","label"=>"Découvrir la culture, l’histoire et la gastronomie 🍜"],
                ["val"=>"relax","label"=>"Se détendre et profiter du calme 🌊"]
            ]],
            ["q"=>"Quelle activité préférez-vous ?", "options"=>[
                ["val"=>"adventure","label"=>"Trekking, plongée, aventures 🚴"],
                ["val"=>"culture","label"=>"Participer à des festivals, goûter des spécialités 🎎"],
                ["val"=>"relax","label"=>"Spa, resort, détente 🏖️"]
            ]],
            ["q"=>"Avec qui voyagez-vous le plus souvent ?", "options"=>[
                ["val"=>"adventure","label"=>"Un groupe d’amis aventuriers 🤟"],
                ["val"=>"culture","label"=>"Famille / proches 👨‍👩‍👧‍👦"],
                ["val"=>"relax","label"=>"Partenaire pour un séjour romantique 💕"]
            ]],
            ["q"=>"Comment aimez-vous garder un souvenir de votre voyage ?", "options"=>[
                ["val"=>"adventure","label"=>"Photos de défis et aventures 📸"],
                ["val"=>"culture","label"=>"Histoires culturelles et culinaires 🍲"],
                ["val"=>"relax","label"=>"Moments de détente luxueux 🛎️"]
            ]],
            ["q"=>"Quel climat préférez-vous en voyage ?", "options"=>[
                ["val"=>"adventure","label"=>"Le froid des montagnes ❄️"],
                ["val"=>"culture","label"=>"Tempéré et agréable 🌤️"],
                ["val"=>"relax","label"=>"Soleil, mer et sable ☀️"]
            ]],
            ["q"=>"Quel type de nourriture cherchez-vous en voyage ?", "options"=>[
                ["val"=>"adventure","label"=>"Plats insolites et épicés 🌶️"],
                ["val"=>"culture","label"=>"Cuisine traditionnelle locale 🍛"],
                ["val"=>"relax","label"=>"Fruits de mer et gastronomie de resort 🦞"]
            ]],
            ["q"=>"Quelle est la durée idéale de votre voyage ?", "options"=>[
                ["val"=>"adventure","label"=>"3–5 jours d’aventures intenses 🗺️"],
                ["val"=>"culture","label"=>"2–4 jours tranquilles 🏮"],
                ["val"=>"relax","label"=>"3–7 jours de détente 🌺"]
            ]],
            ["q"=>"Quel moyen de transport préférez-vous ?", "options"=>[
                ["val"=>"adventure","label"=>"Moto, jeep, petit bateau 🛵"],
                ["val"=>"culture","label"=>"Autocar, train 🚂"],
                ["val"=>"relax","label"=>"Avion, voiture privée ✈️"]
            ]],
            ["q"=>"Quelle est votre plus grande crainte en voyage ?", "options"=>[
                ["val"=>"adventure","label"=>"Un voyage ennuyeux 😐"],
                ["val"=>"culture","label"=>"Manquer la culture locale ✍️"],
                ["val"=>"relax","label"=>"Un service médiocre 🏚️"]
            ]],
            ["q"=>"Si vous ne pouviez choisir qu’une expérience ?", "options"=>[
                ["val"=>"adventure","label"=>"Randonnée, plongée, grottes 🏞️"],
                ["val"=>"culture","label"=>"Marchés, gastronomie, artisanat 🎭"],
                ["val"=>"relax","label"=>"Spa et coucher de soleil 🌅"]
            ]]
        ];

        $results = [
            "adventure" => [
                "nord"   => ["title"=>"Aventure incroyable - Nord", "places"=>"Hà Giang, Fansipan, Ninh Bình", "img"=>"img/adventure_nord.jpg"],
                "centre" => ["title"=>"Aventure incroyable - Centre", "places"=>"Sơn Đoòng, Phong Nha, Bạch Mã", "img"=>"img/adventure_centre.jpg"],
                "sud"   => ["title"=>"Aventure incroyable - Sud", "places"=>"Côn Đảo, Nam Cát Tiên, forêt d’U Minh", "img"=>"img/adventure_sud.jpg"],
            ],
            "culture" => [
                "nord"   => ["title"=>"Découverte culturelle - Nord", "places"=>"Hanoï, Bắc Ninh, Sa Pa", "img"=>"img/culture_nord.jpg"],
                "centre" => ["title"=>"Découverte culturelle - Centre", "places"=>"Huế, Hội An, Hauts Plateaux", "img"=>"img/culture_centre.jpg"],
                "sud"   => ["title"=>"Découverte culturelle - Sud", "places"=>"Marché flottant de Cái Răng, Saïgon, Đình Bình Thủy", "img"=>"img/culture_sud.jpg"],
            ],
            "relax" => [
                "nord"   => ["title"=>"Séjour détente - Nord", "places"=>"Tam Đảo, Hạ Long, sources chaudes de Thanh Thủy", "img"=>"img/relax_nord.jpg"],
                "centre" => ["title"=>"Séjour détente - Centre", "places"=>"Đà Nẵng, Nha Trang, Quy Nhơn", "img"=>"img/relax_centre.jpg"],
                "sud"   => ["title"=>"Séjour détente - Sud", "places"=>"Phú Quốc, Mũi Né, Vũng Tàu", "img"=>"img/relax_sud.jpg"],
            ],
        ];

        return $this->render('quiz/index_quiz.html.twig', [
            'questions' => $questions,
            'results' => $results
        ]);
    }
}

