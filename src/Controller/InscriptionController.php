<?php
 
namespace App\Controller;
 
use App\Entity\Utilisateur;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
 
class InscriptionController extends AbstractController

{

    #[Route('/inscription', name: 'app_inscription')]

    public function index(Request $request, EntityManagerInterface $entityManager): Response

    {

        // Créer une nouvelle instance de l'entité Utilisateur

        $utilisateur = new Utilisateur();
 
        // Créer le formulaire lié à l'entité

        $form = $this->createFormBuilder($utilisateur)

            ->add('nom', TextType::class, [

                'label' => 'Nom complet',

                'attr' => ['placeholder' => 'Votre nom']

            ])

            ->add('email', EmailType::class, [

                'label' => 'Email',

                'attr' => ['placeholder' => 'votre@email.com']

            ])

            ->add('password', PasswordType::class, [

                'label' => 'Mot de passe',

                'attr' => ['placeholder' => 'Votre mot de passe']

            ])

            ->add('envoyer', SubmitType::class, [

                'label' => 'S\'inscrire'

            ])

            ->getForm();
 
        // Traiter le formulaire

        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {

            // Sauvegarder en base de données

            $entityManager->persist($utilisateur);

            $entityManager->flush();

            // Message de succès

            $this->addFlash('success', 'Inscription réussie pour ' . $utilisateur->getEmail() . ' ! Utilisateur sauvegardé en base.');

            // Redirection pour éviter la resoumission

            return $this->redirectToRoute('app_inscription');

        }
 
        return $this->render('inscription/index.html.twig', [

            'form' => $form->createView(),

        ]);

    }

}
 