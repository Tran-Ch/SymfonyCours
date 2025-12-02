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
Chaque dimanche, le petit bourg de Bac Hà, niché dans les montagnes du Nord du Vietnam, se transforme en une véritable fête des sens. Le marché hebdomadaire attire des centaines d’habitants venus des villages environnants, appartenant aux ethnies H’Mông, Dao, Tày et Nùng. Dès l’aube, les ruelles s’emplissent de couleurs éclatantes : les femmes en costumes traditionnels brodés de motifs géométriques ou floraux défilent comme dans un carnaval vivant.
Mais le marché de Bac Hà n’est pas seulement un lieu d’échanges commerciaux. C’est une scène sociale où se mêlent rires, négociations et retrouvailles. Les familles se rencontrent, les amis se saluent, et les voyageurs curieux sont invités à partager un instant de convivialité. Ici, chaque étal raconte une histoire : celle d’un artisan qui perpétue un savoir‑faire ancestral, celle d’une famille qui cultive ses terres avec patience, celle d’une communauté qui préserve fièrement son identité.
Les produits proposés reflètent la richesse de la culture montagnarde. On y trouve des tissus colorés, des bijoux en argent, des objets en bambou, mais aussi des épices parfumées, des fruits tropicaux et des plats typiques. Le fameux alcool de maïs, spécialité locale, est dégusté dans une ambiance chaleureuse, symbole de l’hospitalité des habitants.
Pour les voyageurs, le marché de Bac Hà est une immersion unique dans la vie quotidienne des minorités du Nord. C’est l’occasion de découvrir une culture vivante, de ressentir l’énergie d’une communauté et de repartir avec des souvenirs authentiques. Plus qu’un marché, Bac Hà est un spectacle vivant, une fenêtre ouverte sur l’âme des montagnes vietnamiennes.

