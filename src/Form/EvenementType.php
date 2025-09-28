<?php
 
namespace App\Form;
 
use App\Entity\Evenement;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\Extension\Core\Type\NumberType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\File;
 
class EvenementType extends AbstractType

{

    public function buildForm(FormBuilderInterface $builder, array $options): void

    {

        $builder

            ->add('nom', TextType::class, [

                'label' => 'Nom de l\'événement',

                'attr' => [

                    'class' => 'form-control',

                    'placeholder' => 'Saisissez le nom de l\'événement'

                ]

            ])

            ->add('dateDebut', DateTimeType::class, [

                'label' => 'Date et heure de début',

                'widget' => 'single_text',

                'attr' => [

                    'class' => 'form-control'

                ]

            ])

            ->add('dateFin', DateTimeType::class, [

                'label' => 'Date et heure de fin',

                'widget' => 'single_text',

                'attr' => [

                    'class' => 'form-control'

                ]

            ])

            ->add('lieu', TextType::class, [

                'label' => 'Lieu',

                'attr' => [

                    'class' => 'form-control',

                    'placeholder' => 'Adresse ou nom du lieu'

                ]

            ])

            ->add('categorie', ChoiceType::class, [

                'label' => 'Catégorie',

                'choices' => [

                    'Conférence' => 'conference',

                    'Formation' => 'formation',

                    'Réunion' => 'reunion',

                    'Événement social' => 'social',

                    'Séminaire' => 'seminaire',

                    'Atelier' => 'atelier',

                    'Autre' => 'autre'

                ],

                'attr' => [

                    'class' => 'form-control'

                ]

            ])

            ->add('prix', NumberType::class, [

                'label' => 'Prix (optionnel)',

                'required' => false,

                'attr' => [

                    'class' => 'form-control',

                    'placeholder' => '0.00',

                    'step' => '0.01'

                ]

            ])
 
            ->add('image', FileType::class, [

                'label' => 'Image (optionnelle)',

                'mapped' => false,

                'required' => false,

                'constraints' => [

                    new File([

                        'maxSize' => '5M',

                        'mimeTypes' => [

                            'image/jpeg',

                            'image/png',

                            'image/gif',

                            'image/webp'

                        ],

                        'mimeTypesMessage' => 'Veuillez uploader une image valide (JPEG, PNG, GIF, WebP)',

                        'maxSizeMessage' => 'Le fichier est trop volumineux ({{ size }} {{ suffix }}). La taille maximale autorisée est {{ limit }} {{ suffix }}.'

                    ])

                ],

                'attr' => [

                    'class' => 'form-control',

                    'accept' => 'image/*'

                ]

            ])

            ->add('submit', SubmitType::class, [

                'label' => 'Créer l\'événement',

                'attr' => [

                    'class' => 'btn btn-primary'

                ]

            ]);

    }
 
    public function configureOptions(OptionsResolver $resolver): void

    {

        $resolver->setDefaults([

            'data_class' => Evenement::class,

        ]);

    }

}
 