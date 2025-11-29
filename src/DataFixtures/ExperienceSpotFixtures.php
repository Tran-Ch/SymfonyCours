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
À l’extrême Nord du Vietnam, Hà Giang s’impose comme une terre de contrastes et de sensations, un lieu où la route semble se perdre dans les nuages et où chaque virage dévoile un paysage plus grandiose que le précédent. 
Ici, les montagnes karstiques se dressent comme des cathédrales de pierre, le col de Mã Pì Lèng serpente entre des falaises vertigineuses et la rivière Nho Quế, d’un vert émeraude presque irréel, glisse doucement au fond du canyon. Ce décor spectaculaire, sculpté par le temps, offre une impression de liberté absolue, comme si l’on franchissait une frontière invisible entre le monde réel et le rêve. 
Mais Hà Giang ne se résume pas à ses panoramas : c’est aussi une mosaïque culturelle où les ethnies H’Mông, Dao, Tày ou Lô Lô perpétuent leurs traditions à travers les costumes brodés, les marchés colorés et les fêtes ancestrales. 
Dans les villages de Đồng Văn ou de Sủng Là, les maisons en pierre et les champs accrochés aux pentes abruptes témoignent de la résilience d’un peuple vivant en harmonie avec une nature exigeante. 
Voyager à Hà Giang, c’est parcourir la mythique boucle du Nord, s’arrêter dans un marché animé, partager un thé chaud avec les habitants, admirer les fleurs de sarrasin en novembre ou goûter aux saveurs simples mais authentiques des montagnes. 
C’est une expérience qui dépasse le tourisme, une immersion dans un univers où la beauté brute de la nature se mêle à la richesse des cultures locales. 
Hà Giang n’est pas seulement une destination à visiter, c’est une aventure à vivre, un appel à l’essentiel, un souffle de liberté qui reste longtemps gravé dans la mémoire de ceux qui osent s’y aventurer.

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
Sapa, perchée dans les montagnes du Nord du Vietnam, est une destination qui fascine autant par ses paysages que par sa richesse culturelle. Dès l’aube, la ville s’éveille sous un voile de brume. Les rizières en terrasses, sculptées depuis des siècles par les H’Mông, s’étendent comme des escaliers vers le ciel. Le spectacle est hypnotisant : des courbes dorées ou vertes selon la saison, qui se perdent dans l’infini des vallées.
Mais Sapa ne se résume pas à ses panoramas. C’est aussi un carrefour culturel où se rencontrent les ethnies H’Mông, Dao rouge, Giáy et bien d’autres. Dans les marchés hebdomadaires, les femmes portent des costumes brodés aux couleurs éclatantes, les hommes jouent du khèn ou de la flûte, et les étals regorgent de produits locaux, de plantes médicinales et d’artisanat. Chaque sourire, chaque échange est une invitation à entrer dans un monde où les traditions ne sont pas figées mais vivantes, transmises de génération en génération.
Pour les voyageurs, l’expérience la plus marquante est sans doute la randonnée. Les sentiers serpentent entre les rizières, traversent des villages isolés et mènent vers des vallées secrètes. À chaque pas, le paysage change, révélant une cascade cachée, une maison en bois fumante de chaleur, ou un champ de maïs accroché à la montagne. Les habitants accueillent les visiteurs avec simplicité : un thé chaud, un repas partagé, une histoire racontée au coin du feu. Ces moments d’intimité donnent à Sapa une dimension humaine qui dépasse la beauté de ses panoramas.
Et puis il y a le sommet du Fansipan, surnommé “le toit de l’Indochine”. À plus de 3 100 mètres d’altitude, il offre une vue spectaculaire sur une mer de nuages infinie. Monter là‑haut, c’est ressentir la grandeur de la nature et la petitesse de l’homme, mais aussi une liberté absolue. C’est une expérience qui reste gravée dans la mémoire.
Sapa est une destination qui fascine parce qu’elle combine tout : la majesté des paysages, la richesse des cultures, la chaleur des rencontres. C’est un lieu où l’on vient pour admirer, mais où l’on repart transformé. Chaque voyageur y trouve quelque chose de différent : une émotion, une inspiration, une envie de revenir. Sapa n’est pas seulement une étape touristique, c’est une aventure intérieure, un appel à ralentir, à contempler et à se reconnecter à l’essentiel.

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
Mù Cang Chải, nichée dans la province de Yên Bái, est une terre où la beauté se mesure en courbes. Les rizières en terrasses, sculptées depuis des siècles par les H’Mông, dessinent des paysages ondulants qui changent de couleur au fil des saisons. Au printemps, elles se parent de vert tendre ; en été, elles scintillent sous l’eau des pluies ; à l’automne, elles se transforment en une mer dorée qui embrase la vallée. C’est un spectacle vivant, une œuvre d’art façonnée par la patience et le savoir‑faire des générations.
Le col de Khau Phạ, l’un des plus impressionnants du Vietnam, offre une vue vertigineuse sur ces vallées infinies. Les photographes affluent pour capturer ce décor unique, mais au‑delà des images, c’est l’émotion qui domine. Marcher dans les sentiers de Mù Cang Chải, c’est ressentir la force de la nature et la persévérance des hommes qui l’ont apprivoisée. Les villages perchés conservent une authenticité rare : maisons en bois, fêtes locales, musiques traditionnelles. Les habitants accueillent les visiteurs avec simplicité, partageant un repas de maïs ou un verre d’alcool de riz.
La culture H’Mông est omniprésente : broderies colorées, marchés animés, chants et danses qui rythment la vie communautaire. Chaque rencontre est une immersion dans un monde où la tradition est vivante et fièrement préservée. Mù Cang Chải est une invitation à ralentir, à contempler et à se laisser émerveiller. C’est une expérience qui dépasse le tourisme : une immersion dans un univers où la beauté est partout, dans les paysages comme dans les sourires.


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
Ninh Bình, située au sud du delta du fleuve Rouge, est une destination qui fascine par la richesse de ses paysages et la profondeur de son histoire. Souvent surnommée la “baie d’Halong terrestre”, elle séduit les voyageurs par ses formations calcaires surgissant au milieu des rizières et des rivières, mais aussi par la chaleur de ses habitants et la richesse de sa culture. Ici, la nature et l’homme semblent dialoguer depuis des siècles, créant une harmonie rare et précieuse.
Dès l’arrivée, le visiteur est frappé par la beauté des lieux : des falaises abruptes se dressent au‑dessus des champs verdoyants, des grottes mystérieuses s’ouvrent sur des rivières paisibles, et les barques glissent silencieusement sur l’eau. Tam Cốc et Tràng An sont les joyaux de Ninh Bình. Naviguer sur ces cours d’eau, c’est entrer dans un univers presque irréel, où chaque reflet sur l’eau raconte une histoire. Les rameuses, souvent des femmes du village, manient les avirons avec leurs pieds, une technique traditionnelle qui étonne et émerveille. Leur sourire sincère, leur hospitalité discrète, donnent à cette expérience une dimension humaine inoubliable.
Mais Ninh Bình ne se résume pas à ses paysages. C’est aussi un haut lieu de culture et d’histoire. L’ancienne capitale Hoa Lư, fondée au Xe siècle, fut le berceau des dynasties Đinh et Lê. Les temples dédiés aux rois Đinh Tiên Hoàng et Lê Đại Hành témoignent de la grandeur passée. Leur architecture, sobre et majestueuse, reflète l’esprit du Vietnam médiéval : toits recourbés, colonnes en bois sculpté, pierres millénaires. Chaque détail raconte la puissance d’un royaume qui sut unifier le pays et résister aux invasions.
La culture locale est profondément enracinée dans la vie quotidienne. Les habitants de Ninh Bình perpétuent des traditions agricoles séculaires. Le riz, cultivé dans les vallées fertiles, reste au cœur de l’économie et de la gastronomie. Les marchés regorgent de produits locaux : légumes frais, poissons des rivières, plats typiques comme le “cơm cháy” (riz croustillant), spécialité emblématique de la région. Partager un repas avec une famille locale, c’est découvrir une cuisine simple mais savoureuse, reflet d’une vie en harmonie avec la terre et l’eau.
L’artisanat est également présent : broderies, objets en bambou, sculptures sur pierre. Ces savoir‑faire, transmis de génération en génération, témoignent de la créativité et de la résilience des habitants. Les fêtes traditionnelles, souvent liées aux cycles agricoles ou aux cultes des ancêtres, rythment la vie communautaire. Elles sont l’occasion de danses, de chants et de rituels qui renforcent le lien entre les générations.
Ninh Bình est aussi un lieu de spiritualité. Les pagodes et temples disséminés dans la région offrent des espaces de recueillement. La pagode Bái Đính, l’une des plus grandes d’Asie du Sud‑Est, impressionne par ses dimensions monumentales et son atmosphère paisible. Ses statues de Bouddha, ses couloirs bordés de centaines de sculptures, invitent à la méditation et à la contemplation. L’architecture religieuse, mêlant tradition et modernité, reflète la vitalité spirituelle du Vietnam contemporain.
Ce qui rend Ninh Bình unique, c’est la combinaison de tous ces éléments : une nature spectaculaire, une histoire prestigieuse, une culture vivante et une spiritualité profonde. Les voyageurs ne viennent pas seulement pour admirer les paysages, mais pour ressentir une atmosphère, une énergie particulière. Chaque rencontre avec les habitants, chaque visite de temple, chaque promenade en barque devient une expérience qui dépasse le simple tourisme.
Ninh Bình est une destination qui invite à la découverte et à la réflexion. Elle rappelle que le voyage n’est pas seulement une succession de lieux à visiter, mais une immersion dans un univers où la beauté et l’humanité se rencontrent. Ici, le temps semble ralentir, laissant place à la contemplation et à l’émerveillement.

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
Hạ Long, située dans la province de Quảng Ninh, est mondialement connue pour sa baie classée au patrimoine mondial de l’UNESCO. Des milliers d’îlots calcaires surgissent des flots turquoise, créant un décor irréel qui semble tout droit sorti d’une peinture traditionnelle. Mais réduire Hạ Long à ses paysages serait oublier l’essentiel : la vie qui s’y déploie, les habitants qui façonnent son identité, la culture qui s’exprime dans chaque geste et l’architecture qui témoigne de son histoire.
La baie est avant tout un espace habité. Depuis des générations, des familles vivent dans des villages flottants, construits directement sur l’eau. Leurs maisons en bois colorées, reliées par des passerelles, forment de petites communautés où la mer est à la fois nourricière et protectrice. Les habitants pratiquent la pêche, l’élevage de poissons et de coquillages, et accueillent les voyageurs avec simplicité. Découvrir ces villages, c’est entrer dans un monde où le quotidien est rythmé par les marées et où chaque sourire reflète une relation intime avec la mer.
La culture de Hạ Long est profondément liée à cet environnement maritime. Les fêtes locales célèbrent la mer et ses bienfaits. La fête de la pêche, par exemple, est l’occasion de rituels, de chants et de danses qui expriment la gratitude envers les divinités marines. Les habitants perpétuent des traditions culinaires uniques : poissons grillés, fruits de mer frais, plats préparés avec des algues ou des coquillages. La gastronomie est simple mais savoureuse, reflet d’une vie en harmonie avec la nature.
L’architecture de Hạ Long est marquée par cette dualité entre terre et mer. Dans la ville moderne, les hôtels et bâtiments contemporains témoignent du dynamisme économique et touristique. Mais dans les villages traditionnels, les maisons flottantes ou les petites pagodes construites au bord de l’eau racontent une autre histoire : celle d’une adaptation ingénieuse à un environnement exigeant. Les pagodes, souvent nichées dans des grottes ou sur des îlots, ajoutent une dimension spirituelle au paysage. Elles sont des lieux de recueillement où les habitants viennent prier pour la prospérité et la protection.
Au‑delà de la baie, la ville de Hạ Long elle‑même est en pleine transformation. Les marchés animés regorgent de produits locaux : poissons séchés, fruits tropicaux, artisanat en coquillage ou en pierre. Les habitants y échangent non seulement des biens mais aussi des histoires, des traditions, des sourires. La ville est un carrefour où se rencontrent modernité et authenticité. Les jeunes générations, ouvertes au monde, perpétuent les traditions tout en les adaptant à la vie contemporaine.
Ce qui rend Hạ Long fascinante, c’est cette combinaison de beauté naturelle et de richesse humaine. Les paysages hypnotisent, mais ce sont les rencontres qui marquent. Partager un repas dans un village flottant, écouter un pêcheur raconter la légende des dragons qui auraient façonné la baie, visiter une pagode nichée dans une grotte, flâner dans un marché animé : autant d’expériences qui donnent à Hạ Long une profondeur que les images seules ne peuvent transmettre.
Hạ Long est une destination qui invite à la contemplation et à la découverte. Elle rappelle que la beauté d’un lieu ne réside pas seulement dans ses panoramas, mais aussi dans la vie qui s’y déploie, dans la culture qui s’y exprime et dans l’architecture qui en témoigne. Voyager à Hạ Long, c’est entrer dans un univers où la mer et l’homme cohabitent depuis des siècles, où la nature et la culture se mêlent pour offrir une expérience unique.

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
Mai Châu, nichée au cœur des montagnes du Nord du Vietnam, est une vallée qui séduit par sa douceur et son authenticité. Contrairement aux destinations plus connues et fréquentées, elle offre une atmosphère paisible où le temps semble ralentir. Ici, la beauté ne réside pas seulement dans les paysages verdoyants, mais aussi dans la vie quotidienne des habitants, dans leurs traditions et dans l’architecture qui reflète une harmonie rare entre l’homme et la nature.
Les habitants de Mai Châu sont principalement issus de l’ethnie des Thaï blancs. Leur culture est profondément enracinée dans la vallée et se manifeste à travers les costumes traditionnels, les danses et les chants qui rythment les fêtes communautaires. Les femmes portent souvent des jupes longues et des chemises brodées, tandis que les hommes participent aux rituels et aux célébrations avec des instruments de musique traditionnels. Les soirées dans les villages sont animées par des spectacles de danse autour du feu, où les voyageurs sont invités à partager un verre d’alcool de riz et à entrer dans la ronde. Ces moments de convivialité créent un lien fort entre visiteurs et habitants, révélant une hospitalité sincère et chaleureuse.
L’architecture de Mai Châu est un autre élément fascinant. Les maisons sur pilotis, construites en bois et en bambou, dominent le paysage. Elles sont conçues pour s’adapter au climat et aux conditions de la vallée : surélevées pour éviter l’humidité, aérées pour laisser circuler le vent, et ouvertes sur les champs environnants. Ces habitations reflètent une philosophie de vie simple mais ingénieuse, où chaque détail est pensé pour respecter la nature et favoriser la communauté. Les villages, alignés le long des rizières, offrent une image harmonieuse et apaisante.
La vie quotidienne est intimement liée à l’agriculture. Les habitants cultivent le riz, le maïs et élèvent des animaux domestiques. Les marchés locaux regorgent de produits frais et d’artisanat : tissages colorés, broderies fines, objets en bambou. Ces savoir‑faire traditionnels sont transmis de génération en génération et témoignent de la créativité et de la résilience des communautés.
Pour les voyageurs, Mai Châu est une invitation à ralentir et à se reconnecter à l’essentiel. Se promener à vélo dans la vallée, respirer l’air pur, écouter le chant des oiseaux et admirer les rizières en terrasses est une expérience qui apaise l’esprit. Ici, la simplicité devient luxe, et la sérénité se transforme en véritable richesse.
Mai Châu n’est pas seulement une destination touristique : c’est une immersion dans un univers où la culture, l’architecture et la nature se mêlent pour offrir une expérience profondément humaine.

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
Au cœur des montagnes du Nord du Vietnam, le lac Ba Bể s’étend comme un miroir d’eau paisible entouré de forêts primaires. Classé parc national, ce site est l’un des plus grands lacs naturels du pays et fascine autant par sa beauté que par la richesse culturelle des communautés qui y vivent. Ici, la nature et l’homme semblent dialoguer depuis des siècles, créant une atmosphère mystique et profondément humaine.
Les habitants de Ba Bể appartiennent principalement à l’ethnie Tày. Leur mode de vie est intimement lié au lac et à la forêt. Les maisons traditionnelles sur pilotis, construites en bois et en bambou, dominent les villages. Elles sont conçues pour résister à l’humidité et s’adapter au climat montagnard. L’architecture reflète une philosophie de vie simple mais ingénieuse : ouverte sur l’extérieur, elle favorise la convivialité et l’harmonie avec la nature. Les villages, alignés le long des rives, offrent une image authentique et apaisante.
La culture Tày est vivante et fièrement préservée. Les habitants perpétuent des traditions ancestrales à travers la musique, les chants et les danses. Le “then”, chant rituel accompagné d’un luth à deux cordes, est une pratique spirituelle qui relie les hommes aux divinités et aux ancêtres. Les fêtes locales, souvent liées aux cycles agricoles ou aux légendes du lac, rassemblent les communautés dans une atmosphère joyeuse et colorée. Les costumes traditionnels, sobres mais élégants, témoignent d’une identité culturelle forte.
La gastronomie locale reflète cette proximité avec la nature. Les habitants préparent des plats simples mais savoureux à base de poissons du lac, de légumes cultivés dans les vallées et de riz gluant. Partager un repas dans une maison sur pilotis est une expérience qui dépasse la simple dégustation : c’est un moment de convivialité où l’on découvre la générosité et l’hospitalité des familles.
Le lac Ba Bể est aussi entouré de légendes. On raconte qu’il serait né d’un cataclysme ancien, et que ses eaux abritent des esprits protecteurs. Ces récits, transmis de génération en génération, ajoutent une dimension mystique au paysage. Explorer Ba Bể, c’est naviguer sur ses eaux calmes, découvrir des grottes cachées, admirer des cascades secrètes et écouter les histoires des anciens.
Pour les voyageurs, Ba Bể est une immersion dans un univers intemporel. C’est un lieu où la beauté naturelle se mêle à la richesse culturelle, où chaque rencontre devient une expérience unique. Ici, la simplicité devient luxe, et la sérénité se transforme en véritable richesse. Ba Bể n’est pas seulement un site naturel : c’est une terre de légendes et de traditions, une invitation à ralentir et à contempler.

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
Cao Bằng, située à l’extrême nord du Vietnam, est une région montagneuse qui séduit par la puissance de sa nature et la richesse de sa culture. Loin des circuits touristiques classiques, elle offre une immersion authentique dans un univers où les paysages grandioses se mêlent à des traditions vivantes. La cascade de Bản Giốc, l’une des plus belles d’Asie, est le symbole de cette terre. Ses eaux blanches se déversent avec force au milieu des montagnes verdoyantes, créant un spectacle majestueux qui attire autant les voyageurs que les habitants, fiers de ce patrimoine naturel.
Les populations locales appartiennent principalement aux ethnies Tày et Nùng. Leur mode de vie est profondément enraciné dans la vallée. Les villages conservent une architecture traditionnelle avec des maisons en torchis ou en bois, souvent couvertes de toits de chaume. Ces habitations, simples mais ingénieuses, sont conçues pour résister aux conditions climatiques et s’intégrer harmonieusement dans le paysage. Les maisons sur pilotis, typiques des Tày, favorisent la convivialité et reflètent une philosophie de vie tournée vers la communauté.
La culture de Cao Bằng est riche et colorée. Les fêtes locales rythment l’année et sont l’occasion de danses, de chants et de rituels qui renforcent le lien entre les générations. Les costumes traditionnels, brodés de motifs géométriques ou floraux, témoignent d’un savoir‑faire transmis de génération en génération. La musique occupe une place importante : les instruments traditionnels accompagnent les cérémonies et les célébrations, créant une atmosphère vibrante et joyeuse.
L’artisanat est également un élément essentiel de la culture locale. Les habitants fabriquent des objets en bambou, des broderies et des bijoux en argent. Ces créations, à la fois utilitaires et artistiques, reflètent la créativité et la résilience des communautés. Les marchés de Cao Bằng sont des lieux de rencontre où l’on échange non seulement des produits mais aussi des histoires et des sourires.
La gastronomie locale est simple mais savoureuse. Les plats à base de maïs, de riz gluant et de légumes de montagne sont au cœur de l’alimentation. L’alcool de riz, préparé selon des méthodes traditionnelles, accompagne les repas et les fêtes. Partager un repas avec une famille locale, c’est découvrir une hospitalité sincère et chaleureuse.
Cao Bằng est une destination qui invite à la contemplation et à la découverte. Elle rappelle que le voyage n’est pas seulement une succession de paysages, mais une immersion dans un univers où la nature et la culture se mêlent pour offrir une expérience profondément humaine. Ici, chaque vallée, chaque maison, chaque sourire raconte une histoire.

TXT
            );

        $manager->persist($caoBang);

        // Lưu tất cả vào DB
        $manager->flush();
    }
}
