<?php

namespace FormBuilder;

use \SamplePHPFramework\Form\FormBuilder;
use \SamplePHPFramework\Form\DropDownListField;
use \SamplePHPFramework\Form\EmailField;
use \SamplePHPFramework\Form\StringField;
use \SamplePHPFramework\Form\FileField;
use \SamplePHPFramework\Form\PasswordField;
use \SamplePHPFramework\Validator\IsEmailValidator;
use \SamplePHPFramework\Validator\IsInTheListValidator;
use \SamplePHPFramework\Validator\MaxLengthValidator;
use \SamplePHPFramework\Validator\MinLengthValidator;
use \SamplePHPFramework\Validator\NotNullValidator;

class SingUpFormBuilder extends FormBuilder
{
    public function build() : Void
    {
        $this->form->add(
            new StringField(
                [
                    'label' => 'NOM D\'UTILISATEUR',
                    'name' => 'username',
                    'minLength' => 3,
                    'maxLength' => 50,
                    'placeholder' => 'john76',
                    'validators' => [
                        new MinLengthValidator('Le nom d\'utilisateur spécifié est trop court (3 caractères minimum)', 3),
                        new MaxLengthValidator('Le nom d\'utilisateur spécifié est trop long (50 caractères maximum)', 50),
                        new NotNullValidator('Merci de spécifier le nom d\'utilisateur'),
                    ],
                ]
            )
        )
            ->add(
                new StringField(
                    [
                        'label' => 'NOM',
                        'name' => 'lastname',
                        'minLength' => 2,
                        'maxLength' => 50,
                        'placeholder' => 'Doe',
                        'validators' => [
                            new MinLengthValidator('Le nom spécifié est trop court (2 caractères minimum)', 2),
                            new MaxLengthValidator('Le nom spécifié est trop long (50 caractères maximum)', 50),
                            new NotNullValidator('Merci de spécifier un nom'),
                        ],
                    ]
                )
            )
            ->add(
                new StringField(
                    [
                        'label' => 'PRÉNOM',
                        'name' => 'firstname',
                        'minLength' => 2,
                        'maxLength' => 30,
                        'placeholder' => 'John',
                        'validators' => [
                            new MinLengthValidator('Le prénom spécifié est trop court (2 caractères minimum)', 2),
                            new MaxLengthValidator('Le prénom spécifié est trop long (30 caractères maximum)', 30),
                            new NotNullValidator('Merci de spécifier un prénom'),
                        ],
                    ]
                )
            )
            ->add(
                new DropDownListField(
                    [
                        'label' => 'CIVILITÉ',
                        'name' => 'gender',
                        'optionList' => [
                            'M',
                            'F',
                            'Autre',
                        ],
                        'validators' => [
                            new NotNullValidator('Merci de spécifier une civilité.'),
                            new IsInTheListValidator(
                                'La civilité spécifiée n\'apparaît null part dans la liste des options.',
                                [
                                    'M',
                                    'F',
                                    'Autre',
                                ]
                            ),
                        ],
                    ]
                )
            )
            ->add(
                new EmailField(
                    [
                        'label' => 'MAIL',
                        'name' => 'email',
                        'maxLength' => 100,
                        'minLength' => 6,
                        'placeholder' => 'johndoe@stanleylouisjean.com',
                        'validators' => [
                            new IsEmailValidator('Le mail spécifié ne semble pas être valide.'),
                            new MaxLengthValidator('Le mail spécifié est trop long (100 caractères maximum).', 100),
                            new MinLengthValidator('Le mail spécifié est trop court (6 caractères minimum).', 6),
                            new NotNullValidator('Merci de spécifier l\'adresse email.'),
                        ],
                    ]
                )
            )
            ->add(
                new PasswordField(
                    [
                        'label' => 'MOT DE PASSE',
                        'name' => 'password',
                        'minLength' => 8,
                        'maxLength' => 30,
                        'placeholder' => 'Votre mot de passe (8 caractères minimum)',
                        'validators' => [
                            new MinLengthValidator('Le mot de passe spécifié est trop court (8 caractères minimum)', 8),
                            new MaxLengthValidator('Le mot de passe spécifié est trop long (30 caractères maximum)', 30),
                            new NotNullValidator('Merci de spécifier un mot de passe'),
                        ],
                    ]
                )
            )
            ->add(
                new PasswordField(
                    [
                        'label' => 'RETAPEZ LE MOT DE PASSE',
                        'name' => 'passwordRepeat',
                        'minLength' => 8,
                        'maxLength' => 30,
                        'placeholder' => 'Votre mot de passe (8 caractères minimum)',
                        'validators' => [
                            new MinLengthValidator('Le mot de passe spécifié est trop court (8 caractères minimum)', 8),
                            new MaxLengthValidator('Le mot de passe spécifié est trop long (30 caractères maximum)', 30),
                            new NotNullValidator('Merci de spécifier un mot de passe'),
                        ],
                    ]
                )
            )
            ->add(
                new FileField(
                    [
                        'label' => 'IMAGE DE PROFILE',
                        'name' => 'avatar',
                        'accept' => 'image/png, image/jpeg',
                        'validators' => [],
                    ]
                )
            );
    }
}
