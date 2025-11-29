<?php

namespace App\Controller;

use App\Entity\Story;
use App\Entity\Comment;
use App\Entity\StoryLike;
use App\Form\StoryType;
use App\Form\CommentType;
use App\Repository\StoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StoryController extends AbstractController
{
    #[Route('/story/new', name: 'app_story_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $story = new Story();
        $user = $this->getUser();

        // nếu user đã đăng nhập thì set mặc định là tác giả
        if ($user) {
            $story->setUtilisateur($user);
        }

        $form = $this->createForm(StoryType::class, $story, [
            'user_logged_in' => $user !== null,
            'is_edit'        => false,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                if (!$story->getUtilisateur() && $user) {
                    $story->setUtilisateur($user);
                }

                if (!$story->getUtilisateur()) {
                    throw new \RuntimeException('Aucun utilisateur n\'est défini pour cette histoire.');
                }

                $entityManager->persist($story);
                $entityManager->flush();

                $this->addFlash('success', 'Votre histoire a été enregistrée avec succès !');

                // sau khi đăng, chuyển về trang "mes histoires"
                return $this->redirectToRoute('app_my_stories');
            } catch (\Exception $e) {
                $this->addFlash('error',
                    'Une erreur est survenue lors de l\'enregistrement de l\'histoire : ' . $e->getMessage()
                );
            }
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');
        }

        return $this->render('story/new.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

    #[Route('/story/{id}/edit', name: 'app_story_edit', requirements: ['id' => '\d+'])]
    public function edit(Request $request, Story $story, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        // chỉ tác giả hoặc admin mới được sửa
        if ($user !== $story->getUtilisateur() && !$this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à modifier cette histoire.');
            return $this->redirectToRoute('app_home');
        }

        $form = $this->createForm(StoryType::class, $story, [
            'user_logged_in' => $user !== null,
            'is_edit'        => true,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $entityManager->flush();
                $this->addFlash('success', 'L\'histoire a été mise à jour avec succès !');

                return $this->redirectToRoute('app_story_show', ['id' => $story->getId()]);
            } catch (\Exception $e) {
                $this->addFlash('error',
                    'Une erreur est survenue lors de la mise à jour : ' . $e->getMessage()
                );
            }
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');
        }

        return $this->render('story/edit.html.twig', [
            'form'  => $form->createView(),
            'story' => $story,
            'user'  => $user,
        ]);
    }

    /* ---------- TRANG CHI TIẾT STORY + COMMENT ---------- */
    #[Route('/story/{id}', name: 'app_story_show', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function show(Story $story, Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        // Tạo form comment cho story này
        $comment = new Comment();
        $comment->setStory($story);
        $comment->setDate(new \DateTime());

        if ($user) {
            $comment->setUtilisateur($user);
        }

        $commentForm = $this->createForm(CommentType::class, $comment);
        $commentForm->handleRequest($request);

        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            if (!$user) {
                $this->addFlash('error', 'Vous devez être connecté pour commenter.');
                return $this->redirectToRoute('app_login');
            }

            $em->persist($comment);
            $em->flush();

            $this->addFlash('success', 'Merci pour votre commentaire !');

            return $this->redirectToRoute('app_story_show', ['id' => $story->getId()]);
        }

        return $this->render('story/show.html.twig', [
            'story'       => $story,
            'comments'    => $story->getComments(),
            'commentForm' => $commentForm->createView(),
        ]);
    }

    /* ---------- BẤM LIKE / UNLIKE ---------- */
    #[Route('/story/{id}/like', name: 'app_story_like', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function like(Story $story, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour aimer une histoire.');
            return $this->redirectToRoute('app_login');
        }

        $existing = $em->getRepository(StoryLike::class)->findOneBy([
            'story'       => $story,
            'utilisateur' => $user,
        ]);

        if ($existing) {
            // đã like → bỏ like
            $em->remove($existing);
        } else {
            // chưa like → tạo mới
            $like = new StoryLike();
            $like->setStory($story);
            $like->setUtilisateur($user);
            $em->persist($like);
        }

        $em->flush();

        return $this->redirectToRoute('app_story_show', ['id' => $story->getId()]);
    }

    /* ---------- TRANG "MES HISTOIRES" CỦA USER ---------- */
    #[Route('/mes-histoires', name: 'app_my_stories')]
    public function myStories(StoryRepository $storyRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $stories = $storyRepository->findBy(
            ['utilisateur' => $user],
            ['id' => 'DESC']
        );

        return $this->render('story/my_stories.html.twig', [
            'user'    => $user,
            'stories' => $stories,
        ]);
    }

    #[Route('/stories', name: 'app_story_public_list')]
    public function publicList(StoryRepository $storyRepository): Response
    {
        // lấy tất cả story public, mới nhất trước
        $stories = $storyRepository->findBy(
            ['isPublic' => true],
            ['id' => 'DESC']
        );

        return $this->render('story/public_list.html.twig', [
            'stories' => $stories,
        ]);
    }
}
