<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [

        ]);
    }

    /**
     * Trang tổng (hub) cho người dùng đã đăng nhập:
     * từ đây sẽ đi tới Story cá nhân, Mon profil, Événements, v.v.
     * 
     * Đơn giản chỉ render 1 template:
     * templates/mon_espace/index.html.twig
     */
    #[Route('/mon-espace', name: 'app_mon_espace')]
    public function monEspace(): Response
    {
        return $this->render('mon_espace/index.html.twig', [

        ]);
    }
}
