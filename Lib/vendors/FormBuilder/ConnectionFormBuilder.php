<?php

namespace FormBuilder;

use \SamplePHPFramework\Form\FormBuilder;
use \SamplePHPFramework\Form\StringField;
use \SamplePHPFramework\Form\PasswordField;
use SamplePHPFramework\Validator\IsStringValidator;
use \SamplePHPFramework\Validator\MaxLengthValidator;
use \SamplePHPFramework\Validator\MinLengthValidator;
use \SamplePHPFramework\Validator\NotNullValidator;

class ConnectionFormBuilder extends FormBuilder
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
                new PasswordField(
                    [
                        'label' => '',
                        'name' => 'memberPassword',
                        'classField' => 'form-control',
                        'minLength' => 8,
                        'maxLength' => 30,
                        'placeholder' => 'MOT DE PASSE',
                        'validators' => [
                            new NotNullValidator('Merci de spécifier un mot de passe'),
                            new IsStringValidator('Valeur illisible !')
                        ],
                    ]
                )
            );
    }
}
