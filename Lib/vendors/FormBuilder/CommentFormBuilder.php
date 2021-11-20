<?php

namespace FormBuilder;

use \SamplePHPFramework\Form\FormBuilder;
use \SamplePHPFramework\Form\TextField;
use SamplePHPFramework\Validator\IsStringValidator;
use \SamplePHPFramework\Validator\MaxLengthValidator;
use \SamplePHPFramework\Validator\MinLengthValidator;
use \SamplePHPFramework\Validator\NotNullValidator;

class CommentFormBuilder extends FormBuilder
{
    public function build(): Void
    {
        $this->form->add(
            new TextField(
                [
                    'label' => '',
                    'name' => 'commentContent',
                    'classField' => 'form-control',
                    'rows' => 10,
                    // 'cols' => 100,
                    'minLength' => 5,
                    'maxLength' => 5000,
                    'placeholder' => 'Contenu',
                    'validators' => [
                        new MinLengthValidator('Le message spécifié est trop court (5 caractères minimum)', 5),
                        new MaxLengthValidator('Le message spécifié est trop long (5000 caractères maximum)', 5000),
                        new NotNullValidator('Merci de spécifier votre commentaire'),
                        new IsStringValidator('Valeur illisible !'),
                    ],
                ]
            )
        );
    }
}
