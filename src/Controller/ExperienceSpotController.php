<?php

namespace App\Controller;

use App\Entity\ExperienceSpot;
use App\Entity\ExperienceSpotComment;
use App\Entity\ExperienceSpotLike;
use App\Form\ExperienceSpotCommentType;
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
        ExperienceSpot $spot,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $user = $this->getUser();

        // Form comment
        $comment = new ExperienceSpotComment();
        $comment->setSpot($spot);
        $comment->setDate(new \DateTime());

        if ($user) {
            $comment->setUtilisateur($user);
        }

        $form = $this->createForm(ExperienceSpotCommentType::class, $comment);
        $form->handleRequest($request);

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
        ExperienceSpot $spot,
        EntityManagerInterface $em
    ): Response {
        $user = $this->getUser();

        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour aimer une destination.');
            return $this->redirectToRoute('app_login');
        }

        $repo = $em->getRepository(ExperienceSpotLike::class);

        $existing = $repo->findOneBy([
            'spot'        => $spot,
            'utilisateur' => $user,
        ]);

        if ($existing) {
            $em->remove($existing);        // un-like
        } else {
            $like = new ExperienceSpotLike();
            $like->setSpot($spot);
            $like->setUtilisateur($user);
            $em->persist($like);          // like mới
        }

        $em->flush();

        return $this->redirectToRoute('app_experience_spot_show', [
            'slug' => $spot->getSlug(),
        ]);
    }
}
