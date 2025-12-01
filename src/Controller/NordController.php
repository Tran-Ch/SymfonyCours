<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NordController extends AbstractController
{
    /**
     * Trang bản đồ / giới thiệu miền Bắc.
     * Các nút "INCROYABLE / CULTURE / TOURISME" sẽ link tới route
     * app_experience_list (đã làm trong Twig).
     */
    #[Route('/experience/nord', name: 'app_nord')]
    public function index(): Response
    {
        return $this->render('experience/nord/index.html.twig');
    }
}
