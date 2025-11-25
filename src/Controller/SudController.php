<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SudController extends AbstractController
{
    // Trang 1: Expérience du Sud (map vùng Nam + nút đi tiếp)
    #[Route('/sud', name: 'app_sud')]
    public function index(): Response
    {
        return $this->render('experience/sud/index.html.twig');
    }

    // Trang 2: EXPÉRIENCE INCROYABLE DU SUD
    #[Route('/experience/sud/incroyable', name: 'app_sud_incroyable')]
    public function incroyable(): Response
    {
        return $this->render('experience/sud/incroyable.html.twig');
    }

    // Trang 3: DÉCOUVREZ LA CULTURE DU SUD
    #[Route('/experience/sud/culture', name: 'app_sud_culture')]
    public function culture(): Response
    {
        return $this->render('experience/sud/culture.html.twig');
    }

    // Trang 4: TOURISME DE VACANCES DU SUD
    #[Route('/experience/sud/tourisme', name: 'app_sud_tourisme')]
    public function tourisme(): Response
    {
        return $this->render('experience/sud/tourisme.html.twig');
    }
}
