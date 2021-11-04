<?php

namespace FormBuilder;

use \SamplePHPFramework\Form\FormBuilder;
use \SamplePHPFramework\Form\StringField;
use \SamplePHPFramework\Form\TextField;
use \SamplePHPFramework\Validator\MaxLengthValidator;
use \SamplePHPFramework\Validator\MinLengthValidator;
use \SamplePHPFramework\Validator\NotNullValidator;

class ContactFormBuilder extends FormBuilder
{
    public function build(): Void
    {
        $this->form->add(
            new StringField(
                [
                    'label' => '',
                    'name' => 'contactLastName',
                    'classField' => 'form-control',
                    'minLength' => 2,
                    'maxLength' => 50,
                    'placeholder' => 'NOM',
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
                        'label' => '',
                        'name' => 'contactFirstName',
                        'classField' => 'form-control',
                        'minLength' => 2,
                        'maxLength' => 30,
                        'placeholder' => 'PRÉNOM',
                        'validators' => [
                            new MinLengthValidator('Le prénom spécifié est trop court (2 caractères minimum)', 2),
                            new MaxLengthValidator('Le prénom spécifié est trop long (30 caractères maximum)', 30),
                            new NotNullValidator('Merci de spécifier un prénom'),
                        ],
                    ]
                )
            )
            ->add(
                new StringField(
                    [
                        'label' => '',
                        'name' => 'contactEmail',
                        
                        'classField' => 'form-control',
                        'minLength' => 2,
                        'maxLength' => 30,
                        'placeholder' => 'EMAIL',
                        'validators' => [
                            new MinLengthValidator('L\'email spécifié est trop court (2 caractères minimum)', 2),
                            new MaxLengthValidator('L\'email spécifié est trop long (30 caractères maximum)', 30),
                            new NotNullValidator('Merci de spécifier un prénom'),
                        ],
                    ]
                )
            )
            ->add(
                new StringField(
                    [
                        'label' => '',
                        'name' => 'contactSubject',
                        'classField' => 'form-control',
                        'minLength' => 2,
                        'maxLength' => 255,
                        'placeholder' => 'OBJET',
                        'validators' => [
                            new MinLengthValidator('L\'objet spécifié est trop court (2 caractères minimum)', 2),
                            new MaxLengthValidator('L\'objet spécifié est trop long (255 caractères maximum)', 255),
                            new NotNullValidator('Merci de spécifier un objet'),
                        ],
                    ]
                )
            )
            ->add(
                new TextField(
                    [
                        'label' => '',
                        'name' => 'contactMessage',    
                        'classField' => 'form-control',
                        'rows' => 5,
                        'cols' => 30,
                        'minLength' => 5,
                        'maxLength' => 50000,
                        'placeholder' => 'MESSAGE',
                        'validators' => [
                            new MinLengthValidator('Le contenu du message spécifié est trop court (5 caractères minimum)', 5),
                            new MaxLengthValidator('Le contenu du message spécifié est trop long (50000 caractères maximum)', 50000),
                            new NotNullValidator('Merci de spécifier le contenu du message'),
                        ],
                    ]
                )
            );
    }
}
