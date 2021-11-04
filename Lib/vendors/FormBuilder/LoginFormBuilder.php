<?php

namespace FormBuilder;

use \SamplePHPFramework\Form\FormBuilder;
use \SamplePHPFramework\Form\StringField;
use \SamplePHPFramework\Form\PasswordField;
use \SamplePHPFramework\Validator\MaxLengthValidator;
use \SamplePHPFramework\Validator\MinLengthValidator;
use \SamplePHPFramework\Validator\NotNullValidator;

class LoginFormBuilder extends FormBuilder
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
            );
    }
}
