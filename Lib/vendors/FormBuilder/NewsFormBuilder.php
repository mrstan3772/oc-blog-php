<?php

namespace FormBuilder;

use SamplePHPFramework\Form\CheckboxField;
use \SamplePHPFramework\Form\FormBuilder;
use \SamplePHPFramework\Form\StringField;
use \SamplePHPFramework\Form\TextField;
use \SamplePHPFramework\Form\DropDownListField;
use \SamplePHPFramework\Form\FileField;
use SamplePHPFramework\Validator\IsStringValidator;
use \SamplePHPFramework\Validator\MaxLengthValidator;
use \SamplePHPFramework\Validator\MinLengthValidator;
use \SamplePHPFramework\Validator\NotNullValidator;
use \SamplePHPFramework\Validator\IsInTheListValidator;
use \SamplePHPFramework\Validator\AllowedFileValidator;
use \SamplePHPFramework\Validator\MaxFileSizeValidator;

class NewsFormBuilder extends FormBuilder
{
    public function build(): Void
    {
        $this->form->add(
            new StringField(
                [
                    'label' => '',
                    'name' => 'newsTitle',
                    'classField' => 'form-control',
                    'minLength' => 3,
                    'maxLength' => 100,
                    'placeholder' => 'Titre',
                    'validators' => [
                        new MinLengthValidator('Le titre spécifié est trop court (3 caractères minimum)', 3),
                        new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
                        new NotNullValidator('Merci de spécifier le titre du post'),
                        new IsStringValidator('Valeur illisible !'),
                    ],
                ]
            )
        )
            ->add(
                new TextField(
                    [
                        'label' => '',
                        'name' => 'newsLeadParagraph',
                        'classField' => 'form-control',
                        'rows' => 5,
                        // 'cols' => 100,
                        'minLength' => 5,
                        'maxLength' => 1000,
                        'placeholder' => 'Chapô',
                        'validators' => [
                            new MinLengthValidator('Le contenu du chapô spécifié est trop court (5 caractères minimum)', 5),
                            new MaxLengthValidator('Le contenu de chapô spécifié est trop long (1000 caractères maximum)', 1000),
                            new NotNullValidator('Merci de spécifier le contenu du chapô'),
                            new IsStringValidator('Valeur illisible !'),
                        ],
                    ]
                )
            )
            ->add(
                new TextField(
                    [
                        'label' => '',
                        'name' => 'newsContent',
                        'classField' => 'form-control',
                        'rows' => 30,
                        // 'cols' => 100,
                        'minLength' => 5,
                        'maxLength' => 50000,
                        'placeholder' => 'Contenu',
                        'validators' => [
                            new MinLengthValidator('Le contenu de l\'article spécifié est trop court (5 caractères minimum)', 5),
                            new MaxLengthValidator('Le contenu de l\'article spécifié est trop long (50000 caractères maximum)', 50000),
                            new NotNullValidator('Merci de spécifier le contenu du post'),
                            new IsStringValidator('Valeur illisible !'),
                        ],
                    ]
                )
            )
            ->add(
                new DropDownListField(
                    [
                        'label' => '',
                        'name' => 'newsCategory',
                        'classField' => 'form-control',
                        'optionList' => [
                            'PHP',
                            'LINUX',
                            'STREAMING',
                            'JAVASCRIPT',
                            'HTML/CSS',
                            'JEUX',
                            'SÉRIES',
                            'WEB',
                            'AUCUNE CATÉGORIE'
                        ],
                        'validators' => [
                            new NotNullValidator('Merci de spécifier une civilité.'),
                            new IsInTheListValidator(
                                'La catégorie spécifiée n\'apparaît null part dans la liste des options.',
                                [
                                    'PHP',
                                    'LINUX',
                                    'STREAMING',
                                    'JAVASCRIPT',
                                    'HTML/CSS',
                                    'JEUX',
                                    'SÉRIES',
                                    'WEB',
                                    'AUCUNE CATÉGORIE'
                                ]
                            ),
                        ],
                    ]
                )
            )
            ->add(
                new FileField(
                    [
                        'label' => 'MINIATURE DU POST',
                        'name' => 'newsCover',
                        'classField' => 'form-control',
                        'accept' => 'image/png, image/jpeg, image/gif',
                        'required' => false,
                        'validators' => [
                            new AllowedFileValidator('Ce type de fichier n\'est pas supproté. Seul les images JPEG, PNG, GIF sont autorisés.', ['jpeg', 'jpg', 'png', 'gif']),
                            new MaxFileSizeValidator('Le fichier est trop voluminuex et excède la limite maximal de 5MO qui peut être téléversé.', 5242880),
                        ],
                    ]
                )
            )
            ->add(
                new CheckboxField(
                    [
                        'label' => 'ARCHIVER',
                        'name' => 'newsArchive',
                        'classLabel' => 'form-label checkbox-label',
                        'classField' => 'form-check-input',
                        'required' => false,
                        'validators' => [
                            new NotNullValidator('Merci de spécifier si le post doit être archivé'),
                        ],
                    ]
                )
            );
    }
}
