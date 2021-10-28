<?php

namespace FormBuilder;

use \SamplePHPFramework\Form\FormBuilder;
use \SamplePHPFramework\Form\EmailField;
use \SamplePHPFramework\Validator\IsEmailValidator;
use \SamplePHPFramework\Validator\MaxLengthValidator;
use \SamplePHPFramework\Validator\MinLengthValidator;
use \SamplePHPFramework\Validator\NotNullValidator;

/**
 * NewsletterFormBuilder
 */
class NewsletterFormBuilder extends FormBuilder
{
    public function build(): Void
    {
        $this->form->add(new EmailField([
            'label' => 'MAIL',
            'name' => 'neAdress',
            'maxLength' => 100,
            'minLength' => 6,
            'placeholder' => 'johndoe@stanleylouisjean.com',
            'validators' => [
                new NotNullValidator('Merci de spécifier l\'adresse email.'),
                new MaxLengthValidator('Le mail spécifié est trop long (100 caractères maximum).', 100),
                new MinLengthValidator('Le mail spécifié est trop court (6 caractères minimum).', 6),
                new IsEmailValidator('Le mail spécifié ne semble pas être valide.'),
            ],
        ]));
    }
}