TXT
        );

        $create(
            'Sapa – Les rizières en terrasses des H’mong',
            'sapa-culture-terrasses',
            'nord',
            'culture',
            'sapa-culture.jpg',
            <<<'TXT'
Nichée dans les montagnes du Nord du Vietnam, Sapa est une destination où la culture et la nature s’entrelacent pour offrir une expérience unique. Les rizières en terrasses, sculptées depuis des siècles par les H’mong, épousent les pentes abruptes comme une œuvre d’art vivante. Selon les saisons, elles se parent de vert tendre, de jaune doré ou de reflets argentés, créant un spectacle hypnotisant qui attire les voyageurs du monde entier.
Mais au‑delà de ces paysages grandioses, c’est la richesse culturelle des H’mong qui donne à Sapa son âme. Vêtus de leurs habits traditionnels bleu indigo, ornés de broderies fines et de bijoux en argent, ils perpétuent des méthodes agricoles ancestrales et des savoir‑faire artisanaux transmis de génération en génération. Le chanvre, cultivé et filé à la main, devient tissu, vêtement ou objet décoratif, témoignant d’une créativité profondément liée à la terre.
La vie communautaire s’exprime dans les marchés hebdomadaires, véritables scènes sociales où se mêlent rires, négociations et retrouvailles. Le célèbre “marché de l’amour” est une tradition singulière : les jeunes H’mong s’y rencontrent, chantent, dansent et parfois trouvent l’âme sœur. Les sons du khèn, instrument à vent emblématique, accompagnent ces moments festifs et résonnent dans les vallées comme un écho des montagnes.
Pour les voyageurs, Sapa est bien plus qu’un décor spectaculaire : c’est une immersion dans une culture vivante et fière. Chaque rencontre, chaque sourire, chaque geste quotidien révèle une identité profondément enracinée dans la nature. Découvrir Sapa, c’est comprendre que les rizières ne sont pas seulement des champs, mais le reflet d’une civilisation qui a su transformer la montagne en art et en mémoire.

TXT
        );

        $create(
            'Hà Giang – Le royaume des H’mong fleuris',
            'ha-giang-culture-hmong-fleuris',
            'nord',
            'culture',
            'hagiang-culture.jpg',
            <<<'TXT'
Nichée à l’extrême nord du Vietnam, Hà Giang est une région montagneuse où la culture et la nature s’entrelacent dans une harmonie rare. Les paysages escarpés, les vallées profondes et les cols vertigineux forment un décor spectaculaire, mais ce sont les habitants, en particulier les H’mong fleuris, qui donnent à cette terre son âme unique.
Les H’mong fleuris cultivent leur identité à travers des vêtements traditionnels richement brodés. Chaque motif, chaque couleur raconte une histoire : celle d’une famille, d’un village, d’une génération. Les costumes, éclatants de rouge, de vert et de jaune, transforment les marchés en véritables festivals visuels. Les femmes, fières de leurs créations, perpétuent un savoir‑faire ancestral qui fait de l’art textile un langage culturel à part entière.
Parmi les traditions les plus émouvantes figure le marché de l’amour de Khâu Vai. Une fois par an, les amoureux, parfois séparés par les contraintes de la vie, se retrouvent dans ce lieu symbolique. C’est un rituel qui dépasse le simple commerce : une célébration des sentiments, de la fidélité et de la mémoire. Les chants, les danses et les rires résonnent dans la vallée, offrant aux visiteurs un aperçu rare de la profondeur émotionnelle de la culture locale.
Les villages isolés de Hà Giang conservent une architecture traditionnelle faite de maisons en terre. Ces habitations, simples mais solides, témoignent de la résilience des communautés face aux conditions difficiles des montagnes. Elles reflètent une philosophie de vie en harmonie avec la nature : utiliser les ressources locales, respecter l’environnement et bâtir des espaces de convivialité.
Explorer Hà Giang, c’est découvrir bien plus qu’un paysage grandiose. C’est entrer dans un univers où la culture est vivante, où chaque rencontre révèle une histoire, et où la beauté réside autant dans les traditions que dans les montagnes.

TXT
        );

        $create(
            'Mai Châu – La douceur de vivre des Thaï blancs',
            'mai-chau-culture-thai-blancs',
            'nord',
            'culture',
            'maichau-culture.jpg',
            <<<'TXT'
Au cœur des montagnes du Nord du Vietnam, Mai Châu est une vallée qui séduit par son atmosphère paisible et la richesse culturelle des Thaï blancs. Ici, la vie s’écoule doucement, rythmée par les saisons agricoles et les traditions ancestrales.
Les femmes Thaï perpétuent un savoir‑faire raffiné : elles tissent la soie sur d’anciens métiers en bois, créant des étoffes aux motifs géométriques élégants. Chaque pièce est le fruit d’une patience infinie et d’une créativité transmise de génération en génération. Ces tissus colorés ne sont pas seulement des objets d’artisanat, mais aussi des symboles identitaires qui accompagnent les fêtes et les cérémonies.
La culture de Mai Châu s’exprime également à travers le xòe, danse traditionnelle au rythme lent et gracieux. Les villageois se tiennent par la main, formant un cercle qui s’élargit et se resserre au son des instruments. Cette danse, empreinte de convivialité, incarne l’esprit communautaire et la joie de partager. Les voyageurs sont souvent invités à participer, découvrant ainsi une tradition vivante et chaleureuse.
L’architecture des villages ajoute à cette atmosphère unique. Les maisons sur pilotis, construites en bois et en bambou, s’élèvent au‑dessus des rizières verdoyantes. Elles sont conçues pour s’adapter au climat et favoriser la vie collective. Le soir, les habitants accueillent les visiteurs autour d’un repas simple mais savoureux, composé de riz gluant, de légumes frais et d’alcool de riz.
Découvrir Mai Châu, c’est plonger dans un univers où la simplicité devient luxe. C’est ressentir la douceur de vivre des Thaï blancs, admirer leur artisanat, partager leurs danses et s’imprégner d’une culture profondément liée à la nature. Une expérience authentique qui laisse une empreinte durable dans le cœur des voyageurs.

TXT
        );

        $create(
            'Mù Cang Chải – Le ballet des rizières en terrasses',
            'mu-cang-chai-culture-ballet',
            'nord',
            'culture',
            'mucangchai-culture.jpg',
            <<<'TXT'
Située dans la province de Yên Bái, Mù Cang Chải est un véritable joyau culturel et paysager du Nord du Vietnam. Ses rizières en terrasses, classées au patrimoine national, s’étendent à perte de vue et épousent les flancs des montagnes comme un immense ballet végétal. Sculptées depuis des siècles par les H’mong, elles témoignent d’un savoir‑faire ancestral et d’une relation intime entre l’homme et la nature.
L’agriculture pratiquée ici est bien plus qu’un travail : c’est une philosophie de vie. Les H’mong cultivent le riz en parfaite symbiose avec la montagne, respectant les cycles naturels et transformant chaque parcelle en une œuvre d’art vivante. Au fil des saisons, les rizières changent de couleur : vert tendre au printemps, argentées sous l’eau en été, dorées à l’automne. Ce spectacle hypnotisant attire les voyageurs en quête d’authenticité et d’émotion.
Mais Mù Cang Chải ne se limite pas à ses paysages. La culture locale s’exprime avec force lors des fêtes du riz, moments de célébration communautaire où l’on remercie la terre pour ses bienfaits. Ces festivités sont l’occasion de déguster le rượu cần, alcool de riz traditionnel partagé dans une ambiance conviviale, et d’admirer les danses au son du khèn, instrument emblématique des H’mong. Les costumes colorés, les chants et les rires créent une atmosphère vibrante qui reflète l’identité fière de la communauté.
Pour les voyageurs, découvrir Mù Cang Chải, c’est plonger dans un univers où la beauté naturelle se mêle à la richesse culturelle. C’est une invitation à contempler, à partager et à comprendre une tradition vivante qui transforme la montagne en patrimoine.

TXT
        );

        $create(
            'Ninh Bình – Le berceau de la culture vietnamienne',
            'ninh-binh-culture-berceau',
            'nord',
            'culture',
            'ninhbinh-culture.jpg',
            <<<'TXT'
Ninh Bình, au sud du delta du fleuve Rouge, est bien plus qu’un paysage spectaculaire : c’est un véritable musée à ciel ouvert de la culture vietnamienne. Ses montagnes calcaires, ses rivières paisibles et ses rizières verdoyantes forment un décor naturel grandiose, mais c’est surtout son héritage historique et artistique qui en fait une destination incontournable.
L’ancienne capitale Hoa Lư est le cœur battant de cette mémoire. Fondée au Xe siècle, elle fut le siège des dynasties Đinh et Lê, qui marquèrent l’indépendance du pays. Les temples dédiés aux rois Đinh Tiên Hoàng et Lê Đại Hành témoignent de cette grandeur passée. Leur architecture, avec ses toits recourbés et ses colonnes sculptées, reflète la puissance et la spiritualité d’un Vietnam médiéval fier et résistant.
La culture locale se révèle aussi dans les arts vivants. Les spectacles de chant xẩm, tradition populaire interprétée autrefois par des musiciens aveugles, résonnent encore dans les grottes et les villages. Ces mélodies, empreintes de poésie et de sagesse, racontent la vie quotidienne, les amours et les luttes du peuple. Elles offrent aux visiteurs une immersion rare dans l’âme vietnamienne.
Les artisans de Kim Sơn perpétuent quant à eux la broderie traditionnelle. Leurs étoffes, ornées de motifs délicats, sont le fruit d’un savoir‑faire transmis de génération en génération. Chaque pièce est une œuvre d’art qui incarne la patience et la créativité des habitants.
Découvrir Ninh Bình, c’est donc explorer un lieu où la nature sublime rencontre l’histoire et la culture. Entre temples millénaires, chants traditionnels et artisanat raffiné, la région invite les voyageurs à plonger dans l’essence même du Vietnam.

TXT
        );

        $create(
            'Lào Cai – La diversité ethnique à ciel ouvert',
            'lao-cai-diversite-ethnique',
            'nord',
            'culture',
            'laocai-culture.jpg',
            <<<'TXT'
Située aux confins du Nord du Vietnam, la province de Lào Cai est un véritable kaléidoscope culturel. Plus de vingt groupes ethniques y cohabitent, chacun apportant ses traditions, ses costumes et ses savoir‑faire. Cette diversité fait de Lào Cai une destination unique, où chaque rencontre devient une découverte.
Les marchés ethniques sont l’un des visages les plus vivants de cette richesse. À Cốc Ly ou Cán Cấu, les habitants des villages environnants se rassemblent chaque semaine. Les femmes H’Mông, Dao ou Nùng arrivent vêtues de leurs habits traditionnels aux couleurs éclatantes, transformant le marché en un festival visuel. Les étals regorgent de produits locaux : légumes de montagne, épices parfumées, artisanat en argent ou en broderie. Mais au‑delà du commerce, ces marchés sont des lieux de rencontre et de convivialité, où se mêlent les langues, les rires et les histoires.
Les fêtes traditionnelles ajoutent une dimension mystique à cette expérience. La danse du feu des Dao, par exemple, est un rituel impressionnant où les participants, protégés par la force spirituelle, marchent pieds nus sur les braises ardentes. Ce spectacle, empreint de croyances ancestrales, plonge les visiteurs dans un univers où la frontière entre le réel et le sacré s’efface.
L’architecture des villages reflète également cette diversité. Les maisons en bois sur pilotis des Tày côtoient les habitations en terre des H’Mông, chacune adaptée aux conditions de la montagne. Elles témoignent d’une relation intime entre l’homme et son environnement.
Explorer Lào Cai, c’est donc bien plus qu’admirer des paysages grandioses : c’est s’immerger dans une mosaïque culturelle vivante, où chaque marché, chaque fête et chaque maison raconte une histoire. Une destination qui incarne l’authenticité et la richesse du Nord vietnamien.

TXT
        );

        $create(
            'Yên Bái – L\'héritage des Tày et des Dao',
            'yen-bai-heritage-tay-dao',
            'nord',
            'culture',
            'yenbai-culture.jpg',
            <<<'TXT'
Située au cœur du Nord du Vietnam, la province de Yên Bái est une terre où la culture et la nature s’entrelacent pour offrir une expérience authentique. Connue pour ses paysages de montagnes verdoyantes et ses rizières en terrasses, elle est aussi le berceau de traditions séculaires portées par les ethnies Tày et Dao rouges.
Les villages Tày se distinguent par leurs maisons sur pilotis, construites en bois et en bambou. Ces habitations, ouvertes sur les vallées, s’intègrent harmonieusement dans un environnement de théiers centenaires. Les familles y vivent au rythme des saisons agricoles, cultivant le thé et le riz tout en perpétuant un mode de vie communautaire empreint de simplicité et de convivialité.
Les Dao rouges, quant à eux, sont réputés pour leur savoir‑faire dans la cueillette et l’utilisation des herbes médicinales. Les femmes, vêtues de costumes brodés aux couleurs éclatantes, parcourent les montagnes pour récolter plantes et racines. Ces pratiques ancestrales, transmises de génération en génération, témoignent d’une connaissance intime de la nature et d’une culture profondément liée à la santé et au bien‑être.
Les marchés de montagne sont des lieux où cette richesse culturelle se dévoile pleinement. Les habitants y échangent produits agricoles, artisanat et histoires, dans une atmosphère vibrante de couleurs et de sons. Les cérémonies traditionnelles, qu’elles soient liées aux récoltes ou aux cultes des ancêtres, offrent aux visiteurs un aperçu fascinant d’un patrimoine vivant.
Découvrir Yên Bái, c’est plonger dans un univers où chaque maison, chaque vêtement et chaque rituel raconte une histoire. C’est une invitation à explorer une culture fière et authentique, profondément enracinée dans la montagne vietnamienne.

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
Perchée dans les montagnes du Nord du Vietnam, Sapa est devenue l’icône du bien‑être en altitude. Ici, le luxe se conjugue avec la nature : les resorts élégants s’accrochent aux pentes verdoyantes et offrent des piscines à débordement qui semblent se fondre dans l’horizon. Depuis ces terrasses suspendues, la vallée de Mường Hoa s’étend à perte de vue, enveloppée de brume au lever du jour et baignée de lumière dorée au crépuscule.
Le matin, savourez une tasse de thé chaud face à une mer de nuages. Ce rituel simple devient un moment de pure sérénité, où le temps semble suspendu. Les journées se poursuivent par des randonnées guidées à travers les rizières en terrasses, ou par des instants de détente dans les spas des établissements haut de gamme. Ces espaces de bien‑être proposent des soins inspirés des traditions locales : bains aux herbes médicinales, massages aux huiles naturelles, thérapies holistiques qui reconnectent corps et esprit.
Le soir, laissez‑vous envelopper par une atmosphère apaisante. Les spas illuminés offrent une expérience sensorielle unique, où les senteurs des plantes de montagne se mêlent au murmure du vent. Les restaurants des resorts mettent en valeur la gastronomie locale, avec des plats raffinés préparés à partir de produits frais des vallées environnantes.
Séjourner à Sapa, c’est découvrir une montagne qui allie majesté et confort. C’est une invitation à vivre le luxe autrement : dans la contemplation, la détente et l’harmonie avec la nature.

TXT
        );

        $create(
            'Baie d’Halong – Détente en bord de mer au cœur d’un site classé UNESCO',
            'halong-tourisme-detente-mer',
            'nord',
            'tourisme',
            'halong-tourisme.jpg',
            <<<'TXT'
La baie d’Halong, inscrite au patrimoine mondial de l’UNESCO, est mondialement connue pour ses croisières au milieu des îlots calcaires. Mais elle réserve aussi une autre facette, plus intimiste et raffinée : celle d’un séjour en bord de mer, dans des resorts haut de gamme qui allient confort moderne et charme vietnamien.
Ces établissements, nichés le long des plages de sable fin, offrent des expériences uniques. Imaginez une piscine à débordement face aux formations karstiques, un cocktail servi au coucher du soleil, ou encore une chambre avec terrasse privée donnant sur la mer. Les voyageurs en quête de sérénité y trouvent un cadre idéal pour se ressourcer, loin de l’agitation des croisières.
Les plages privées permettent de profiter pleinement de la baie dans une atmosphère exclusive. Le matin, une promenade pieds nus sur le sable encore frais ; l’après‑midi, une séance de kayak ou de paddle pour explorer les lagunes cachées. Le soir, le spectacle du soleil disparaissant derrière les falaises calcaires transforme le paysage en une toile vivante aux couleurs dorées et rosées.
Les spas marins complètent cette expérience de détente. Inspirés des traditions locales, ils proposent des soins aux algues, des massages aux huiles naturelles et des bains aux herbes de montagne. Ces rituels, mêlant savoir‑faire ancestral et techniques modernes, invitent à une relaxation profonde et à une reconnexion avec soi‑même.
Séjourner en bord de mer à Halong, c’est découvrir une autre dimension de ce site mythique : un luxe discret, une atmosphère apaisante et une immersion dans un décor naturel d’exception. Une invitation à savourer la baie autrement, entre bien‑être et contemplation.

TXT
        );

        $create(
            'Sources thermales de Kim Bôi – Bien-être & thérapie naturelle',
            'kim-boi-sources-thermales',
            'nord',
            'tourisme',
            'kimboi.jpg',
            <<<'TXT'
Situées dans la province de Hòa Bình, à seulement quelques heures de route de Hanoi, les sources thermales de Kim Bôi sont une destination incontournable pour ceux qui recherchent détente et revitalisation. Nichées au cœur d’un environnement verdoyant, elles offrent un cadre paisible où la nature et le bien‑être se rencontrent.
Les eaux chaudes naturelles de Kim Bôi, riches en minéraux, sont réputées pour leurs vertus thérapeutiques. Elles soulagent les tensions musculaires, favorisent la circulation sanguine et apportent une sensation immédiate de relaxation. Les visiteurs peuvent profiter de piscines thermales modernes ou de bains traditionnels, selon leurs envies. Les bains de boue, quant à eux, complètent cette expérience en apportant des bienfaits pour la peau, grâce à leurs propriétés purifiantes et régénérantes.
Au‑delà des soins, Kim Bôi séduit par son atmosphère sereine. Les collines environnantes, couvertes de végétation luxuriante, invitent à la promenade et à la contemplation. Les resorts et centres de bien‑être de la région proposent des programmes complets : massages aux herbes médicinales, thérapies holistiques et gastronomie locale équilibrée. Chaque détail est pensé pour offrir une immersion totale dans un univers de relaxation.
Séjourner à Kim Bôi, c’est choisir une parenthèse de douceur, loin du tumulte urbain. C’est l’occasion de se ressourcer, de prendre soin de son corps et de son esprit, tout en découvrant une facette authentique du Nord vietnamien. Entre nature préservée et traditions de bien‑être, Kim Bôi s’impose comme une destination idéale pour un voyage placé sous le signe de la sérénité.

TXT
        );

        $create(
            'Đồng Văn – Lũng Cú : l’art du “mountain retreat”',
            'dong-van-lung-cu-retreat',
            'nord',
            'tourisme',
            'dongvan-retreat.jpg',
            <<<'TXT'
Au cœur de la province de Hà Giang, le plateau karstique de Đồng Văn est une destination qui incarne parfaitement l’esprit du “mountain retreat”. Ici, les paysages rocheux spectaculaires se mêlent à une atmosphère de sérénité, offrant aux voyageurs une expérience unique, entre détente et aventure.
Les lodges et homestays, construits avec des matériaux locaux comme la pierre et le bois, se fondent harmonieusement dans l’environnement. Leur architecture simple mais élégante reflète une philosophie de respect de la nature. Depuis leurs terrasses, les visiteurs peuvent admirer des panoramas grandioses : vallées encaissées, montagnes abruptes et villages traditionnels qui ponctuent le paysage. Chaque lever de soleil sur les roches grises du plateau est une invitation à la contemplation.
Séjourner à Đồng Văn, c’est aussi découvrir une culture vivante. Les marchés hebdomadaires rassemblent les ethnies H’Mông, Dao et Tày dans une explosion de couleurs et de saveurs. Les costumes traditionnels, les chants et les danses créent une ambiance chaleureuse qui contraste avec la rudesse des montagnes. Les voyageurs peuvent partager un repas dans une maison locale, déguster des spécialités comme le maïs grillé ou le rượu ngô, alcool de maïs, et s’imprégner de l’hospitalité des habitants.
À quelques kilomètres, le col de Lũng Cú et sa tour du drapeau marquent le point le plus septentrional du Vietnam. Ce lieu symbolique, perché au-dessus des vallées, offre une vue spectaculaire et une dimension historique forte.
Đồng Văn – Lũng Cú est donc bien plus qu’une étape touristique : c’est une immersion dans un univers où la nature brute rencontre la culture ancestrale, et où chaque séjour devient une parenthèse de ressourcement au sommet des montagnes.

TXT
        );

        $create(
            'Yên Tử – Méditation, sérénité et retraite spirituelle',
            'yen-tu-meditation-serenite',
            'nord',
            'tourisme',
            'yentu.jpg',
            <<<'TXT'
Situé dans la province de Quảng Ninh, le massif de Yên Tử est depuis des siècles un haut lieu du bouddhisme vietnamien. Ses montagnes couvertes de forêts luxuriantes abritent des pagodes et des temples qui attirent pèlerins et voyageurs en quête de spiritualité. Mais Yên Tử ne se limite pas à son patrimoine religieux : c’est aussi une destination idéale pour un séjour placé sous le signe du bien‑être et du ressourcement.
Les resorts et centres de retraite construits dans la région s’inspirent de l’architecture traditionnelle des pagodes. Toits recourbés, bois sculpté et jardins zen créent une atmosphère paisible, propice à la méditation et à la contemplation. Chaque espace est pensé pour favoriser l’harmonie entre l’homme et la nature, offrant aux visiteurs un cadre où le silence et la sérénité dominent.
Les programmes proposés combinent pratiques spirituelles et soins de bien‑être. Les séances de méditation guidée au lever du soleil, les promenades dans les sentiers forestiers et les bains aux herbes médicinales permettent de reconnecter corps et esprit. Les spas locaux mettent en avant des thérapies inspirées des traditions bouddhistes, associant massages, soins énergétiques et alimentation équilibrée.
Au‑delà du bien‑être, Yên Tử est une invitation à la découverte culturelle. Les visiteurs peuvent explorer les pagodes millénaires, écouter les récits des moines et participer à des cérémonies qui perpétuent un héritage spirituel unique.
Séjourner à Yên Tử, c’est vivre une expérience complète : un voyage intérieur autant qu’une immersion dans un environnement naturel et culturel exceptionnel. Entre méditation, détente et spiritualité, Yên Tử incarne l’art du “zen & wellness” au cœur du Nord vietnamien.

TXT
        );

        $create(
            'Lac de Hòa Bình – Détente au bord d’un lac majestueux',
            'lac-hoa-binh-detente',
            'nord',
            'tourisme',
            'hoabinh-lake.jpg',
            <<<'TXT'
À seulement quelques heures de route de Hanoi, le lac de Hòa Bình s’impose comme une destination idéale pour les voyageurs en quête de détente et de nature. Formé par le plus grand barrage hydroélectrique du Vietnam, ce lac majestueux séduit par ses eaux turquoise, ses montagnes environnantes et son atmosphère pure et apaisante.
Les resorts installés au bord du lac offrent une expérience de bien‑être complète. Les piscines à débordement semblent se fondre dans l’horizon aquatique, créant une impression de continuité entre l’espace de détente et le paysage naturel. Les visiteurs peuvent savourer un moment de relaxation sur les terrasses panoramiques, bercés par le souffle léger du vent et le chant des oiseaux.
Pour les amateurs d’activités, le lac est un terrain de jeu idéal. Le kayak permet d’explorer les criques cachées et les petites îles verdoyantes, tandis que les balades en bateau offrent une perspective unique sur les montagnes qui se reflètent dans l’eau. Les randonnées autour du lac complètent l’expérience, invitant à découvrir des villages locaux et à s’imprégner de la culture des ethnies Tày et Muong.
Les espaces de relaxation proposés par les resorts ajoutent une touche de luxe discret. Spas aux herbes médicinales, massages traditionnels et gastronomie locale raffinée transforment le séjour en une véritable parenthèse de bien‑être. Le soir, le coucher du soleil embrase le lac de reflets dorés, offrant un spectacle inoubliable.
Séjourner au lac de Hòa Bình, c’est choisir une destination où la beauté naturelle rencontre le confort moderne. Une invitation à ralentir, à respirer et à savourer l’harmonie entre l’homme et la nature.

TXT
        );

        $create(
            'Cát Bà – Entre mer, forêt et resorts de charme',
            'cat-ba-mer-foret-resorts',
            'nord',
            'tourisme',
            'catba.jpg',
            <<<'TXT'
Située à l’entrée de la baie de Lan Hạ, l’île de Cát Bà est une destination qui séduit par sa combinaison rare de plages de sable fin, de falaises calcaires et de forêts luxuriantes. Véritable joyau du Nord du Vietnam, elle offre aux voyageurs un équilibre parfait entre détente balnéaire et immersion dans la nature.
Les resorts installés le long de la baie bénéficient de vues spectaculaires sur la mer et les formations karstiques. Piscines à débordement, terrasses panoramiques et spas inspirés des traditions locales créent une atmosphère luxueuse mais paisible. Ici, le confort moderne se marie harmonieusement avec le charme naturel de l’île, offrant une expérience de séjour raffinée et ressourçante.
Au‑delà du farniente, Cát Bà invite à l’aventure. Le parc national de Cát Bà, reconnu pour sa biodiversité exceptionnelle, propose des sentiers de randonnée à travers jungles et vallées. Les amateurs de sports nautiques peuvent explorer la baie en kayak, découvrir des lagunes cachées ou s’arrêter sur des plages isolées. Chaque activité révèle une facette différente de ce territoire préservé.
Le soir, les couchers de soleil sur Lan Hạ transforment le paysage en une toile vivante aux reflets dorés et rosés. Les restaurants des resorts mettent en valeur la gastronomie locale, avec des fruits de mer frais et des plats traditionnels revisités.
Séjourner à Cát Bà, c’est choisir une destination où la mer, la forêt et le luxe discret s’unissent pour offrir une expérience inoubliable

TXT
        );

        $create(
            'Sources thermales de Thanh Thủy (Phú Thọ)',
            'thanh-thuy-sources-thermales',
            'nord',
            'tourisme',
            'thanhthuy.jpg',
            <<<'TXT'
Situées dans la province de Phú Thọ, à environ 70 kilomètres de Hanoi, les sources thermales de Thanh Thủy comptent parmi les rares sources chaudes naturelles du Nord du Vietnam. Nichées dans un environnement montagneux verdoyant, elles offrent une parenthèse de détente idéale pour les voyageurs en quête de sérénité et de soins du corps.
Les eaux minérales de Thanh Thủy jaillissent naturellement à une température agréable, riches en oligo‑éléments bénéfiques pour la santé. Elles sont réputées pour soulager les tensions musculaires, améliorer la circulation sanguine et favoriser la relaxation profonde. Les visiteurs peuvent s’immerger dans des bassins thermaux modernes ou choisir des bains plus traditionnels, pour une expérience authentique et apaisante.
Les resorts et centres de bien‑être de la région proposent une gamme complète de services : bains de boue thérapeutiques, massages aux herbes médicinales, soins énergétiques et programmes de spa inspirés des pratiques locales. Chaque détail est pensé pour offrir une immersion totale dans un univers de bien‑être, où le corps et l’esprit se régénèrent au contact de la nature.
Au‑delà des soins, Thanh Thủy séduit par son atmosphère paisible. Les montagnes environnantes invitent à la promenade, tandis que l’air pur et le chant des oiseaux créent un cadre propice à la méditation et au ressourcement. Les visiteurs peuvent également découvrir la gastronomie locale, avec des plats simples et savoureux préparés à partir de produits frais de la région.
Séjourner aux sources thermales de Thanh Thủy, c’est choisir une expérience unique : un voyage où la détente s’allie à la découverte culturelle et où la nature devient le meilleur allié du bien‑être.

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
        Au cœur du Vietnam central, la Cité impériale de Huế incarne la grandeur passée de la dynastie Nguyễn, dernière famille royale du pays. Classée au patrimoine mondial de l’UNESCO, elle est bien plus qu’un vestige : c’est un véritable voyage dans le temps.
        En franchissant la majestueuse porte du Ngọ Môn, le visiteur pénètre dans un univers où l’histoire se mêle à l’élégance architecturale. Derrière ces murailles imposantes s’étend un ensemble de palais, pavillons et jardins conçus selon les principes du feng shui et de la cosmologie orientale. Le palais Thái Hòa, avec son trône impérial, témoigne de la puissance et du raffinement de la cour. Plus loin, la Cité interdite révèle l’intimité de la famille royale, dans une atmosphère empreinte de sérénité.
        Mais Huế ne se limite pas à ses pierres. La ville est aussi le berceau d’une culture vivante. Les visiteurs peuvent assister à des représentations de nhã nhạc cung đình Huế, la musique de cour inscrite au patrimoine immatériel mondial, ou participer à des cérémonies reconstituées qui redonnent vie aux fastes impériaux. Chaque détail – des costumes brodés aux rituels solennels – transporte le spectateur dans l’époque des empereurs.
        La Cité impériale est un lieu où l’on ressent à la fois la majesté et la fragilité du temps. Elle invite à la contemplation, à la découverte et à l’émotion. Un séjour à Huế ne saurait être complet sans cette immersion dans l’âme de l’ancienne capitale, où l’histoire et la beauté continuent de dialoguer avec le présent.
        TXT
        );
        $manager->persist($hueIncroyable);

        $create(
            'Bà Nà Hills – « L’Europe au cœur de Đà Nẵng »',
            'ba-nha-hills',
            'centre',
            'incroyable',
            'bana.jpg',
            <<<'TXT'
Nichée au sommet des montagnes de Trường Sơn, Bà Nà Hills est l’une des destinations les plus emblématiques du centre du Vietnam. Accessible par le téléphérique le plus long du monde, elle offre aux visiteurs une montée spectaculaire au‑dessus des forêts verdoyantes, jusqu’à un plateau où le climat tempéré change au fil des heures, donnant l’impression de vivre quatre saisons en une seule journée.
Le site est célèbre pour son Pont d’Or, chef‑d’œuvre architectural qui semble flotter dans les airs, soutenu par deux mains géantes sculptées dans la pierre. Ce symbole mondial attire des voyageurs venus des quatre coins du monde. Autour, le village français recrée l’atmosphère romantique de l’Europe médiévale, avec ses ruelles pavées, ses façades colorées et ses cafés pittoresques. Les jardins Le Jardin d’Amour invitent à la flânerie, tandis que la cave à vin Debay, construite par les Français au début du XXe siècle, rappelle l’histoire coloniale. Pour les amateurs de divertissement, le Fantasy Park propose des attractions modernes et ludiques.
Bà Nà Hills n’est pas seulement un panorama spectaculaire : c’est une immersion totale dans un univers où nature et artifice, tradition et modernité se rencontrent. Un lieu idéal pour les familles, les couples et les voyageurs en quête d’émerveillement.
TXT
        );

        $create(
            'Hội An – La beauté intemporelle',
            'hoi-an',
            'centre',
            'incroyable',
            'hoi-an.jpg',
            <<<'TXT'
Classée au patrimoine mondial de l’UNESCO, la vieille ville de Hội An est l’un des joyaux les plus précieux du Vietnam. Située sur les rives de la rivière Hoài, elle conserve l’âme d’un ancien port marchand qui, du XVIᵉ au XIXᵉ siècle, fut un carrefour commercial majeur reliant l’Asie et l’Europe.
Dès que l’on franchit ses ruelles pavées, le temps semble suspendu. Les maisons en bois aux façades jaunies, les toits recouverts de mousse et les lanternes multicolores créent une atmosphère à la fois nostalgique et poétique. Chaque pas révèle un fragment d’histoire : le Pont couvert japonais, symbole de la ville, les anciennes maisons de commerce chinoises, ou encore les temples dédiés aux divinités protectrices des marins.
Le jour, Hội An invite à la flânerie. On peut s’arrêter dans les ateliers d’artisans pour admirer la confection des lanternes, goûter aux spécialités locales comme le cao lầu ou les nouilles Quảng, et découvrir les marchés animés où se mêlent senteurs d’épices et éclats de voix. La nuit, la ville se transforme en un tableau vivant : des milliers de lanternes illuminent les ruelles, et la rivière Hoài s’embrase de fleurs flottantes, créant une ambiance féerique.
Au‑delà de son charme architectural, Hội An est un lieu de rencontre des cultures. Les influences chinoises, japonaises et occidentales se reflètent dans son patrimoine, offrant une richesse unique. C’est une destination idéale pour ceux qui recherchent la sérénité, la magie des traditions et l’émotion d’un voyage hors du temps.
TXT
        );

        $create(
            'La Grotte Thiên Đường - Palais souterrain',
            'thien-duong',
            'centre',
            'incroyable',
            'thien-duong.jpg',
            <<<'TXT'
Nichée au cœur du parc national de Phong Nha – Kẻ Bàng, classé au patrimoine mondial de l’UNESCO, la grotte Thiên Đường est une merveille géologique qui fascine les voyageurs du monde entier. Découverte en 2005, elle s’étend sur plus de 30 kilomètres, ce qui en fait l’une des plus longues grottes d’Asie. Son nom, « Paradis », traduit parfaitement l’impression ressentie par ceux qui s’y aventurent.
Dès l’entrée, le visiteur est saisi par la grandeur du lieu : des colonnes de pierre monumentales, des stalactites et stalagmites aux formes étranges et spectaculaires, sculptées par des millions d’années d’érosion. Les voûtes immenses, parfois hautes de plus de 100 mètres, créent une atmosphère presque sacrée. Sous l’éclairage tamisé, les reliefs scintillent comme des cristaux, donnant l’impression d’un palais souterrain façonné par la nature elle‑même.
Le silence profond, seulement interrompu par le bruit discret des gouttes d’eau, et la fraîcheur constante de l’air renforcent la sensation de pénétrer dans un autre monde. Chaque pas révèle une nouvelle « salle » aux formes étonnantes : rideaux de pierre, colonnes massives, sculptures naturelles qui évoquent des animaux ou des temples.
Accessible grâce à des passerelles aménagées, la grotte Thiên Đường convient aussi bien aux aventuriers qu’aux familles. Pour les plus téméraires, des circuits prolongés permettent d’explorer les galeries profondes, loin des sentiers balisés.
Visiter Thiên Đường, c’est vivre une expérience unique : une immersion dans les entrailles de la terre, où la beauté brute de la nature se dévoile dans toute sa majesté. Un chef‑d’œuvre naturel, incontournable pour quiconque souhaite découvrir les trésors cachés du Vietnam.
TXT
        );

        $create(
            'L\'île de Lý Sơn – Royaume de l\'ail et mer turquoise',
            'ly-son',
            'centre',
            'incroyable',
            'ly-son.jpg',
            <<<'TXT'
Située au large de la province de Quảng Ngãi, l’île de Lý Sơn est une destination encore préservée, réputée pour sa beauté sauvage et son histoire millénaire. Formée par des volcans anciens, elle dévoile des paysages spectaculaires : falaises abruptes plongeant dans la mer turquoise, grottes mystérieuses et plages immaculées. Parmi les sites incontournables, Hang Câu impressionne par ses parois sculptées par les vagues, tandis que la pagode Hang, nichée dans une cavité rocheuse, invite à la méditation et à la sérénité.
Du sommet du mont Thới Lới, le panorama est grandiose : l’océan s’étend à perte de vue et le drapeau national flotte fièrement, symbole de l’attachement de l’île à l’histoire maritime du Vietnam. Lý Sơn est en effet liée aux expéditions vers l’archipel de Hoàng Sa, et chaque pierre semble porter la mémoire des marins qui ont protégé ces eaux.
Au‑delà de ses paysages, l’île est célèbre pour ses champs d’ail parfumés, cultivés sur un sol volcanique riche en minéraux. Cet « or blanc » est devenu l’emblème de Lý Sơn, apprécié dans tout le pays. Les visiteurs peuvent aussi savourer des fruits de mer frais, découvrir la vie simple des pêcheurs et partager des moments authentiques avec les habitants.
Lý Sơn est une destination où nature et identité nationale se rejoignent. Elle offre à la fois le charme d’un paradis marin et la profondeur d’un lieu chargé de mémoire. Pour les voyageurs en quête d’aventure, de culture et de contemplation, l’île est une étape incontournable du centre du Vietnam.
TXT
        );

        $create(
            'Ghềnh Đá Đĩa – Merveille géologique de Phú Yên',
            'ghen-dia-dia',
            'centre',
            'incroyable',
            'ghen-dia-dia.jpg',
            <<<'TXT'
Situé sur la côte de la province de Phú Yên, Ghềnh Đá Đĩa est l’un des paysages les plus étonnants du Vietnam. Ce site naturel unique se compose de milliers de colonnes de basalte hexagonales, formées il y a des millions d’années par des coulées de lave refroidies au contact de la mer. Le résultat est une mosaïque spectaculaire qui s’étend vers l’océan, semblable à un immense damier noir sculpté par la nature.
À l’aube, le spectacle est magique : les rayons du soleil embrasent les pierres, créant des reflets dorés tandis que les vagues viennent s’écraser en rythme sur les colonnes. C’est un moment privilégié pour les amateurs de photographie, qui peuvent capturer la beauté brute et la poésie de ce décor. Le site est également idéal pour la contemplation, offrant une atmosphère paisible où l’on se sent en harmonie avec les éléments.
Au‑delà de son aspect visuel, Ghềnh Đá Đĩa est un témoignage fascinant de l’histoire géologique de la région. Les formations rocheuses racontent la puissance des volcans anciens et la lenteur du temps qui façonne la terre. Les habitants de Phú Yên considèrent ce lieu comme un trésor, et il est souvent associé à des légendes locales qui renforcent son aura mystérieuse.
Accessible facilement depuis Tuy Hòa, Ghềnh Đá Đĩa est une excursion incontournable pour quiconque visite le centre du Vietnam. Entre science et poésie, ce site invite à la découverte, à l’émerveillement et à la réflexion sur la grandeur de la nature.
TXT
        );

        $create(
            'Quy Nhơn – Ville côtière paisible',
            'quy-nhon',
            'centre',
            'incroyable',
            'quy-nhon.jpg',
            <<<'TXT'
Au cœur du Centre vietnamien, Quy Nhơn s’impose comme une destination balnéaire émergente, encore préservée du tourisme de masse. Cette ville côtière séduit par ses plages de sable blanc bordées d’eaux turquoise, où le rythme des vagues invite à la détente et à la contemplation. Parmi les sites incontournables, Eo Gió offre un panorama spectaculaire de falaises plongeant dans la mer, tandis que Kỳ Co séduit par son sable fin et ses eaux cristallines, idéales pour la baignade. Le site poétique de Ghềnh Ráng Tiên Sa, associé à la mémoire du poète Hàn Mặc Tử, ajoute une touche culturelle et romantique à l’expérience.
Quy Nhơn ne se limite pas à ses paysages marins. La ville conserve de précieux vestiges de la civilisation Cham, avec ses tours anciennes qui témoignent d’un passé riche et mystérieux. Ces monuments, disséminés dans la région, rappellent l’importance historique de cette terre au carrefour des cultures.
La gastronomie locale est un autre atout majeur. Les marchés et restaurants regorgent de produits de la mer fraîchement pêchés : huîtres, crevettes, crabes et poissons grillés, préparés avec simplicité mais une saveur incomparable. Chaque repas devient une immersion dans l’art culinaire vietnamien.
Contrairement aux stations balnéaires animées comme Nha Trang ou Đà Nẵng, Quy Nhơn conserve une atmosphère paisible. Ici, pas de foule pressée ni de bruit incessant : seulement le charme discret d’une ville tournée vers la mer, où l’on peut se ressourcer pleinement.
Quy Nhơn est ainsi une destination idéale pour les voyageurs en quête de sérénité, d’authenticité et de découvertes culturelles. Une perle encore secrète, qui promet des souvenirs inoubliables au cœur du Vietnam.
TXT
        );

        // ==========================
        // 10. (CENTRE / CULTURE)
        // Hội An
        // ==========================
        $hoiAnCulture = (new ExperienceSpot())
            ->setTitle('Hội An – Ville des lanternes et des traditions')
            ->setSlug('hoi-an-culture')
            ->setRegion('centre')
            ->setCategory('culture')
            ->setImageFilename('hoian-culture.jpg')
            ->setShortDescription(<<<'TXT'
        Classée au patrimoine mondial de l’UNESCO, Hội An est l’un des joyaux les plus précieux du Vietnam. Ancien port marchand prospère du XVIᵉ au XIXᵉ siècle, la ville fut un carrefour commercial reliant l’Asie et l’Europe. Aujourd’hui, elle conserve une atmosphère unique où le temps semble suspendu, offrant aux visiteurs une immersion dans l’histoire et la culture.
Les ruelles pavées bordées de maisons anciennes aux façades jaunes, les temples chinois et le célèbre Pont couvert japonais témoignent de ce riche passé. Chaque bâtiment raconte une histoire, reflet des influences chinoises, japonaises et occidentales qui se sont entremêlées au fil des siècles.
Le jour, Hội An invite à la découverte et à la participation. Les visiteurs peuvent s’initier à la fabrication des lanternes colorées, symbole de la ville, ou apprendre à cuisiner des spécialités locales comme le cao lầu ou les nouilles Quảng. Les marchés animés regorgent de produits artisanaux, d’épices parfumées et de tissus traditionnels, offrant une expérience sensorielle inoubliable.
La nuit, Hội An se transforme en un véritable tableau vivant. Des milliers de lanternes illuminent les ruelles et la rivière Hoài scintille de fleurs flottantes, créant une ambiance féerique. Les festivités nocturnes, les spectacles de musique traditionnelle et les promenades en bateau renforcent la magie de ce lieu hors du temps.
Hội An est bien plus qu’une ville ancienne : c’est un carrefour culturel où traditions et influences se rencontrent, un espace où l’on savoure la sérénité et la beauté intemporelle. Une destination incontournable pour quiconque souhaite découvrir l’âme poétique du Vietnam.
TXT
        );
        $manager->persist($hoiAnCulture);

        // 11. (CENTRE / CULTURE)
        // Đà Nẵng
        $create(
            'Đà Nẵng – La ville de la rivière Han et des ponts légendaires',
            'da-nang-culture',
            'centre',
            'culture',
            'danang-culture.jpg',
            <<<'TXT'
Située au bord de la mer de l'Est, Đà Nẵng est une ville en pleine expansion qui allie harmonieusement modernité et traditions. La rivière Han, qui traverse la ville, est l'âme de Đà Nẵng, bordée de ponts spectaculaires comme le célèbre pont Dragon qui crache du feu les soirs de week-end. La culture locale est profondément influencée par la pêche, avec le village de pêcheurs de Nam Ô préservant encore les techniques traditionnelles de fabrication de sauce de poisson.

La ville abrite également le musée de la culture Cham, qui expose des trésors archéologiques de l'ancien royaume du Champa. Les marchés nocturnes comme celui de Hàn offrent une expérience sensorielle avec leurs étals colorés de spécialités locales telles que le bánh xèo et le mì Quảng. Les habitants de Đà Nẵng sont connus pour leur accueil chaleureux et leur dialecte chantant unique dans la région centrale.

Les fêtes traditionnelles comme la fête de pêcheurs Cầu Ngư et le festival international des feux d'artifice attirent des visiteurs du monde entier. La ville est également un centre important pour les arts martiaux traditionnels vietnamiens, avec de nombreuses écoles perpétuant ces pratiques ancestrales.
TXT
        );

        // 12. (CENTRE / CULTURE)
        // Quảng Nam
        $create(
            'Quảng Nam – Terre des patrimoines culturels intemporels',
            'quang-nam-culture',
            'centre',
            'culture',
            'quangnam-culture.jpg',
            <<<'TXT'
Quảng Nam est une terre riche en patrimoines culturels, abritant non seulement Hội An mais aussi le sanctuaire de Mỹ Sơn, classé au patrimoine mondial de l'UNESCO. Ce site archéologique exceptionnel témoigne de la grandeur de la civilisation Cham avec ses tours-sanctuaires en brique dédiées aux divinités hindoues. Les techniques de construction utilisées, sans mortier, restent un mystère pour les archéologues.

La province est également connue pour ses villages de métiers traditionnels comme le village de poterie de Thanh Hà et le village de menuiserie de Kim Bồng. Les artisans perpétuent des savoir-faire ancestraux, créant des œuvres d'une finesse remarquable. La musique traditionnelle, notamment le bài chòi, classée au patrimoine culturel immatériel de l'UNESCO, anime les rues lors des fêtes villageoises.

La cuisine de Quảng Nam est réputée pour ses saveurs uniques, avec des spécialités comme le mì Quảng, le bánh ít lá gai et le cao lầu. Les marchés flottants sur la rivière Thu Bồn offrent une expérience authentique de la vie locale, où les échanges se font encore selon des coutumes séculaires.
TXT
        );

        // 13. (CENTRE / CULTURE)
        // Quảng Bình
        $create(
            'Quảng Bình – La terre des grottes et des légendes',
            'quang-binh-culture',
            'centre',
            'culture',
            'quangbinh-culture.jpg',
            <<<'TXT'
Quảng Bình, connue pour ses paysages karstiques spectaculaires et son système de grottes exceptionnel, est également un creuset culturel fascinant. La grotte de Sơn Đoòng, la plus grande du monde, est devenue un symbole de la région, attirant des explorateurs du monde entier. Mais au-delà de ses merveilles naturelles, Quảng Bình préserve jalousement ses traditions culturelles uniques.

La culture des minorités ethniques, notamment les Bru-Vân Kiều et les Chứt, enrichit le patrimoine local. Leurs chants traditionnels, comme le hát ru et le hát giao duyên, racontent des épopées légendaires et la vie quotidienne. Les fêtes villageoises, comme la cérémonie du culte des ancêtres et la fête de la nouvelle récolte, sont des occasions de célébrer l'identité culturelle.

La cuisine de Quảng Bình est marquée par des saveurs audacieuses, avec des spécialités comme le cháo canh (soupe de riz aux boulettes), le bánh bột lọc (gâteaux de farine de riz farcis) et les fruits de mer frais de la mer de l'Est. Les marchés locaux, comme celui de Đồng Hới, offrent une immersion dans la vie quotidienne des habitants, connus pour leur hospitalité légendaire et leur résilience face aux défis naturels.
TXT
        );

        // 14. (CENTRE / CULTURE)
        // Quảng Trị
        $create(
            'Quảng Trị – Mémoire historique et traditions vivantes',
            'quang-tri-culture',
            'centre',
            'culture',
            'quangtri-culture.jpg',
            <<<'TXT'
Quảng Trị, marquée par son histoire mouvementée, est aujourd'hui un lieu de mémoire et de renaissance culturelle. L'ancienne citadelle de Quảng Trị, témoin de batailles historiques, est devenue un symbole de paix et de réconciliation. Le pont Hiền Lương sur la rivière Bến Hải, autrefois ligne de démarcation entre le Nord et le Sud, est un lieu de pèlerinage chargé d'émotion.

La culture de Quảng Trị est profondément enracinée dans les traditions agricoles et maritimes. Les fêtes villageoises, comme la fête Cầu Ngư (culte des baleines) et la fête de la récolte, célèbrent le lien intime entre l'homme et la nature. Les chants traditionnels, notamment le hò khoan et le hò mái nhì, sont des trésors du patrimoine immatériel.

L'artisanat traditionnel, notamment la vannerie et la poterie, est encore pratiqué dans de nombreux villages. La cuisine locale, avec des spécialités comme le bánh ướt thịt nướng et les fruits de mer frais, reflète la générosité de la terre et de la mer. Les habitants de Quảng Trị sont connus pour leur courage, leur ténacité et leur hospitalité chaleureuse envers les visiteurs.
TXT
        );

        $create(
            'Huế – Héritage impérial et musique de cour',
            'hue-culture',
            'centre',
            'culture',
            'hue-culture.jpg',
            <<<'TXT'
Située au cœur du Vietnam central, Huế est une ville qui incarne la grandeur passée de la dynastie Nguyễn, dernière famille royale du pays. Ancienne capitale impériale, elle conserve une atmosphère unique où l’histoire et la poésie se mêlent. Classée au patrimoine mondial de l’UNESCO, Huế est une destination incontournable pour les voyageurs en quête de culture et d’émotion.
En franchissant la majestueuse porte du Ngọ Môn, le visiteur pénètre dans la Cité impériale, véritable cœur battant de la ville. Derrière ses murailles imposantes s’étendent des palais, des pavillons et des jardins conçus selon les principes du feng shui et de la cosmologie orientale. Le palais Thái Hòa, avec son trône impérial, témoigne de la puissance et du raffinement de la cour, tandis que la Cité interdite révèle l’intimité de la famille royale dans une atmosphère empreinte de sérénité.
Mais Huế ne se limite pas à son architecture majestueuse. Elle est aussi le berceau du nhã nhạc cung đình Huế, musique de cour inscrite au patrimoine immatériel de l’UNESCO. Ces mélodies solennelles, autrefois réservées aux cérémonies royales, sont aujourd’hui interprétées lors de spectacles qui transportent le spectateur dans l’univers fastueux des empereurs. Les reconstitutions de rituels impériaux, l’élégance des costumes traditionnels et la grâce des danseurs offrent une immersion culturelle rare et émouvante.
Huế est une ville où chaque pierre raconte une histoire et où chaque note de musique résonne comme un écho du passé. Entre patrimoine architectural, traditions vivantes et atmosphère poétique, elle invite à un voyage hors du temps, au cœur de l’âme impériale du Vietnam.
TXT
        );

        // ==========================
        // 12. (CENTRE / TOURISME)
        // Lăng Cô
        $create(
            'Lăng Cô – La baie de rêve du Centre',
            'lang-co-baie-reve',
            'centre',
            'tourisme',
            'langco-tourisme.jpg',
            <<<'TXT'
Nichée entre la mer de l'Est et la chaîne de montagnes Truong Son, la baie de Lăng Cô est un véritable paradis pour les amoureux de la nature et du farniente. Cette baie en forme de croissant de lune s'étend sur près de 10 km de plages de sable blanc immaculé, baignées par des eaux turquoise et protégées par les montagnes de Bach Ma. Classée parmi les plus belles baies du monde, Lăng Cô offre un cadre idyllique pour des vacances reposantes.

Les complexes hôteliers de luxe et les stations balnéaires haut de gamme bordent le littoral, offrant des hébergements avec vue imprenable sur la mer. Les activités nautiques ne manquent pas : plongée avec masque et tubulaire dans les récifs coralliens, planche à voile, kayak ou simple baignade dans des eaux à la température idéale. Les amateurs de golf apprécieront le parcours de 18 trous conçu par Sir Nick Faldo, qui offre des vues spectaculaires sur la baie et les montagnes environnantes.

Pour une expérience plus authentique, les visiteurs peuvent explorer les villages de pêcheurs locaux, déguster des fruits de mer frais dans les petits restaurants en bord de plage, ou partir en excursion vers les chutes d'eau de Bach Ma. Le soir, la promenade le long de la plage éclairée par la lune est un moment magique, bercé par le doux bruit des vagues.
TXT
        );

        // 13. (CENTRE / TOURISME)
        // Bà Nà Hills
        $create(
            'Bà Nà Hills – La station climatique française',
            'ba-na-hills-station-climatique',
            'centre',
            'tourisme',
            'banahills-tourisme.jpg',
            <<<'TXT'
Perchée à 1 487 mètres d'altitude sur les montagnes de Truong Son, Bà Nà Hills est une station climatique coloniale française redécouverte et transformée en complexe touristique de renommée internationale. Accessible par le téléphérique le plus long du monde (5 801 mètres), le voyage offre des vues spectaculaires sur les montagnes et les forêts environnantes.

À l'arrivée, les visiteurs découvrent un village de montagne européen avec des rues pavées, des hôtels de style médiéval et des jardins fleuris. La température fraîche (15-20°C) contraste agréablement avec la chaleur de la plaine, faisant de Bà Nà une escapade rafraîchissante. L'attraction phare est le Golden Bridge (Pont d'Or), une impressionnante passerelle piétonne soutenue par deux mains de pierre géantes, offrant une vue à couper le souffle sur les montagnes.

Le complexe comprend également le parc d'attractions Fantasy Park, des jardins de fleurs, un village français, des temples bouddhistes et même une cave à vin. Les amateurs de gastronomie apprécieront les restaurants servant à la fois des spécialités vietnamiennes et internationales. La nuit, les illuminations transforment Bà Nà en un véritable conte de fées, avec des spectacles de lumière et des animations.
TXT
        );

        // 14. (CENTRE / TOURISME)
        // Đắk Lắk
        $create(
            'Đắk Lắk – Royaume des Hauts Plateaux du Centre',
            'dak-lak-hauts-plateaux',
            'centre',
            'tourisme',
            'daklak-tourisme.jpg',
            <<<'TXT'
Situé sur les hauts plateaux du Centre, le Đắk Lắk est une terre de mystère et de traditions ethniques, dominée par la culture des minorités Êđê, M'nông et Gia Rai. La province est réputée pour ses immenses plantations de caféiers qui s'étendent à perte de vue, faisant d'elle la capitale du café du Vietnam. Buôn Ma Thuột, la capitale provinciale, abrite le fascinant musée d'Ethnographie du Vietnam qui retrace la vie des 44 groupes ethniques de la région. Les visiteurs peuvent explorer les villages traditionnels des minorités ethniques, comme le village de Buôn Đôn, célèbre pour ses éléphants domestiqués et ses maisons sur pilotis caractéristiques.

La nature généreuse de Đắk Lắk se révèle à travers ses paysages époustouflants. Le lac Lak, le plus grand lac d'eau douce de la région, offre des paysages à couper le souffle, surtout au lever et au coucher du soleil. Les chutes d'eau spectaculaires comme Dray Nur et Dray Sap, entourées d'une forêt tropicale luxuriante, sont des sites incontournables. Les amateurs d'écotourisme apprécieront les randonnées dans le parc national de Yok Đôn, la plus grande réserve naturelle du Vietnam, abritant de nombreuses espèces menacées comme les éléphants d'Asie et les tigres indochinois.

La culture unique des minorités ethniques se reflète dans leurs festivals traditionnels, comme la fête du Gong, classée au patrimoine culturel immatériel de l'UNESCO. Les visiteurs peuvent assister à des spectacles de musique traditionnelle avec des gongs en bronze et des instruments en bambou, ou participer à des cérémonies du vin de riz (rượu cần) dans les maisons communales. La cuisine locale, influencée par les traditions culinaires des Hauts Plateaux, propose des spécialités comme le porc grillé aux épices de la forêt, le riz cuit dans des tubes de bambou, et bien sûr, le célèbre café robusta de renommée mondiale.
TXT
        );

        // 15. (CENTRE / TOURISME)
        // Nha Trang
        $create(
            'Nha Trang – La perle de la mer d\'Orient',
            'nha-trang-perle-mer-orient',
            'centre',
            'tourisme',
            'nhatrang-tourisme.jpg',
            <<<'TXT'
Avec sa baie en forme de croissant bordée de près de 7 km de plages de sable fin, Nha Trang est la station balnéaire la plus réputée du Vietnam. Son climat ensoleillé presque toute l'année, ses eaux cristallines et ses récifs coralliens exceptionnels en font une destination idéale pour les amateurs de farniente et de sports nautiques.

La baie de Nha Trang, classée parmi les plus belles du monde, offre des paysages à couper le souffle, avec en toile de fond les montagnes du massif de l'Annam. Les îles environnantes, comme l'île aux Singes ou l'île de la Baleine, sont des paradis pour la plongée sous-marine et le snorkeling. Le parc d'attractions Vinpearl, accessible par téléphérique au-dessus de la mer, propose des activités pour toute la famille.

En ville, les visiteurs peuvent profiter des sources thermales naturelles de Thap Ba, visiter la tour Cham Po Nagar du VIIIe siècle, ou se détendre dans les bains de boue thérapeutiques. La vie nocturne animée, avec ses bars en bord de mer et ses restaurants de fruits de mer frais, ajoute une touche festive à cette destination balnéaire complète.
TXT
        );

        // 16. (CENTRE / TOURISME)
        // Phú Yên
        $create(
            'Phú Yên – La terre du soleil levant',
            'phu-yen-soleil-levant',
            'centre',
            'tourisme',
            'phuyen-tourisme.jpg',
            <<<'TXT'
Phú Yên, située entre Nha Trang et Quy Nhơn, est une destination encore préservée du tourisme de masse, idéale pour les voyageurs en quête d'authenticité et de nature sauvage. La province est célèbre pour ses paysages côtiers spectaculaires, ses plages désertes et ses rizières à perte de vue.

La plage de Bãi Xép, rendue célèbre par le film "À la verticale de l'été", est un véritable joyau avec son sable doré et ses eaux cristallines. Non loin de là, la falaise de Mũi Điện, point le plus à l'est du Vietnam, offre un spectacle inoubliable au lever du soleil. Les amateurs de nature apprécieront la réserve naturelle de Cổ Mã et ses forêts de mangroves, ou la cascade de Bà Đổ, nichée au cœur d'une forêt tropicale.

Phú Yên est également riche en patrimoine culturel, avec la tour Nhan, un vestige de la civilisation Cham, et le musée provincial qui retrace l'histoire de la région. La cuisine locale, à base de produits de la mer frais et d'herbes aromatiques, est un véritable régal pour les papilles. Les spécialités à ne pas manquer incluent le bánh xèo tôm nhảy (crêpe croustillante aux crevettes sautantes) et les huîtres de sông Cầu.
TXT
        );

        // 17. (CENTRE / TOURISME)
        // Quy Nhơn
        $create(
            'Quy Nhơn – La discrète beauté du Centre',
            'quy-nhon-beaute-discrete',
            'centre',
            'tourisme',
            'quynhon-tourisme.jpg',
            <<<'TXT'
Quy Nhơn, capitale de la province de Bình Định, est une destination balnéaire encore préservée qui séduit par son authenticité et son rythme de vie paisible. Contrairement aux stations balnéaires plus fréquentées, Quy Nhơn a su conserver son âme et son caractère provincial, tout en offrant des infrastructures touristiques de qualité.

La plage de Quy Nhơn s'étend sur près de 10 km, bordée de cocotiers et de filaos. Les eaux claires et peu profondes sont idéales pour la baignade, tandis que les récifs coralliens au large attirent les amateurs de plongée sous-marine. La presqu'île de Phương Mai, accessible en bateau, est un paradis pour les amoureux de la nature avec ses paysages sauvages et ses plages désertes.

La région est également riche en sites historiques, notamment les tours Cham de Bánh Ít et Dương Long, témoins de l'ancien royaume du Champa. Les amateurs de randonnée apprécieront les collines environnantes, comme celle de Vũng Chua, qui offrent des vues panoramiques sur la baie. La cuisine de Quy Nhơn, réputée dans tout le pays, met à l'honneur les fruits de mer frais, les nouilles de riz et les spécialités à base de bœuf.
TXT
        );

        // 18. (CENTRE / TOURISME)
        // Đồng Hới
        $create(
            'Đồng Hới – Porte d\'entrée du paradis des grottes',
            'dong-hoi-paradis-grottes',
            'centre',
            'tourisme',
            'donghoi-tourisme.jpg',
            <<<'TXT'
Située sur la côte centrale du Vietnam, Đồng Hới est la porte d'entrée du parc national de Phong Nha-Kẻ Bàng, classé au patrimoine mondial de l'UNESCO pour son système de grottes exceptionnel. La ville elle-même, construite sur les rives de la rivière Nhật Lệ, offre un mélange harmonieux de plages de sable blanc, de montagnes calcaires et de sites historiques.

La plage de Nhật Lệ, longue de 12 km, est réputée pour son sable fin et ses eaux cristalliques. Les amateurs d'histoire apprécieront la citadelle de Đồng Hới, construite au XIXe siècle, et le pont de la rivière Nhật Lệ, témoin de la guerre du Vietnam. Les marchés locaux, comme le marché Đồng Hới, sont des lieux animés où découvrir la vie quotidienne des habitants et goûter aux spécialités locales.

Mais le véritable joyau de la région reste le parc national de Phong Nha-Kẻ Bàng, à environ 50 km au nord-ouest de la ville. Ce paradis des spéléologues abrite des centaines de grottes et de galeries souterraines, dont la célèbre grotte de Sơn Đoòng, la plus grande grotte du monde. Des excursions en bateau sur la rivière souterraine de Phong Nha ou des randonnées dans la jungle permettent de découvrir ces merveilles naturelles.
TXT
        );

        // ==========================
        // 19. (SUD / INCROYABLE)
        // Cần Thơ
        // ==========================
        $create(
            'Cần Thơ – Cœur du delta du Mékong',
            'can-tho-mekong',
            'sud',
            'incroyable',
            'cantho.jpg',
            <<<'TXT'
Capitale du delta du Mékong, Cần Thơ est réputée pour son marché flottant de Cái Răng, l'un des plus grands et des plus animés du delta. La ville est sillonnée par de nombreux canaux et arroyos, offrant un paysage aquatique unique. Les visiteurs peuvent explorer les marchés flottants tôt le matin, déguster des fruits tropicaux frais directement des bateaux des marchands, et découvrir la vie fluviale authentique. La maison ancienne de Bình Thủy, avec son architecture coloniale française, et les jardins fruitiers de Cồn Sơn, accessibles en bateau, sont des incontournables. La douceur de vivre et la gentillesse des habitants font de Cần Thơ une destination chaleureuse et accueillante.
TXT
        );

        // 20. (SUD / INCROYABLE)
        // Châu Đốc
        $create(
            'Châu Đốc – Carrefour des cultures khmère, chinoise et vietnamienne',
            'chau-doc-culture',
            'sud',
            'incroyable',
            'chau-doc.jpg',
            <<<'TXT'
Située à la frontière cambodgienne, Châu Đốc est un véritable carrefour culturel où se mêlent influences khmères, chinoises et vietnamiennes. La ville est célèbre pour son marché flottant de Châu Đốc, plus authentique et moins touristique que celui de Cần Thơ. Le mont Sam, avec sa vue panoramique sur la plaine inondable, abrite des pagodes sacrées comme la pagode de la Dame Chúa Xứ. Les visiteurs peuvent explorer les villages de pêcheurs flottants sur le fleuve Bassac, découvrir l'élevage de poissons dans des cages sous les maisons flottantes, et visiter le village de la soie de Tân Châu, réputé pour ses étoffes traditionnelles. La diversité culturelle et religieuse de la ville se reflète dans ses nombreux temples, pagodes et mosquées.
TXT
        );

        // 21. (SUD / INCROYABLE)
        // Cà Mau
        $create(
            'Cà Mau – La terre la plus méridionale du Vietnam',
            'ca-mau-extreme-sud',
            'sud',
            'incroyable',
            'ca-mau.jpg',
            <<<'TXT'
Située à l'extrême sud du Vietnam, Cà Mau est une destination hors des sentiers battus qui offre une expérience authentique du delta du Mékong. La région est célèbre pour sa forêt d'U Minh, réserve de biosphère de l'UNESCO, où les visiteurs peuvent explorer des canaux étroits bordés de forêts de cajeputs et observer une faune exceptionnelle. Le cap Cà Mau, point le plus méridional du pays, offre des couchers de soleil spectaculaires sur la mer de l'Est. Les marchés flottants de Cái Tàu et de Cái Nước permettent de découvrir la vie quotidienne des habitants. La région est également connue pour ses spécialités culinaires uniques, comme le lẩu mắm (fondue de poisson fermenté) et les crevettes des forêts de mangroves.
TXT
        );

        // 22. (SUD / INCROYABLE)
        // Bến Tre
        $create(
            'Bến Tre – Le royaume des cocotiers',
            'ben-tre-cocotiers',
            'sud',
            'incroyable',
            'ben-tre.jpg',
            <<<'TXT'
Surnommée "la terre des cocotiers", Bến Tre est une destination paisible du delta du Mékong, réputée pour ses paysages bucoliques et son artisanat traditionnel. Les visiteurs peuvent explorer les canaux ombragés en barque à rame, visiter des ateliers de fabrication de bonbons à la noix de coco et de nattes en jonc, et déguster des spécialités locales comme le gâteau de riz aux œufs de fourmis. Les vergers luxuriants de l'île de Cồn Phụng et de Cồn Ốc offrent des paysages typiques du delta, avec leurs maisons sur pilotis entourées de jardins fruitiers. La réserve d'oiseaux de Vàm Hồ est un paradis pour les amateurs d'ornithologie, avec des milliers d'oiseaux aquatiques nicheurs.
TXT
        );

        // 23. (SUD / INCROYABLE)
        // Sóc Trăng
        $create(
            'Sóc Trăng – Mosaïque culturelle khmère',
            'soc-trang-khmer',
            'sud',
            'incroyable',
            'soc-trang.jpg',
            <<<'TXT'
Sóc Trăng est une destination fascinante où se mêlent les cultures khmère, chinoise et vietnamienne. La ville est célèbre pour ses nombreuses pagodes khmères, dont la pagode Dơi (pagode des Chauve-souris) et la pagode Chén Kiểu, ornée de milliers de morceaux de porcelaine. Le marché de nuit de Sóc Trăng est un véritable régal pour les sens, avec ses étals de fruits de mer frais et de spécialités locales. La région est également connue pour ses festivals colorés, comme le festival Ok Om Bok (fête de la lune) et le festival Nghinh Ông (culte de la baleine). Les visiteurs peuvent également explorer les villages de potiers de l'ethnie Khmer et déguster des spécialités comme le bánh pía (gâteau à la pâte de haricot mungo).
TXT
        );

        // 24. (SUD / INCROYABLE)
        // Trà Vinh
        $create(
            'Trà Vinh – Havre de paix khmer',
            'tra-vinh-paix',
            'sud',
            'incroyable',
            'tra-vinh.jpg',
            <<<'TXT'
Trà Vinh est une province paisible du delta du Mékong, réputée pour sa forte communauté khmère et ses nombreuses pagodes anciennes. La pagode Vàm Ray, située sur une île au milieu d'une forêt de cajeputs, est un lieu de pèlerinage important pour les bouddhistes khmers. Les visiteurs peuvent explorer les villages artisanaux traditionnels, comme le village de tissage de nattes de Long Đức, et déguster des spécialités khmères comme le bánh cống (beignets de crevettes) et le bún nước lèo (soupe de poisson). La réserve ornithologique de Ba Động est un paradis pour les amoureux de la nature, avec des milliers d'oiseaux aquatiques évoluant dans un écosystème préservé de forêts inondées et de marécages.
TXT
        );

        // 25. (SUD / INCROYABLE)
        // Vĩnh Long
        $create(
            'Vĩnh Long – Authenticité du delta',
            'vinh-long-authentique',
            'sud',
            'incroyable',
            'vinh-long.jpg',
            <<<'TXT'
Vĩnh Long est une destination idéale pour découvrir la vie authentique du delta du Mékong, loin des sentiers touristiques. La ville est entourée d'innombrables canaux et arroyos, offrant des paysages typiques du delta. Les visiteurs peuvent explorer les marchés flottants animés de Cái Bè et de Cái Răng, visiter des ateliers d'artisanat traditionnel comme la fabrication de briques et la poterie, et déguster des spécialités locales comme le bánh tét (gâteau de riz gluant farci) et le lẩu mắm (fondue de poisson fermenté). Les îles de Bình Hòa Phước et An Bình, accessibles en bateau, offrent des paysages bucoliques de vergers luxuriants et de maisons sur pilotis, ainsi que des hébergements chez l'habitant pour une immersion totale dans la vie locale.
TXT
        );

        // 13. (SUD / CULTURE)
        // Hô Chi Minh-Ville
        // ==========================
        $create(
            'Hô Chi Minh-Ville – Métropole entre tradition et modernité',
            'ho-chi-minh-ville-culture',
            'sud',
            'culture',
            'hcmc-culture.jpg',
            <<<'TXT'
Anciennement Saïgon, Hô Chi Minh-Ville est un fascinant mélange d'influences chinoises, françaises et vietnamiennes. La cathédrale Notre-Dame, la poste centrale conçue par Gustave Eiffel et le théâtre municipal témoignent de l'héritage colonial français. Les quartiers de Cholon, avec ses pagodes et marchés animés, reflètent la forte présence de la communauté chinoise. La culture des cafés en terrasse, les marchés nocturnes comme Bến Thành, et les spectacles de musique traditionnelle cải lương dans les maisons de la culture offrent une immersion dans la vie locale. La ville est également un centre de l'art contemporain vietnamien, avec des galeries comme The Factory Contemporary Arts Centre.
TXT
        );

        // 14. (SUD / CULTURE)
        // Mỹ Tho
        $create(
            'Mỹ Tho – Berceau de la culture du Sud',
            'my-tho-culture',
            'sud',
            'culture',
            'my-tho.jpg',
            <<<'TXT'
Mỹ Tho, l'une des plus anciennes villes du Sud, est réputée pour son patrimoine culturel riche et ses traditions artisanales. La pagode Vĩnh Tràng, chef-d'œuvre d'architecture bouddhiste, mêle styles vietnamien, chinois et européen. La ville est célèbre pour son art du chant traditionnel đờn ca tài tử, classé au patrimoine culturel immatériel de l'UNESCO. Les visiteurs peuvent assister à des représentations dans les maisons communales ou lors des fêtes du Tết. Les villages artisanaux de Mỹ Phong perpétuent la fabrication de nattes en jonc et de poteries traditionnelles. La cuisine de Mỹ Tho, avec ses spécialités comme la soupe de nouilles hủ tiếu, reflète le métissage culturel de la région.
TXT
        );

        // 15. (SUD / CULTURE)
        // Bến Tre
        $create(
            'Bến Tre – Terre des traditions du delta',
            'ben-tre-culture',
            'sud',
            'culture',
            'ben-tre-culture.jpg',
            <<<'TXT'
Bến Tre est le berceau de la culture des vergers du Mékong, où la vie s'organise autour de l'eau et des arbres fruitiers. La province est réputée pour ses villages artisanaux spécialisés dans le travail de la noix de coco, du jonc et de la vannerie. Les maisons-jardins traditionnelles, entourées de canaux et de vergers, reflètent l'harmonie entre l'homme et la nature. La culture du đờn ca tài tử (chant des amateurs) est particulièrement vivante ici, avec des représentations organisées dans les maisons communales. Les fêtes villageoises, comme la fête du culte du génie du sol (Lễ Kỳ Yên), sont l'occasion de découvrir les croyances populaires et les rites agricoles traditionnels.
TXT
        );

        // 16. (SUD / CULTURE)
        // Vĩnh Long
        $create(
            'Vĩnh Long – Carrefour culturel du Mékong',
            'vinh-long-culture',
            'sud',
            'culture',
            'vinh-long-culture.jpg',
            <<<'TXT'
Vĩnh Long est un véritable musée à ciel ouvert de la culture du delta du Mékong. La province abrite des communautés khmère, chinoise et vietnamienne vivant en harmonie. Le village de la céramique de Cổ Chiên est réputé pour ses poteries traditionnelles fabriquées selon des techniques séculaires. Les temples caodaïstes, comme celui de Tây Ninh, offrent un aperçu fascinant de cette religion syncrétique née au Vietnam. Les marchés flottants de Cái Bè et Cái Răng sont des lieux d'échange culturel où se mêlent différentes ethnies. La musique traditionnelle du Sud, notamment le vọng cổ, résonne dans les maisons de la culture et lors des fêtes villageoises.
TXT
        );

        // 17. (SUD / CULTURE)
        // Sóc Trăng
        $create(
            'Sóc Trăng – Mosaïque culturelle khmère',
            'soc-trang-culture',
            'sud',
            'culture',
            'soc-trang-culture.jpg',
            <<<'TXT'
Sóc Trăng est un véritable creuset culturel où se mêlent les traditions khmère, chinoise et vietnamienne. La province compte plus de 200 pagodes khmères, dont la célèbre pagode Dơi (pagode des Chauve-souris) et la pagode Chén Kiểu ornée de milliers de morceaux de porcelaine. Le festival Ok Om Bok (fête de la lune) est un événement majeur qui célèbre la fin de la saison des récoltes avec des courses de pirogues traditionnelles. L'artisanat local, notamment le tissage de soie et la poterie, reflète le savoir-faire ancestral des artisans khmers. La cuisine de Sóc Trăng, influencée par les trois cultures, est réputée pour ses plats épicés et parfumés comme le bún nước lèo et le bánh pía.
TXT
        );

        // 18. (SUD / CULTURE)
        // Cần Thơ
        $create(
            'Cần Thơ – Capitale culturelle du delta',
            'can-tho-culture',
            'sud',
            'culture',
            'can-tho-culture.jpg',
            <<<'TXT'
Cần Thơ, la plus grande ville du delta du Mékong, est un centre culturel dynamique où se côtoient traditions et modernité. Le marché flottant de Cái Răng, classé au patrimoine culturel immatériel, est un véritable musée vivant du commerce fluvial traditionnel. La ville abrite plusieurs établissements culturels importants comme le musée de Cần Thơ et le théâtre de la ville, qui proposent régulièrement des spectacles de musique et de danse traditionnelles. Les villages artisanaux des alentours perpétuent des métiers ancestraux comme la fabrication de nattes, la vannerie et la transformation des produits agricoles. La cuisine de Cần Thơ, avec ses spécialités comme le lẩu mắm et le bún cá, reflète la richesse des produits du delta.
TXT
        );

        // 19. (SUD / CULTURE)
        // An Giang
        $create(
            'An Giang – Terre de spiritualité et de traditions',
            'an-giang-culture',
            'sud',
            'culture',
            'an-giang.jpg',
            <<<'TXT'
An Giang est une terre de spiritualité où se côtoient bouddhisme, islam et caodaïsme. La province abrite la plus grande communauté khmère du Vietnam, dont la culture est particulièrement vivante dans les districts de Tri Tôn et Tịnh Biên. La pagode de Xà Tón, construite en 1689, est un important centre de la culture khmère. La région est également connue pour ses villages de tissage de la soie et de production de sucre de palme. Les fêtes traditionnelles, comme le Chol Chnam Thmay (Nouvel An khmer) et le Dolta (fête des morts), sont célébrées avec faste. La cuisine d'An Giang, influencée par les cultures khmère, chinoise et cham, est réputée pour ses plats à base de poisson séché et de pâte de poisson fermentée.
TXT
        );

        // ==========================
        // 20. (SUD / TOURISME)
        // Phú Quốc
        // ==========================
        $create(
            'Phú Quốc – Perle émeraude du Golfe de Thaïlande',
            'phu-quoc-luxe',
            'sud',
            'tourisme',
            'phu-quoc-luxe.jpg',
            <<<'TXT'
Phú Quốc, la plus grande île du Vietnam, est un véritable paradis tropical aux plages de sable blanc immaculé et aux eaux turquoise. Ses stations balnéaires de luxe, comme JW Marriott et InterContinental, offrent des villas privées avec piscines à débordement et services sur mesure. La plage de Bãi Khem, en forme de croissant, est réputée pour ses couchers de soleil spectaculaires. Les amateurs de plongée exploreront les récifs coralliens préservés des îles An Thới, tandis que le parc national de Phú Quốc, classé réserve de biosphère par l'UNESCO, abrite une forêt tropicale luxuriante et des cascades rafraîchissantes. Ne manquez pas de déguster le fameux nuoc mam (sauce de poisson) local et de visiter les fermes de perles de culture.
TXT
        );

        // 21. (SUD / TOURISME)
        // Mũi Né
        $create(
            'Mũi Né – Oasis balnéaire et désertique',
            'mui-ne-oasis',
            'sud',
            'tourisme',
            'mui-ne.jpg',
            <<<'TXT'
Mũi Né, à seulement 4 heures de route de Hô Chi Minh-Ville, est une station balnéaire réputée pour ses kilomètres de plages de sable fin bordées de cocotiers. Les resorts haut de gamme comme The Anam et Pandanus Resort offrent un cadre idyllique pour des vacances relaxantes. La région est célèbre pour ses paysages uniques, notamment les dunes de sable rouge et blanc de Mũi Né, idéales pour le sandboarding et les balades en jeep. Les amateurs de sports nautiques s'adonneront au kitesurf dans la baie de Mũi Né, réputée pour ses vents constants. Les marchés de pêcheurs tôt le matin et les restaurants de fruits de mer en bord de mer complètent parfaitement cette expérience balnéaire authentique.
TXT
        );

        // 22. (SUD / TOURISME)
        // Côn Đảo
        $create(
            'Côn Đảo – Archipel préservé et luxueux',
            'con-dao-luxe',
            'sud',
            'tourisme',
            'con-dao.jpg',
            <<<'TXT'
L'archipel de Côn Đảo, composé de 16 îles, est une destination d'exception pour les voyageurs en quête d'authenticité et de luxe discret. Le Six Senses Côn Đảo, niché dans une baie préservée, propose des villas sur pilotis avec accès direct à une plage privée. Les eaux cristallines du parc national marin de Côn Đảo abritent des récifs coralliens intacts, idéaux pour la plongée avec tuba et la plongée sous-marine. L'île principale abrite également des sites historiques émouvants, comme la prison de Côn Sơn, témoin de l'histoire coloniale française. Les plages désertes, comme Đất Dốc et Đầm Trầu, offrent une intimité totale pour des moments de détachement absolu.
TXT
        );

        // 25. (SUD / TOURISME)
        // Cần Giờ
        $create(
            'Cần Giờ – Échappée nature à proximité de HCM-Ville',
            'can-gio-nature',
            'sud',
            'tourisme',
            'can-gio.jpg',
            <<<'TXT'
À seulement 50 km de l'agitation de Hô Chi Minh-Ville, la réserve de biosphère de Cần Giờ offre une évasion naturelle préservée. Les écolodges de charme, comme Monkey Island Resort, proposent des hébergements en harmonie avec la mangrove. La réserve abrite une biodiversité exceptionnelle, notamment des milliers de macaques crabiers et des centaines d'espèces d'oiseaux. Les croisières au coucher du soleil sur la rivière Dinh Bà et les balades en barque à travers la forêt de mangroves classée par l'UNESCO sont des expériences inoubliables. La plage de Cần Giờ, moins fréquentée que ses voisines, est idéale pour des moments de détente au calme, loin de la foule touristique.
TXT
        );

        // 26. (SUD / TOURISME)
        // Long Hải
        $create(
            'Long Hải – Station balnéaire familiale',
            'long-hai-familial',
            'sud',
            'tourisme',
            'long-hai.jpg',
            <<<'TXT'
Long Hải, nichée entre mer et montagne, est une destination idéale pour des vacances en famille. Les hôtels-clubs comme The Imperial proposent des formules tout compris avec animations pour enfants et accès à des piscines à vagues. La plage de sable doré, protégée par une baie naturelle, offre des conditions idéales pour la baignade. Le parc d'attractions Dinh Cô, avec ses manèges et ses spectacles aquatiques, ravit les plus jeunes. Les adultes apprécieront les soins traditionnels dans les centres de thalassothérapie en bord de mer. Les marchés nocturnes de fruits de mer et les restaurants de cuisine locale complètent cette destination complète et accessible.
TXT
        );

        // 27. (SUD / TOURISME)
        // Hồ Tràm
        $create(
            'Hồ Tràm – Écrin de luxe en bord de mer',
            'ho-tram-luxe',
            'sud',
            'tourisme',
            'ho-tram.jpg',
            <<<'TXT'
Hồ Tràm est devenue la destination phare du luxe balnéaire au Vietnam avec l'ouverture du complexe The Grand Ho Tram Strip. Ce complexe intégré comprend des hôtels 5 étoiles, un casino international, des parcours de golf signés Greg Norman, et des villas de luxe en front de mer. La plage de sable fin de 8 km, encore préservée du tourisme de masse, offre un cadre idyllique pour la détente. Les amateurs de golf s'épanouiront sur les fairways du The Bluffs, classé parmi les meilleurs parcours d'Asie. Les spas haut de gamme et les restaurants étoilés Michelin complètent cette expérience de luxe absolu à seulement deux heures de route de Hô Chi Minh-Ville.
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
