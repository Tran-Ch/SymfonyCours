<?php

namespace App\Controller;

use App\Form\ProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/mon-profil', name: 'app_profile_edit')]
    public function edit(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(ProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var \App\Entity\Utilisateur $user */
            $user = $this->getUser();

            $avatarsDir = $this->getParameter('kernel.project_dir') . '/public/uploads/avatars';
            if (!is_dir($avatarsDir)) {
                @mkdir($avatarsDir, 0775, true);
            }

            $oldAvatar = $user->getAvatarFilename();

            /** @var UploadedFile|null $avatarFile */
            $avatarFile = $form->get('avatar')->getData();
            $removeAvatar = $form->get('removeAvatar')->getData();

            // 1) Nếu có upload avatar mới
            if ($avatarFile instanceof UploadedFile) {
                $newFilename = uniqid('avatar_', true) . '.' . $avatarFile->guessExtension();

                $avatarFile->move($avatarsDir, $newFilename);

                $user->setAvatarFilename($newFilename);

                // Xoá file cũ nếu có
                if ($oldAvatar) {
                    $oldPath = $avatarsDir . '/' . $oldAvatar;
                    if (is_file($oldPath)) {
                        @unlink($oldPath);
                    }
                }
            } else {
                // 2) Không upload mới nhưng tick xoá avatar
                if ($removeAvatar && $oldAvatar) {
                    $oldPath = $avatarsDir . '/' . $oldAvatar;
                    if (is_file($oldPath)) {
                        @unlink($oldPath);
                    }
                    $user->setAvatarFilename(null);
                }
            }

            $em->flush();
            $this->addFlash('success', 'Votre profil a été mis à jour.');
            return $this->redirectToRoute('app_profile_edit');
        }

        return $this->render('profile/edit.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
}
