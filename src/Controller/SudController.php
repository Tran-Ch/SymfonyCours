<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SudController extends AbstractController
{
    #[Route('/experience/sud', name: 'app_sud')]
    public function index(): Response
    {
        return $this->render('experience/sud/index.html.twig');
    }
}
