<?php

namespace FormBuilder;

use \SamplePHPFramework\Form\FormBuilder;
use \SamplePHPFramework\Form\StringField;
use \SamplePHPFramework\Form\DropDownListField;
use \SamplePHPFramework\Form\EmailField;
use \SamplePHPFramework\Form\FileField;
use \SamplePHPFramework\Form\PasswordField;
use SamplePHPFramework\Validator\AllowedFileValidator;
use \SamplePHPFramework\Validator\IsEmailValidator;
use \SamplePHPFramework\Validator\IsInTheListValidator;
use SamplePHPFramework\Validator\IsStringValidator;
use SamplePHPFramework\Validator\MaxFileSizeValidator;
use \SamplePHPFramework\Validator\MaxLengthValidator;
use \SamplePHPFramework\Validator\MinLengthValidator;
use \SamplePHPFramework\Validator\NotNullValidator;

class RegistrationFormBuilder extends FormBuilder
{
    public function build(): Void
    {
        $this->form->add(
            new StringField(
                [
                    'label' => '',
                    'name' => 'memberPseudonym',
                    'classField' => 'form-control',
                    'minLength' => 3,
                    'maxLength' => 50,
                    'placeholder' => 'NOM D\'UTILISATEUR',
                    'validators' => [
                        new MinLengthValidator('Le nom d\'utilisateur spécifié est trop court (3 caractères minimum)', 3),
                        new MaxLengthValidator('Le nom d\'utilisateur spécifié est trop long (50 caractères maximum)', 50),
                        new NotNullValidator('Merci de spécifier le nom d\'utilisateur'),
                        new IsStringValidator('Valeur illisible !')
                    ],
                ]
            )
        )
            ->add(
                new StringField(
                    [
                        'label' => '',
                        'name' => 'memberLastName',
                        'classField' => 'form-control',
                        'minLength' => 2,
                        'maxLength' => 50,
                        'placeholder' => 'NOM',
                        'validators' => [
                            new MinLengthValidator('Le nom spécifié est trop court (2 caractères minimum)', 2),
                            new MaxLengthValidator('Le nom spécifié est trop long (50 caractères maximum)', 50),
                            new NotNullValidator('Merci de spécifier un nom'),
                            new IsStringValidator('Valeur illisible !')
                        ],
                    ]
                )
            )
            ->add(
                new StringField(
                    [
                        'label' => '',
                        'name' => 'memberFirstName',
                        'classField' => 'form-control',
                        'minLength' => 2,
                        'maxLength' => 30,
                        'placeholder' => 'PRÉNOM',
                        'validators' => [
                            new MinLengthValidator('Le prénom spécifié est trop court (2 caractères minimum)', 2),
                            new MaxLengthValidator('Le prénom spécifié est trop long (30 caractères maximum)', 30),
                            new NotNullValidator('Merci de spécifier un prénom'),
                            new IsStringValidator('Valeur illisible !')
                        ],
                    ]
                )
            )
            ->add(
                new DropDownListField(
                    [
                        'label' => '',
                        'name' => 'memberGender',
                        'classField' => 'form-control',
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
                        'label' => '',
                        'name' => 'memberEmailAddress',
                        'classField' => 'form-control',
                        'maxLength' => 100,
                        'minLength' => 6,
                        'placeholder' => 'MAIL',
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
                new FileField(
                    [
                        'label' => 'IMAGE DE PROFILE',
                        'name' => 'memberProfilePicturePath',
                        'accept' => 'image/png, image/jpeg, image/gif',
                        'validators' => [
                            new AllowedFileValidator('Ce type de fichier n\'est pas supproté. Seul les images JPEG, PNG, GIF sont autorisés.', ['jpeg', 'jpg', 'png', 'gif']),
                            new MaxFileSizeValidator('Le fichier est trop voluminuex et excède la limite maximal de 5MO qui peut être téléversé.', 5242880),
                        ],
                    ]
                )
            )
            ->add(
                new PasswordField(
                    [
                        'label' => '',
                        'name' => 'memberPassword',
                        'classField' => 'form-control',
                        'minLength' => 8,
                        'maxLength' => 30,
                        'placeholder' => 'MOT DE PASSE (8 caractères minimum)',
                        'validators' => [
                            new MinLengthValidator('Le mot de passe spécifié est trop court (8 caractères minimum)', 8),
                            new MaxLengthValidator('Le mot de passe spécifié est trop long (30 caractères maximum)', 30),
                            new NotNullValidator('Merci de spécifier un mot de passe'),
                            new IsStringValidator('Valeur illisible !')
                        ],
                    ]
                )
            );
    }
}
