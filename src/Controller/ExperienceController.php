<?php

namespace App\Controller;

use App\Repository\ExperienceSpotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExperienceController extends AbstractController
{
    /**
     * Trang bản đồ Việt Nam chung (3 miền)
     */
    #[Route('/experience', name: 'app_experience')]
    public function index(): Response
    {
        return $this->render('experience/index.html.twig');
    }

    /**
     * TRANG LIST CHUNG:
     *   /experience/{region}/{category}
     *   region   : nord | centre | sud
     *   category : incroyable | culture | tourisme
     *
     * KHÔNG tạo thêm route trùng path này để tránh redirect loop.
     */
    #[Route(
        '/experience/{region}/{category}',
        name: 'app_experience_list',
        requirements: [
            'region'   => 'nord|centre|sud',
            'category' => 'incroyable|culture|tourisme',
        ],
        methods: ['GET']
    )]
    public function list(
        string $region,
        string $category,
        ExperienceSpotRepository $spotRepository
    ): Response {
        // Lấy list Spot theo region + category
        $spots = $spotRepository->findBy(
            ['region' => $region, 'category' => $category],
            ['id' => 'ASC']
        );

        // Tiêu đề trang theo từng miền / category
        $titles = [
            'nord' => [
                'incroyable' => 'EXPÉRIENCE INCROYABLE DU NORD',
                'culture'    => 'DÉCOUVREZ LA CULTURE DU NORD',
                'tourisme'   => 'TOURISME DE VACANCES DU NORD',
            ],
            'centre' => [
                'incroyable' => 'EXPÉRIENCE INCROYABLE DU CENTRE',
                'culture'    => 'DÉCOUVREZ LA CULTURE DU CENTRE',
                'tourisme'   => 'TOURISME DE VACANCES DU CENTRE',
            ],
            'sud' => [
                'incroyable' => 'EXPÉRIENCE INCROYABLE DU SUD',
                'culture'    => 'DÉCOUVREZ LA CULTURE DU SUD',
                'tourisme'   => 'TOURISME DE VACANCES DU SUD',
            ],
        ];

        $pageTitle = $titles[$region][$category] ?? 'Expérience';

        return $this->render('experience/list.html.twig', [
            'region'    => $region,
            'category'  => $category,
            'pageTitle' => $pageTitle,
            'spots'     => $spots,
        ]);
    }
}
