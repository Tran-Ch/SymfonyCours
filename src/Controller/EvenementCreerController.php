<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Utilisateur;
use App\Form\EvenementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

final class EvenementCreerController extends AbstractController
{
    #[Route('/evenement/creer', name: 'app_evenement_creer')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): Response {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile|null $imageFile */
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename     = $slugger->slug($originalFilename);
                $newFilename      = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('kernel.project_dir').'/public/Image',
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors de l\'upload de l\'image');
                }

                // Lưu trực tiếp tên file (không thư mục con)
                $evenement->setImage($newFilename);
            }

            $entityManager->persist($evenement);
            $entityManager->flush();

            $this->addFlash('success', 'Événement créé avec succès !');

            return $this->redirectToRoute('app_evenement_liste');
        }

        return $this->render('evenement_creer/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/evenement/liste', name: 'app_evenement_liste')]
    public function liste(EntityManagerInterface $entityManager): Response
    {
        $evenements = $entityManager->getRepository(Evenement::class)->findAll();

        return $this->render('evenement_creer/liste.html.twig', [
            'evenements' => $evenements,
        ]);
    }

    #[Route('/evenement/{id}', name: 'app_evenement_show', requirements: ['id' => '\d+'])]
    public function show(int $id, EntityManagerInterface $entityManager): Response
    {
        $evenement = $entityManager->getRepository(Evenement::class)->find($id);

        if (!$evenement) {
            throw $this->createNotFoundException('L\'événement demandé n\'existe pas.');
        }

        return $this->render('evenement_creer/show.html.twig', [
            'evenement' => $evenement,
        ]);
    }

    #[Route('/evenement/{id}/edit', name: 'app_evenement_edit', requirements: ['id' => '\d+'])]
    public function edit(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): Response {
        $evenement = $entityManager->getRepository(Evenement::class)->find($id);

        if (!$evenement) {
            throw $this->createNotFoundException('L\'événement demandé n\'existe pas.');
        }

        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile|null $imageFile */
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename     = $slugger->slug($originalFilename);
                $newFilename      = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('kernel.project_dir').'/public/Image',
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors de l\'upload de l\'image');
                }

                $evenement->setImage($newFilename);
            }

            $entityManager->flush();

            $this->addFlash('success', 'Événement modifié avec succès !');

            return $this->redirectToRoute('app_evenement_show', [
                'id' => $evenement->getId(),
            ]);
        }

        return $this->render('evenement_creer/edit.html.twig', [
            'form'       => $form->createView(),
            'evenement'  => $evenement,
        ]);
    }

    #[Route(
        '/evenement/{id}/delete',
        name: 'app_evenement_delete',
        requirements: ['id' => '\d+'],
        methods: ['POST']
    )]
    public function delete(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $evenement = $entityManager->getRepository(Evenement::class)->find($id);

        if (!$evenement) {
            throw $this->createNotFoundException('L\'événement demandé n\'existe pas.');
        }

        if ($this->isCsrfTokenValid('delete'.$evenement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($evenement);
            $entityManager->flush();

            $this->addFlash('success', 'Événement supprimé với succès !');
        }

        return $this->redirectToRoute('app_evenement_liste');
    }

    /* ---------- USER CHỌN / BỎ CHỌN MỘT ÉVÉNEMENT ---------- */
    #[Route(
        '/evenement/{id}/toggle',
        name: 'app_evenement_toggle_my',
        requirements: ['id' => '\d+'],
        methods: ['POST']
    )]
    public function toggleMyEvent(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        /** @var Utilisateur|null $user */
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour gérer vos événements.');
            return $this->redirectToRoute('app_login');
        }

        $evenement = $entityManager->getRepository(Evenement::class)->find($id);
        if (!$evenement) {
            throw $this->createNotFoundException('Événement inexistant.');
        }

        // Utilisateur <-> Evenement (ManyToMany)
        if ($user->getEvenements()->contains($evenement)) {
            $user->removeEvenement($evenement);
            $this->addFlash('success', 'Événement retiré de vos événements.');
        } else {
            $user->addEvenement($evenement);
            $this->addFlash('success', 'Événement ajouté à vos événements.');
        }

        $entityManager->flush();

        // quay lại trang trước (liste, détail, ...)
        $referer = $request->headers->get('referer');
        if ($referer) {
            return $this->redirect($referer);
        }

        return $this->redirectToRoute('app_evenement_liste');
    }
}
