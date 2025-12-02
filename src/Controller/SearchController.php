<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SearchController extends AbstractController
{
    #[Route('/recherche', name: 'app_search', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $q = trim((string) $request->query->get('q', ''));

        if ($q === '') {
            return $this->render('search/index.html.twig', [
                'query'    => $q,
                'region'   => null,
                'category' => null,
                'matched'  => false,
            ]);
        }

        $normalized = $this->normalize($q);

        // ----- TÌM REGION -----
        $region = null;
        if (str_contains($normalized, 'nord')) {
            $region = 'nord';
        } elseif (str_contains($normalized, 'centre') || str_contains($normalized, 'central') || str_contains($normalized, 'centrale')) {
            $region = 'centre';
        } elseif (str_contains($normalized, 'sud')) {
            $region = 'sud';
        }

        // ----- TÌM CATEGORY -----
        $category = null;
        if (str_contains($normalized, 'incroyable')) {
            $category = 'incroyable';
        } elseif (str_contains($normalized, 'culture')) {
            $category = 'culture';
        } elseif (str_contains($normalized, 'tourisme') || str_contains($normalized, 'vacance')) {
            $category = 'tourisme';
        }

        // Nếu tìm được cả region + category -> chuyển thẳng tới route experience
        if ($region && $category) {
            return $this->redirectToRoute('app_experience_list', [
                'region'   => $region,
                'category' => $category,
            ]);
        }

        // Nếu không nhận diện đủ -> hiển thị trang kết quả đơn giản
        return $this->render('search/index.html.twig', [
            'query'    => $q,
            'region'   => $region,
            'category' => $category,
            'matched'  => false,
        ]);
    }

    /**
     * Chuẩn hoá chuỗi: chuyển về thường + bỏ dấu tiếng Pháp/VN đơn giản
     */
    private function normalize(string $text): string
    {
        $text = mb_strtolower($text, 'UTF-8');

        $replacements = [
            'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',
            'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a',
            'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',

            'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e',
            'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',

            'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',

            'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
            'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o',
            'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',

            'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',
            'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u',

            'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',

            'đ' => 'd',

            'ç' => 'c',
            'ë' => 'e', 'ï' => 'i', 'î' => 'i',
            'ô' => 'o', 'ö' => 'o',
            'û' => 'u', 'ü' => 'u',
        ];

        return strtr($text, $replacements);
    }
}
