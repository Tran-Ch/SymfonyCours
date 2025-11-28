<?php

namespace App\Controller;

use App\Entity\ExperienceSpotComment;
use App\Entity\ExperienceSpotLike;
use App\Form\ExperienceSpotCommentType;
use App\Repository\ExperienceSpotRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExperienceSpotController extends AbstractController
{
    /* ---------- TRANG CHI TIẾT 1 SPOT + COMMENT ---------- */
    #[Route('/experience/spot/{slug}', name: 'app_experience_spot_show', methods: ['GET', 'POST'])]
    public function show(
        string $slug,
        ExperienceSpotRepository $spotRepository,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        // Tìm spot theo slug (KHÔNG dùng id)
        $spot = $spotRepository->findOneBy(['slug' => $slug]);

        if (!$spot) {
            throw $this->createNotFoundException('Destination introuvable.');
        }

        $user = $this->getUser();

        // Tạo comment gắn với spot hiện tại
        $comment = new ExperienceSpotComment();
        $comment->setSpot($spot);
        $comment->setDate(new \DateTime());

        if ($user) {
            $comment->setUtilisateur($user);
        }

        $form = $this->createForm(ExperienceSpotCommentType::class, $comment);
        $form->handleRequest($request);

        // xử lý submit comment
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$user) {
                $this->addFlash('error', 'Vous devez être connecté pour commenter.');
                return $this->redirectToRoute('app_login');
            }

            $em->persist($comment);
            $em->flush();

            $this->addFlash('success', 'Merci pour votre commentaire !');

            return $this->redirectToRoute('app_experience_spot_show', [
                'slug' => $spot->getSlug(),
            ]);
        }

        return $this->render('experience_spot/show.html.twig', [
            'spot'        => $spot,
            'commentForm' => $form->createView(),
        ]);
    }

    /* ---------- LIKE / UNLIKE 1 SPOT ---------- */
    #[Route('/experience/spot/{slug}/like', name: 'app_experience_spot_like', methods: ['POST'])]
    public function like(
        string $slug,
        ExperienceSpotRepository $spotRepository,
        EntityManagerInterface $em
    ): Response {
        $user = $this->getUser();

        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour aimer une destination.');
            return $this->redirectToRoute('app_login');
        }

        // Lấy spot theo slug
        $spot = $spotRepository->findOneBy(['slug' => $slug]);

        if (!$spot) {
            throw $this->createNotFoundException('Destination introuvable.');
        }

        $repo = $em->getRepository(ExperienceSpotLike::class);

        // Tìm xem user đã like chưa
        $existing = $repo->findOneBy([
            'spot'        => $spot,
            'utilisateur' => $user,
        ]);

        if ($existing) {
            // Đã like → bỏ like
            $em->remove($existing);
        } else {
            // Chưa like → tạo bản ghi mới
            $like = new ExperienceSpotLike();
            $like->setSpot($spot);
            $like->setUtilisateur($user);
            $em->persist($like);
        }

        $em->flush();

        return $this->redirectToRoute('app_experience_spot_show', [
            'slug' => $spot->getSlug(),
        ]);
    }
}
