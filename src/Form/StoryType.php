<?php

namespace App\Form;

use App\Entity\Evenement;
use App\Entity\Story;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class StoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isEdit = $options['is_edit'] ?? false;
        $isUserLoggedIn = $options['user_logged_in'] ?? false;

        $builder
            // Champ utilisateur (affiché uniquement si l'utilisateur n'est pas connecté)
            ->add('utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                // trước đây: 'choice_label' => 'email',
                'choice_label' => 'displayName',
                'label' => 'Auteur',
                'required' => !$isUserLoggedIn,
                // phần còn lại giữ nguyên
                'constraints' => !$isUserLoggedIn ? [
                    new NotBlank([
                        'message' => 'Veuillez sélectionner un auteur',
                        'groups' => ['anonymous']
                    ])
                ] : [],
                'disabled' => $isEdit || $isUserLoggedIn,
                'attr' => array_merge(
                    $isUserLoggedIn ? ['class' => 'd-none'] : [],
                    ['data-testid' => 'story_utilisateur']
                ),
                'placeholder' => !$isUserLoggedIn ? 'Sélectionnez un auteur' : '',
                'group_by' => null
            ])

            // Champ contenu
            ->add('contenu', TextareaType::class, [
                'label' => 'Votre histoire',
                'attr' => [
                    'rows' => 8,
                    'class' => 'form-control',
                    'placeholder' => 'Racontez votre expérience...'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le contenu ne peut pas être vide',
                    ])
                ]
            ])

            // Champ événements
            ->add('evenements', EntityType::class, [
                'class' => Evenement::class,
                'choice_label' => function(Evenement $evenement) {
                    $date = $evenement->getDateDebut() ? $evenement->getDateDebut()->format('d/m/Y') : 'Date inconnue';
                    return sprintf('%s - %s', $evenement->getNom(), $date);
                },
                'multiple' => true,
                'expanded' => false,
                'required' => false,
                'label' => 'Événements associés',
                'placeholder' => 'Sélectionnez un ou plusieurs événements',
                'attr' => [
                    'class' => 'form-select',
                    'data-placeholder' => 'Rechercher un événement...'
                ]
            ])

            // NEW: Story publique / privée
            ->add('isPublic', CheckboxType::class, [
                'label' => 'Rendre cette histoire publique (visible par tous)',
                'required' => false,
                // khi tạo mới: mặc định public = true ; khi edit: giữ giá trị hiện tại
                'data' => $isEdit ? null : true,
                'mapped' => true,
                'label_attr' => ['class' => 'form-check-label'],
                'attr' => ['class' => 'form-check-input'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Story::class,
            'is_edit' => false,
            'user_logged_in' => false,
            'validation_groups' => function (FormInterface $form) {
                $data = $form->getData();
                $groups = ['Default'];

                // Si l'utilisateur n'est pas connecté, on ajoute le groupe de validation
                if (!$data->getUtilisateur()) {
                    $groups[] = 'anonymous';
                }

                return $groups;
            },
        ]);

        $resolver->setAllowedTypes('is_edit', 'bool');
        $resolver->setAllowedTypes('user_logged_in', 'bool');
    }
}
