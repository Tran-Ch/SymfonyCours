<?php

namespace App\DataFixtures;

use App\Entity\ExperienceSpot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExperienceSpotFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /*
         * Helper nhỏ để đỡ lặp code
         */
        $create = function (
            string $title,
            string $slug,
            string $region,
            string $category,
            string $imageFilename,
            string $shortDescription
        ) use ($manager): ExperienceSpot {
            $spot = new ExperienceSpot();
            $spot
                ->setTitle($title)
                ->setSlug($slug)
                ->setRegion($region)
                ->setCategory($category)
                ->setImageFilename($imageFilename)
                ->setShortDescription($shortDescription)
            ;

            $manager->persist($spot);

            return $spot;
        };

        // ======================================================
        //  N O R D  –  E X P É R I E N C E   I N C R O Y A B L E
        //  (giống file fixtures cũ của bạn)
        // ======================================================

        $create(
            'Hà Giang – Là où commence la route de la liberté',
            'ha-giang',
            'nord',
            'incroyable',
            'hagiang.jpg',
            <<<'TXT'
À l’extrême Nord du Vietnam, Hà Giang s’impose comme une terre de contrastes et de sensations, un lieu où la route semble se perdre dans les nuages et où chaque virage dévoile un paysage plus grandiose que le précédent. 
Ici, les montagnes karstiques se dressent comme des cathédrales de pierre, le col de Mã Pì Lèng serpente entre des falaises vertigineuses et la rivière Nho Quế, d’un vert émeraude presque irréel, glisse doucement au fond du canyon. Ce décor spectaculaire, sculpté par le temps, offre une impression de liberté absolue, comme si l’on franchissait une frontière invisible entre le monde réel et le rêve. 
Mais Hà Giang ne se résume pas à ses panoramas : c’est aussi une mosaïque culturelle où les ethnies H’Mông, Dao, Tày ou Lô Lô perpétuent leurs traditions à travers les costumes brodés, les marchés colorés et les fêtes ancestrales. 
Dans les villages de Đồng Văn ou de Sủng Là, les maisons en pierre et les champs accrochés aux pentes abruptes témoignent de la résilience d’un peuple vivant en harmonie avec une nature exigeante. 
Voyager à Hà Giang, c’est parcourir la mythique boucle du Nord, s’arrêter dans un marché animé, partager un thé chaud avec les habitants, admirer les fleurs de sarrasin en novembre ou goûter aux saveurs simples mais authentiques des montagnes. 
C’est une expérience qui dépasse le tourisme, une immersion dans un univers où la beauté brute de la nature se mêle à la richesse des cultures locales. 
Hà Giang n’est pas seulement une destination à visiter, c’est une aventure à vivre, un appel à l’essentiel, un souffle de liberté qui reste longtemps gravé dans la mémoire de ceux qui osent s’y aventurer.
TXT
        );

        $create(
            'Sapa – Là où les nuages rencontrent les traditions',
            'sapa',
            'nord',
            'incroyable',
            'sapa.jpg',
            <<<'TXT'
Sapa, perchée dans les montagnes du Nord du Vietnam, est une destination qui fascine autant par ses paysages que par sa richesse culturelle. Dès l’aube, la ville s’éveille sous un voile de brume. Les rizières en terrasses, sculptées depuis des siècles par les H’Mông, s’étendent comme des escaliers vers le ciel. Le spectacle est hypnotisant : des courbes dorées ou vertes selon la saison, qui se perdent dans l’infini des vallées.
Mais Sapa ne se résume pas à ses panoramas. C’est aussi un carrefour culturel où se rencontrent les ethnies H’Mông, Dao rouge, Giáy et bien d’autres. Dans les marchés hebdomadaires, les femmes portent des costumes brodés aux couleurs éclatantes, les hommes jouent du khèn ou de la flûte, et les étals regorgent de produits locaux, de plantes médicinales et d’artisanat. Chaque sourire, chaque échange est une invitation à entrer dans un monde où les traditions ne sont pas figées mais vivantes, transmises de génération en génération.
Pour les voyageurs, l’expérience la plus marquante est sans doute la randonnée. Les sentiers serpentent entre les rizières, traversent des villages isolés et mènent vers des vallées secrètes. À chaque pas, le paysage change, révélant une cascade cachée, une maison en bois fumante de chaleur, ou un champ de maïs accroché à la montagne. Les habitants accueillent les visiteurs avec simplicité : un thé chaud, un repas partagé, une histoire racontée au coin du feu. Ces moments d’intimité donnent à Sapa une dimension humaine qui dépasse la beauté de ses panoramas.
Et puis il y a le sommet du Fansipan, surnommé “le toit de l’Indochine”. À plus de 3 100 mètres d’altitude, il offre une vue spectaculaire sur une mer de nuages infinie. Monter là-haut, c’est ressentir la grandeur de la nature et la petitesse de l’homme, mais aussi une liberté absolue. C’est une expérience qui reste gravée dans la mémoire.
Sapa est une destination qui fascine parce qu’elle combine tout : la majesté des paysages, la richesse des cultures, la chaleur des rencontres. C’est un lieu où l’on vient pour admirer, mais où l’on repart transformé. Chaque voyageur y trouve quelque chose de différent : une émotion, une inspiration, une envie de revenir. Sapa n’est pas seulement une étape touristique, c’est une aventure intérieure, un appel à ralentir, à contempler et à se reconnecter à l’essentiel.
TXT
        );

        $create(
            'Mù Cang Chải – Le royaume des courbes dorées',
            'mu-cang-chai',
            'nord',
            'incroyable',
            'mucangchai.jpg',
            <<<'TXT'
Mù Cang Chải, nichée dans la province de Yên Bái, est une terre où la beauté se mesure en courbes. Les rizières en terrasses, sculptées depuis des siècles par les H’Mông, dessinent des paysages ondulants qui changent de couleur au fil des saisons. Au printemps, elles se parent de vert tendre ; en été, elles scintillent sous l’eau des pluies ; à l’automne, elles se transforment en une mer dorée qui embrase la vallée. C’est un spectacle vivant, une œuvre d’art façonnée par la patience et le savoir-faire des générations.
Le col de Khau Phạ, l’un des plus impressionnants du Vietnam, offre une vue vertigineuse sur ces vallées infinies. Les photographes affluent pour capturer ce décor unique, mais au-delà des images, c’est l’émotion qui domine. Marcher dans les sentiers de Mù Cang Chải, c’est ressentir la force de la nature et la persévérance des hommes qui l’ont apprivoisée. Les villages perchés conservent une authenticité rare : maisons en bois, fêtes locales, musiques traditionnelles. Les habitants accueillent les visiteurs avec simplicité, partageant un repas de maïs ou un verre d’alcool de riz.
La culture H’Mông est omniprésente : broderies colorées, marchés animés, chants et danses qui rythment la vie communautaire. Chaque rencontre est une immersion dans un monde où la tradition est vivante et fièrement préservée. Mù Cang Chải est une invitation à ralentir, à contempler et à se laisser émerveiller. C’est une expérience qui dépasse le tourisme : une immersion dans un univers où la beauté est partout, dans les paysages comme dans les sourires.
TXT
        );

        $create(
            'Ninh Bình – Une “baie d’Halong terrestre” envoûtante',
            'ninh-binh',
            'nord',
            'incroyable',
            'ninhbinh.jpg',
            <<<'TXT'
Ninh Bình, située au sud du delta du fleuve Rouge, est une destination qui fascine par la richesse de ses paysages et la profondeur de son histoire. Souvent surnommée la “baie d’Halong terrestre”, elle séduit les voyageurs par ses formations calcaires surgissant au milieu des rizières et des rivières, mais aussi par la chaleur de ses habitants et la richesse de sa culture. Ici, la nature et l’homme semblent dialoguer depuis des siècles, créant une harmonie rare et précieuse.
Tam Cốc et Tràng An sont les joyaux de Ninh Bình. Naviguer sur ces cours d’eau, c’est entrer dans un univers presque irréel, où chaque reflet sur l’eau raconte une histoire. Les rameuses, souvent des femmes du village, manient les avirons avec leurs pieds, une technique traditionnelle qui étonne et émerveille.
TXT
        );

        $create(
            'Baie d’Halong – Une merveille naturelle classée à l’UNESCO',
            'baie-dhalong',
            'nord',
            'incroyable',
            'halong.jpg',
            <<<'TXT'
Hạ Long, située dans la province de Quảng Ninh, est mondialement connue pour sa baie classée au patrimoine mondial de l’UNESCO. Des milliers d’îlots calcaires surgissent des flots turquoise, créant un décor irréel. Au-delà du paysage, ce sont les villages flottants, la vie des pêcheurs et les pagodes accrochées à la roche qui donnent à la baie son âme profonde.
TXT
        );

        $create(
            'Mai Châu – La vallée de la sérénité',
            'mai-chau',
            'nord',
            'incroyable',
            'maichau.jpg',
            <<<'TXT'
Mai Châu, nichée au cœur des montagnes, est une vallée paisible habitée principalement par les Thaï blancs. Les maisons sur pilotis, les rizières verdoyantes et les soirées de danse autour du feu créent une atmosphère chaleureuse et authentique. C’est un lieu idéal pour se ressourcer et partager le quotidien des habitants.
TXT
        );

        $create(
            'Ba Bể – Un lac mythique au cœur de la forêt',
            'ba-be',
            'nord',
            'incroyable',
            'babe.jpg',
            <<<'TXT'
Au cœur des montagnes du Nord du Vietnam, le lac Ba Bể s’étend comme un miroir d’eau paisible entouré de forêts primaires. Classé parc national, ce site est l’un des plus grands lacs naturels du pays et fascine autant par sa beauté que par la richesse culturelle des communautés Tày qui y vivent.
TXT
        );

        $create(
            'Cao Bằng – Terre de cascades et de légendes',
            'cao-bang',
            'nord',
            'incroyable',
            'caobang.jpg',
            <<<'TXT'
Cao Bằng, région montagneuse à l’extrême nord, est célèbre pour la cascade de Bản Giốc et ses vallées verdoyantes. Entre villages Tày et Nùng, traditions artisanales et marchés colorés, la province offre une immersion authentique dans un Vietnam encore peu connu des voyageurs.
TXT
        );

        // ======================================================
        //  N O R D  –  C U L T U R E
        //  (dựa trên nội dung fallback trong culture.html.twig)
        // ======================================================

        $create(
            'Marché de Bac Hà – La palette colorée des minorités',
            'marche-bac-ha-couleurs',
            'nord',
            'culture',
            'bac-ha-market.jpg',
            <<<'TXT'
Chaque dimanche, le marché de Bac Hà s'anime d'une effervescence unique. 
Les femmes H'mong, Dao, Tày et Nùng viennent y vendre leurs produits dans une explosion de couleurs. 
C'est bien plus qu'un lieu d'échange : c'est une véritable scène sociale où se mêlent rires, négociations et retrouvailles. 
Ici, l'artisanat traditionnel côtoie les saveurs locales, offrant un spectacle vivant de la culture montagnarde.
TXT
        );

        $create(
            'Sapa – Les rizières en terrasses des H’mong',
            'sapa-culture-terrasses',
            'nord',
            'culture',
            'sapa-culture.jpg',
            <<<'TXT'
À Sapa, les rizières en terrasses épousent les montagnes comme une œuvre d'art vivante. 
Les H'mong, vêtus de leurs habits traditionnels bleu indigo, perpétuent des méthodes de culture ancestrales. 
Le marché de l'amour, les danses au son du khèn et l'artisanat du chanvre racontent une culture profondément liée à la terre.
TXT
        );

        $create(
            'Hà Giang – Le royaume des H’mong fleuris',
            'ha-giang-culture-hmong-fleuris',
            'nord',
            'culture',
            'hagiang-culture.jpg',
            <<<'TXT'
Dans les montagnes escarpées de Hà Giang, les H'mong fleuris cultivent leur identité à travers des vêtements brodés de motifs complexes. 
Le marché de l'amour de Khâu Vai, où se retrouvent les amoureux une fois par an, est l'un des rituels les plus émouvants de la région. 
Les maisons en terre des villages isolés racontent une histoire de résilience et d'harmonie avec la nature.
TXT
        );

        $create(
            'Mai Châu – La douceur de vivre des Thaï blancs',
            'mai-chau-culture-thai-blancs',
            'nord',
            'culture',
            'maichau-culture.jpg',
            <<<'TXT'
Mai Châu dévoile la culture raffinée des Thaï blancs. 
Les femmes tissent la soie sur d'anciens métiers en bois, créant des étoffes aux motifs géométriques élégants. 
Le xòe, danse traditionnelle au rythme lent, et les maisons sur pilotis entourées de rizières créent une atmosphère paisible.
TXT
        );

        $create(
            'Mù Cang Chải – Le ballet des rizières en terrasses',
            'mu-cang-chai-culture-ballet',
            'nord',
            'culture',
            'mucangchai-culture.jpg',
            <<<'TXT'
Classées au patrimoine national, les rizières en terrasses de Mù Cang Chải sont le fruit d'un savoir-faire séculaire. 
Les H'mong y pratiquent une agriculture en parfaite symbiose avec la montagne. 
Les fêtes du riz, où l'on célèbre les récoltes, sont l'occasion de déguster le rượu cần et d'admirer les danses au son des khèn.
TXT
        );

        $create(
            'Ninh Bình – Le berceau de la culture vietnamienne',
            'ninh-binh-culture-berceau',
            'nord',
            'culture',
            'ninhbinh-culture.jpg',
            <<<'TXT'
Ninh Bình est un véritable musée à ciel ouvert de la culture vietnamienne. 
L'ancienne capitale Hoa Lư abrite des temples dédiés aux rois Dinh et Lê, témoins de l'indépendance du pays. 
Les spectacles de chant xẩm résonnent dans les grottes tandis que les artisans perpétuent la broderie de Kim Sơn.
TXT
        );

        $create(
            'Lào Cai – La diversité ethnique à ciel ouvert',
            'lao-cai-diversite-ethnique',
            'nord',
            'culture',
            'laocai-culture.jpg',
            <<<'TXT'
La province de Lào Cai est un kaléidoscope de cultures avec plus de 20 groupes ethniques. 
Les marchés ethniques comme Cốc Ly ou Cán Cấu offrent un spectacle haut en couleur, où se mêlent les langues, les costumes et les saveurs. 
Les fêtes traditionnelles, comme la danse du feu des Dao, plongent les visiteurs dans un univers mystique et authentique.
TXT
        );

        $create(
            'Yên Bái – L\'héritage des Tày et des Dao',
            'yen-bai-heritage-tay-dao',
            'nord',
            'culture',
            'yenbai-culture.jpg',
            <<<'TXT'
Yên Bái révèle la richesse culturelle des Tày et des Dao à travers leurs villages traditionnels. 
Les maisons sur pilotis des Tày s'ouvrent sur des paysages de théiers centenaires, tandis que les femmes Dao rouges pratiquent encore la cueillette des herbes médicinales. 
Les cérémonies et les marchés de montagne offrent un aperçu fascinant de traditions séculaires.
TXT
        );

        // ======================================================
        //  N O R D  –  T O U R I S M E   D E   V A C A N C E S
        //  (dựa trên fallback trong tourisme.html.twig)
        // ======================================================

        $create(
            'Sapa – Séjour de luxe au-dessus d’une mer de nuages',
            'sapa-tourisme-luxe-nuages',
            'nord',
            'tourisme',
            'sapa-tourisme.jpg',
            <<<'TXT'
Sapa est l’icône du bien-être en montagne. 
Les resorts perchés sur les pentes offrent des piscines à débordement avec vue panoramique sur la vallée de Mường Hoa. 
Le matin, savourez une tasse de thé chaud dans la brume légère ; le soir, laissez-vous envelopper par un spa aux herbes traditionnelles.
TXT
        );

        $create(
            'Baie d’Halong – Détente en bord de mer au cœur d’un site classé UNESCO',
            'halong-tourisme-detente-mer',
            'nord',
            'tourisme',
            'halong-tourisme.jpg',
            <<<'TXT'
La baie d’Halong ne se limite pas aux croisières : elle abrite de nombreux resorts haut de gamme en bord de mer. 
Profitez d’une plage privée, admirez le coucher du soleil sur les formations karstiques ou offrez-vous un soin spa marin.
TXT
        );

        $create(
            'Sources thermales de Kim Bôi – Bien-être & thérapie naturelle',
            'kim-boi-sources-thermales',
            'nord',
            'tourisme',
            'kimboi.jpg',
            <<<'TXT'
Kim Bôi est la destination idéale pour combiner détente et soins du corps. 
Ses sources chaudes naturelles, ses bains de boue et son environnement verdoyant créent une expérience de relaxation totale.
TXT
        );

        $create(
            'Đồng Văn – Lũng Cú : l’art du “mountain retreat”',
            'dong-van-lung-cu-retreat',
            'nord',
            'tourisme',
            'dongvan-retreat.jpg',
            <<<'TXT'
Parfait pour les voyageurs en quête de détente avec une touche d’aventure. 
Les lodges et homestays se fondent dans le paysage rocheux, offrant des vues spectaculaires sur les vallées et les montagnes du plateau karstique de Đồng Văn.
TXT
        );

        $create(
            'Yên Tử – Méditation, sérénité et retraite spirituelle',
            'yen-tu-meditation-serenite',
            'nord',
            'tourisme',
            'yentu.jpg',
            <<<'TXT'
Yên Tử n’est pas seulement un site spirituel : c’est aussi une destination idéale pour un séjour zen & wellness. 
Les resorts inspirés de l’architecture des pagodes créent une atmosphère paisible, propice à la méditation et au ressourcement.
TXT
        );

        $create(
            'Lac de Hòa Bình – Détente au bord d’un lac majestueux',
            'lac-hoa-binh-detente',
            'nord',
            'tourisme',
            'hoabinh-lake.jpg',
            <<<'TXT'
Le lac de Hòa Bình séduit par son eau turquoise, ses montagnes environnantes et son air pur. 
Les resorts situés au bord du lac proposent piscines à débordement, kayak, balades en bateau et espaces de relaxation.
TXT
        );

        $create(
            'Cát Bà – Entre mer, forêt et resorts de charme',
            'cat-ba-mer-foret-resorts',
            'nord',
            'tourisme',
            'catba.jpg',
            <<<'TXT'
Cát Bà offre une combinaison rare entre plages, falaises et parc national. 
Les resorts sur la baie de Lan Hạ bénéficient de vues imprenables sur la mer, parfaits pour un séjour luxueux mais paisible.
TXT
        );

        $create(
            'Sources thermales de Thanh Thủy (Phú Thọ)',
            'thanh-thuy-sources-thermales',
            'nord',
            'tourisme',
            'thanhthuy.jpg',
            <<<'TXT'
L’une des rares sources chaudes naturelles du Nord. 
Plongez dans une eau minérale bienfaisante au milieu des montagnes, profitez de soins spa et d’un environnement parfaitement calme.
TXT
        );

        // ==========================
        // 9. (CENTRE / INCROYABLE)
        // Hué  
        // ==========================
        $hueIncroyable = (new ExperienceSpot())
            ->setTitle('Huế – L’ancienne cité impériale au bord de la rivière des Parfums')
            ->setSlug('hue-cite-imperiale')
            ->setRegion('centre')
            ->setCategory('incroyable')
            ->setImageFilename('hue-incroyable.jpg')
            ->setShortDescription(<<<'TXT'
        Huế, ancienne capitale impériale, est un voyage dans le temps...
        (đoạn mô tả dài tuỳ bạn)
        TXT);
        $manager->persist($hueIncroyable);

        // ==========================
        // 10. (CENTRE / CULTURE)
        // Hội An
        // ==========================
        $hoiAnCulture = (new ExperienceSpot())
            ->setTitle('Hội An – La lanterne de la culture au bord de la rivière Thu Bồn')
            ->setSlug('hoi-an-culture')
            ->setRegion('centre')
            ->setCategory('culture')
            ->setImageFilename('hoian-culture.jpg')
            ->setShortDescription(<<<'TXT'
        Hội An séduit par ses maisons jaunes, ses lanternes colorées...
        TXT);
        $manager->persist($hoiAnCulture);

        // ==========================
        // 11. (CENTRE / TOURISME)
        // Da Nang
        // ==========================
        $daNangTourisme = (new ExperienceSpot())
            ->setTitle('Đà Nẵng – Séjour balnéaire entre mer et montagnes')
            ->setSlug('da-nang-sejour-balneaire')
            ->setRegion('centre')
            ->setCategory('tourisme')
            ->setImageFilename('danang-tourisme.jpg')
            ->setShortDescription(<<<'TXT'
        Avec ses longues plages de sable fin, ses resorts modernes...
        TXT);
        $manager->persist($daNangTourisme);

        // ==========================
        // 12. (SUD / INCROYABLE)
        // Cần Thơ
        // ==========================
        $create(
            'Cần Thơ – Cœur du delta du Mékong',
            'can-tho-mekong',
            'sud',
            'incroyable',
            'cantho.jpg',
            <<<'TXT'
        Cần Thơ est la grande ville du delta du Mékong, célèbre pour ses marchés flottants,
        ses vergers luxuriants et son ambiance chaleureuse au bord du fleuve.
        TXT
        );

        // ==========================
        // 13. (SUD / CULTURE)
        // HCMC
        // ==========================
        $create(
            'Hô Chi Minh-Ville – Métropole vibrante du Sud',
            'ho-chi-minh-ville-urbaine',
            'sud',
            'culture',
            'hcmc.jpg',
            <<<'TXT'
        Plus grande ville du pays, mêlant patrimoine colonial, quartiers traditionnels
        et vie nocturne animée.
        TXT
        );

        // ==========================
        // 14. (SUD / TOURISME)
        // Phú Quốc
        // ==========================
        $create(
            'Phú Quốc – Séjour balnéaire entre plages et forêts',
            'phu-quoc-sejour-balneaire',
            'sud',
            'tourisme',
            'phuquoc.jpg',
            <<<'TXT'
        Île paradisiaque au large du Sud, idéale pour le farniente, la plongée
        et les resorts en bord de mer.
        TXT
        );

        // ======================================================
        //  TODO: CENTRE / SUD
        //  Khi cần, bạn tạo thêm các spot:
        //      region = 'centre' / 'sud'
        //      category = 'incroyable' | 'culture' | 'tourisme'
        //  Cấu trúc y hệt như trên.
        // ======================================================

        $manager->flush();
    }
}
