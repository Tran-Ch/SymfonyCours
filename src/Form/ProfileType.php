<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label'    => 'Nom ou pseudo',
                'required' => false,
                'attr'     => [
                    'placeholder' => 'Votre nom tel qu’il sera affiché',
                ],
            ])

            // Avatar (file upload, unmapped)
            ->add('avatar', FileType::class, [
                'label'       => 'Avatar (jpg, png, max 2 Mo)',
                'mapped'      => false,
                'required'    => false,
                'constraints' => [
                    new Image([
                        'maxSize' => '2M',
                        'mimeTypesMessage' => 'Veuillez envoyer une image valide (JPG ou PNG).',
                    ]),
                ],
            ])

            // Checkbox xoá avatar
            ->add('removeAvatar', CheckboxType::class, [
                'label'    => 'Supprimer mon avatar',
                'mapped'   => false,
                'required' => false,
                'help'     => 'Si vous cochez cette case, votre avatar sera supprimé.',
            ])
        ;
        // nếu sau này muốn cho sửa email, có thể add field email ở đây
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
