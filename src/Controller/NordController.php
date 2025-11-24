<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NordController extends AbstractController
{
    // Trang 1: Expérience du Nord (map vùng Bắc + nút đi tiếp)
    #[Route('/experience/nord', name: 'app_nord')]
    public function index(): Response
    {
        return $this->render('experience/nord/index.html.twig');
    }

    // Trang 2: EXPÉRIENCE INCROYABLE DU NORD
    #[Route('/experience/nord/experience-incroyable', name: 'app_nord_incroyable')]
    public function incroyable(): Response
    {
        return $this->render('experience/nord/incroyable.html.twig');
    }

    // Trang 3: DÉCOUVREZ LA CULTURE DU NORD
    #[Route('/experience/nord/culture', name: 'app_nord_culture')]
    public function culture(): Response
    {
        return $this->render('experience/nord/culture.html.twig');
    }

    // Trang 4: TOURISME DE VACANCES DU NORD
    #[Route('/experience/nord/tourisme', name: 'app_nord_tourisme')]
    public function tourisme(): Response
    {
        return $this->render('experience/nord/tourisme.html.twig');
    }
}
