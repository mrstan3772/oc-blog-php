<?php

namespace FormBuilder;

use \SamplePHPFramework\Form\FormBuilder;
use \SamplePHPFramework\Form\StringField;
use \SamplePHPFramework\Form\TextField;
use \SamplePHPFramework\Validator\MaxLengthValidator;
use \SamplePHPFramework\Validator\MinLengthValidator;
use \SamplePHPFramework\Validator\NotNullValidator;

class NewsFormBuilder extends FormBuilder
{
    public function build()
    {
        $this->form->add(
            new StringField(
                [
                    'label' => 'Titre',
                    'name' => 'title',
                    'minLength' => 3,
                    'maxLength' => 100,
                    'validators' => [
                        new MinLengthValidator('Le titre spécifié est trop court (3 caractères maximum)', 3),
                        new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
                        new NotNullValidator('Merci de spécifier le titre du post'),
                    ],
                ]
            )
        )
            ->add(
                new TextField(
                    [
                        'label' => 'Chapô',
                        'name' => 'lead_paragraph',
                        'rows' => 30,
                        'cols' => 5000,
                        'minLength' => 5,
                        'maxLength' => 1000,
                        'validators' => [
                            new MinLengthValidator('Le contenu du chapô spécifié est trop court (5 caractères maximum)', 5),
                            new MaxLengthValidator('Le contenu de chapô spécifié est trop long (1000 caractères maximum)', 1000),
                            new NotNullValidator('Merci de spécifier le contenu du chapô'),
                        ],
                    ]
                )
            )
            ->add(
                new TextField(
                    [
                        'label' => 'Contenu',
                        'name' => 'content',
                        'rows' => 8,
                        'cols' => 60,
                        'minLength' => 5,
                        'maxLength' => 50000,
                        'validators' => [
                            new MinLengthValidator('Le contenu de l\'article spécifié est trop court (5 caractères maximum)', 5),
                            new MaxLengthValidator('Le contenu de l\'article spécifié est trop long (50000 caractères maximum)', 50000),
                            new NotNullValidator('Merci de spécifier le contenu du post'),
                        ],
                    ]
                )
            );
    }
}
