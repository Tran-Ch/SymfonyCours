<?php

namespace App\Controller;

use App\Entity\Story;
use App\Form\StoryType;
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
        
        // Si l'utilisateur est connecté, on le définit comme auteur par défaut
        if ($user) {
            $story->setUtilisateur($user);
        }

        $form = $this->createForm(StoryType::class, $story, [
            'user_logged_in' => $user !== null,
            'is_edit' => false
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // S'assurer que l'utilisateur est défini avant la sauvegarde
                if (!$story->getUtilisateur() && $user) {
                    $story->setUtilisateur($user);
                }

                // Vérifier que l'utilisateur est bien défini avant de sauvegarder
                if (!$story->getUtilisateur()) {
                    throw new \RuntimeException('Aucun utilisateur n\'est défini pour cette histoire.');
                }

                $entityManager->persist($story);
                $entityManager->flush();

                $this->addFlash('success', 'Votre histoire a été enregistrée avec succès !');
                return $this->redirectToRoute('app_story_new');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'enregistrement de l\'histoire : ' . $e->getMessage());
            }
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');
        }

        return $this->render('story/new.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }

    #[Route('/story/{id}/edit', name: 'app_story_edit')]
    public function edit(Request $request, Story $story, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        
        // Vérifier les autorisations (seul l'auteur ou un admin peut modifier)
        if ($user !== $story->getUtilisateur() && !$this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à modifier cette histoire.');
            return $this->redirectToRoute('app_index');
        }

        $form = $this->createForm(StoryType::class, $story, [
            'user_logged_in' => $user !== null,
            'is_edit' => true
        ]);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $entityManager->flush();
                $this->addFlash('success', 'L\'histoire a été mise à jour avec succès !');
                return $this->redirectToRoute('app_story_edit', ['id' => $story->getId()]);
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de la mise à jour : ' . $e->getMessage());
            }
        } elseif ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');
        }

        return $this->render('story/edit.html.twig', [
            'form' => $form->createView(),
            'story' => $story,
            'user' => $user
        ]);
    }
}

