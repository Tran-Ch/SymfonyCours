<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CentreController extends AbstractController
{
    #[Route('/experience/centre', name: 'app_centre')]
    public function index(): Response
    {
        return $this->render('experience/centre/index.html.twig');
    }
}
