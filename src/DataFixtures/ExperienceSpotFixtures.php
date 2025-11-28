<?php

namespace App\DataFixtures;

use App\Entity\ExperienceSpot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExperienceSpotFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // ==========================
        // 1. Hà Giang
        // ==========================
        $haGiang = new ExperienceSpot();
        $haGiang
            ->setTitle('Hà Giang – Là où commence la route de la liberté')
            ->setSlug('ha-giang')
            ->setRegion('nord')
            ->setCategory('incroyable')
            ->setImageFilename('hagiang.jpg')
            ->setShortDescription(<<<'TXT'
Un voyage immersif au cœur du Nord extrême du Vietnam
À l’extrême Nord du Vietnam, là où les montagnes semblent toucher le ciel et où les routes se perdent dans les nuages, se trouve Hà Giang — une terre sauvage, majestueuse et profondément humaine. Ici, chaque virage raconte une histoire, chaque vallée révèle un secret, et chaque rencontre laisse une empreinte durable. Hà Giang n’est pas seulement une destination : c’est une sensation, un souffle de liberté, un appel irrésistible à l’aventure.
🌄 Un royaume de montagnes et de lumière
Dès les premiers kilomètres, Hà Giang dévoile un paysage spectaculaire, sculpté par le temps et la nature.
Le col de Mã Pì Lèng, considéré comme l’un des plus beaux du Vietnam, serpente entre des parois rocheuses vertigineuses. Depuis son sommet, le regard plonge dans un canyon profond où la rivière Nho Quế, d’un vert émeraude hypnotisant, glisse silencieusement entre les falaises.
Ce contraste entre la puissance des montagnes et la douceur de la rivière crée une harmonie visuelle rare, presque irréelle.
À mesure que l’on avance, les montagnes se succèdent, les vallées s’ouvrent, et la lumière change à chaque instant, offrant un spectacle naturel en perpétuelle transformation.
🏞 Le plateau de Đồng Văn – Un monde minéral fascinant
En pénétrant dans le plateau karstique de Đồng Văn, classé par l’UNESCO, on entre dans un univers minéral unique.
Les formations rocheuses, vieilles de centaines de millions d’années, dessinent un paysage lunaire où les villages semblent suspendus entre ciel et terre.
Les maisons en pierre, les champs de maïs accrochés aux pentes abruptes et les sentiers sinueux témoignent de la résilience des habitants, qui vivent ici en harmonie avec une nature exigeante mais généreuse.
Le matin, la brume enveloppe les montagnes d’un voile mystérieux.
Le soir, les derniers rayons du soleil embrasent les roches d’une lumière dorée.
Chaque moment est une invitation à la contemplation.
🎨 Une mosaïque culturelle vivante
Hà Giang est aussi un carrefour culturel exceptionnel.
Plusieurs ethnies y cohabitent depuis des générations : les H’Mông, Dao, Tày, Lô Lô, Pu Péo…
Chacune possède ses propres traditions, costumes, artisanats et fêtes.
Au marché de Đồng Văn, les couleurs éclatantes des tissus brodés, les bijoux en argent, les instruments traditionnels et les conversations animées créent une atmosphère vibrante et authentique.
Ici, la culture n’est pas figée : elle se vit, se partage, se transmet.
Chaque sourire, chaque geste, chaque objet raconte une histoire.
🛣 La boucle de Hà Giang – Une aventure inoubliable
Parcourir la boucle de Hà Giang est une expérience mythique.
Sur plusieurs jours, la route vous mène à travers des paysages grandioses :
des vallées profondes,
des cols vertigineux,
des rizières en terrasse,
des villages traditionnels,
des falaises plongeant dans le vide.
Chaque étape réserve une surprise, chaque rencontre enrichit le voyage.
C’est un itinéraire qui marque l’esprit et le cœur.
🛶 La rivière Nho Quế – Un joyau naturel
Naviguer sur la rivière Nho Quế est l’un des moments les plus magiques du voyage.
Depuis une barque traditionnelle, vous glissez au milieu du canyon Tu Sản, l’un des plus profonds d’Asie.
L’eau, d’un vert pur, reflète les falaises abruptes qui vous entourent.
Le silence, la fraîcheur, la beauté brute du lieu créent une expérience presque spirituelle.
🏡 Villages authentiques et rencontres inoubliables
Hà Giang, c’est aussi la chaleur humaine.
Dans les villages de Lũng Cú, Sủng Là, Phó Bảng ou Lũng Táo, vous découvrirez :
des maisons en torchis ou en pierre,
des fours traditionnels,
des champs de chanvre,
des ateliers de broderie,
des marchés où l’on échange bien plus que des produits.
Les habitants accueillent les voyageurs avec simplicité et générosité.
Un thé chaud, une histoire racontée au coin du feu, un sourire sincère — ce sont ces moments qui donnent à Hà Giang son âme unique.
🌸 Les saisons de Hà Giang – Une palette infinie
Chaque saison transforme le paysage :
Printemps : fleurs de pêcher et de prunier
Début d’été : rizières en eau scintillante
Automne : rizières dorées
Novembre : fleurs de sarrasin, symbole de Hà Giang
Hiver : brume mystique et atmosphère poétique
Peu importe la période, Hà Giang offre toujours une beauté saisissante.
🍲 Saveurs des montagnes
La gastronomie locale reflète la simplicité et la richesse des cultures montagnardes :
thắng cố, plat traditionnel H’Mông,
mèn mén, farine de maïs,
porc noir grillé,
alcool de maïs,
gâteau de sarrasin.
Des saveurs authentiques, profondément liées à la terre et aux traditions.
✨ Hà Giang – Un voyage qui change la vie
Hà Giang n’est pas seulement un lieu à visiter.
C’est un lieu à ressentir, à vivre pleinement.
Un endroit où l’on se reconnecte à la nature, à l’essentiel, à soi-même.
Un territoire où la liberté prend tout son sens.
Hà Giang est une promesse : celle d’un voyage qui reste en vous longtemps après votre retour.
TXT
            );

        $manager->persist($haGiang);

        // ==========================
        // 2. Sapa
        // ==========================
        $sapa = new ExperienceSpot();
        $sapa
            ->setTitle('Sapa – Là où les nuages rencontrent les traditions')
            ->setSlug('sapa')
            ->setRegion('nord')
            ->setCategory('incroyable')
            ->setImageFilename('sapa.jpg')
            ->setShortDescription(<<<'TXT'
Sapa séduit par son atmosphère romantique et son riche patrimoine culturel.
Les rizières en terrasses s’étendent à perte de vue, les villages de Cát Cát et Tả Van offrent une tranquillité rare.
Depuis le sommet du Fansipan, “le toit de l’Indochine”, la mer de nuages s’ouvre sous vos yeux.
À Sapa, chaque pas révèle un nouveau paysage.
TXT
            );

        $manager->persist($sapa);

        // ==========================
        // 3. Mù Cang Chải
        // ==========================
        $muCangChai = new ExperienceSpot();
        $muCangChai
            ->setTitle('Mù Cang Chải – Le royaume des courbes dorées')
            ->setSlug('mu-cang-chai')
            ->setRegion('nord')
            ->setCategory('incroyable')
            ->setImageFilename('mucangchai.jpg')
            ->setShortDescription(<<<'TXT'
Pour admirer les plus belles rizières en terrasses du Vietnam, direction Mù Cang Chải.
En saison des récoltes, la vallée se pare d’un manteau doré éclatant.
Le col de Khau Phạ, l’un des plus impressionnants du pays, dévoile une nature sauvage et majestueuse.
Un paradis pour les photographes et les amoureux de grands espaces.
TXT
            );

        $manager->persist($muCangChai);

        // ==========================
        // 4. Ninh Bình
        // ==========================
        $ninhBinh = new ExperienceSpot();
        $ninhBinh
            ->setTitle('Ninh Bình – Une “baie d’Halong terrestre” envoûtante')
            ->setSlug('ninh-binh')
            ->setRegion('nord')
            ->setCategory('incroyable')
            ->setImageFilename('ninhbinh.jpg')
            ->setShortDescription(<<<'TXT'
Ninh Bình est un subtil mélange de paysages karstiques et d’histoire millénaire.
Tràng An et Tam Cốc vous emmènent au fil de l’eau, entre grottes mystérieuses et montagnes calcaires.
La cité antique de Hoa Lư, ancienne capitale, respire encore la grandeur des dynasties Đinh et Lê.
Ninh Bình émerveille et donne envie d’explorer davantage.
TXT
            );

        $manager->persist($ninhBinh);

        // ==========================
        // 5. Baie d’Halong
        // ==========================
        $halong = new ExperienceSpot();
        $halong
            ->setTitle('Baie d’Halong – Une merveille naturelle classée à l’UNESCO')
            ->setSlug('baie-dhalong')
            ->setRegion('nord')
            ->setCategory('incroyable')
            ->setImageFilename('halong.jpg')
            ->setShortDescription(<<<'TXT'
Aucune autre région ne ressemble à la baie d’Halong.
Des milliers de pitons calcaires surgissent des eaux turquoise, formant un paysage irréel.
Croisière au coucher du soleil, kayak dans les grottes ou nuit à bord d’un bateau traditionnel : chaque expérience est inoubliable.
Halong est la preuve que la nature sait créer des chefs-d’œuvre.
TXT
            );

        $manager->persist($halong);

        // ==========================
        // 6. Mai Châu
        // ==========================
        $maiChau = new ExperienceSpot();
        $maiChau
            ->setTitle('Mai Châu – La vallée de la sérénité')
            ->setSlug('mai-chau')
            ->setRegion('nord')
            ->setCategory('incroyable')
            ->setImageFilename('maichau.jpg')
            ->setShortDescription(<<<'TXT'
Mai Châu offre une pause douce et apaisante.
Les villages sur pilotis des Thaï blancs se nichent entre les rizières verdoyantes.
Le soir, autour du feu, les danses traditionnelles et le vin de riz créent une ambiance chaleureuse et authentique.
Mai Châu est l’endroit idéal pour se reconnecter à l’essentiel.
TXT
            );

        $manager->persist($maiChau);

        // ==========================
        // 7. Ba Bể
        // ==========================
        $baBe = new ExperienceSpot();
        $baBe
            ->setTitle('Ba Bể – Un lac mythique au cœur de la forêt')
            ->setSlug('ba-be')
            ->setRegion('nord')
            ->setCategory('incroyable')
            ->setImageFilename('babe.jpg')
            ->setShortDescription(<<<'TXT'
Le lac Ba Bể est l’un des plus beaux lacs naturels du Vietnam.
Ses eaux calmes reflètent les montagnes environnantes, créant une atmosphère presque mystique.
La cascade Đầu Đẳng, la grotte Puông et le village de Pác Ngòi complètent cette immersion en pleine nature.
Ba Bể raconte les légendes du Nord à ceux qui prennent le temps d’écouter.
TXT
            );

        $manager->persist($baBe);

        // ==========================
        // 8. Cao Bằng
        // ==========================
        $caoBang = new ExperienceSpot();
        $caoBang
            ->setTitle('Cao Bằng – Terre de cascades et de légendes')
            ->setSlug('cao-bang')
            ->setRegion('nord')
            ->setCategory('incroyable')
            ->setImageFilename('caobang.jpg')
            ->setShortDescription(<<<'TXT'
Cao Bằng abrite l’une des plus belles cascades d’Asie : Bản Giốc.
Ses eaux blanches se déversent en plusieurs niveaux, offrant un spectacle puissant et poétique.
Le lac Thang Hen, d’un bleu profond, entouré de montagnes, semble tout droit sorti d’un conte.
Cao Bằng est une destination pour les voyageurs en quête d’authenticité et de nature préservée.
TXT
            );

        $manager->persist($caoBang);

        // Lưu tất cả vào DB
        $manager->flush();
    }
}
