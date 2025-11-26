<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Attribute\Route;

final class AproposController extends AbstractController

{

    #[Route('/apropos', name: 'app_apropos')]

    public function index(): Response

    {

        // LIGNE DE DÉBOGAGE ABSOLUE : Si cette page s'affiche, le problème est dans le rendu TWIG.

        // Si elle NE S'AFFICHE PAS, le problème est dans Apache/Nginx (DocumentRoot/mod_rewrite/permissions).

        dd('Contrôleur atteint et code prêt à être exécuté.');

        /* * VÉRIFICATION D'AFFICHAGE FORCÉ :

        * Renvoie une simple chaîne HTML au lieu d'utiliser Twig.

        * Décommentez la ligne ci-dessous pour tester.

        */

        return new Response('<h1>DEBUG SERVER OK - LE ROUTAGE FONCTIONNE !</h1><p>Le problème est ailleurs que dans le contrôleur.</p>');
 
        

        return $this->render('apropos/index.html.twig');

    }

}
 