<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CentreController extends AbstractController
{   
    // Trang 1: Expérience du Centre (map vùng Trung + nút đi tiếp)
    #[Route('/experience/centre', name: 'app_centre')]
    public function index(): Response
    {
        return $this->render('experience/centre/index.html.twig');
    }

    // Trang 2: EXPÉRIENCE INCROYABLE DU CENTRE
    #[Route('/experience/centre/incroyable', name: 'app_centre_incroyable')]
    public function incroyable(): Response
    {
        return $this->render('experience/centre/incroyable.html.twig');
    }

    // Trang 3: DÉCOUVREZ LA CULTURE DU CENTRE
    #[Route('/experience/centre/culture', name: 'app_centre_culture')]
    public function culture(): Response
    {
        return $this->render('experience/centre/culture.html.twig');
    }

    // Trang 4: TOURISME DE VACANCES DU CENTRE
    #[Route('/experience/centre/tourisme', name: 'app_centre_tourisme')]
    public function tourisme(): Response
    {
        return $this->render('experience/centre/tourisme.html.twig');
    }
}
