<?php

namespace App\Frontend\Modules\Account;

use \Entity\Member;
use \FormBuilder\RegistrationFormBuilder;
use \SamplePHPFramework\Components\BackController;
use \SamplePHPFramework\Components\HTTPRequest;
use \SamplePHPFramework\Form\FormHandler;

/**
 * AccountController
 */
class AccountController extends BackController
{
    /**
     * executeRegistration
     *
     * @param HTTPRequest $request Request parameter
     * 
     * @return void
     */
    public function executeRegistration(HTTPRequest $request): Void
    {
        // RÉCUPÉRATION DU CONTENU ENVOYÉ PAR UNE REQUETE VIA LA MÉTHODE POST
        if ($request->postExists('memberPseudonym') && $request->fileExists('memberProfilePicturePath')) {
            if (
                $this->managers->getManagerOf('Member')->getUnique($request->postData('memberPseudonym')) === null
                || $this->managers->getManagerOf('Member')->getUnique($request->postData('memberEmailAddress'), 'member_email_address') === null
            ) {
                $member = new Member([
                    'memberPseudonym' => $request->postData('memberPseudonym'),
                    'memberLastName' => $request->postData('memberLastName'),
                    'memberFirstName' => $request->postData('memberFirstName'),
                    'memberFirstName' => $request->postData('memberFirstName'),
                    'memberGender' => $request->postData('memberGender'),
                    'memberEmailAddress' => $request->postData('memberEmailAddress'),
                    'memberPassword' => $request->postData('memberPassword'),
                    'memberProfilePicturePath' => $request->fileData('memberProfilePicturePath'),
                ]);
        
                // UPLOAD PROFIL PICTURE
                $member_profil_picture_path = $this->uploadFile($request->fileData('memberProfilePicturePath'))->getNameWithExtension();
            } else {
                $this->app->user()->setFlash('<div class="alert alert-danger" role="alert">L\'utilisateur existe déjà.</div>');
            }
        } else {
            $member = new Member;
        }

        // AJOUT DE VÉRIFICATION
        $register_error_message = [];

        // VÉRIFICATION DU MOT DE PASSE
        if ($request->postData('memberPassword') !== $request->postData('memberPasswordRepeat')) {
            $register_error_message[0] = 'Les deux mots de passe ne sont pas identiques !';
            // throw new \RuntimeException('Erreur mot de passe');
        }

        $error_message = '<ul>';

        if (!empty($register_error_message)) {
            foreach ($register_error_message as $key => $message) {
                $error_message .= '<li><strong>Erreur : </strong> ' . $message . '</div></li>';
            }

            $error_message .= '</ul>';

            $this->app->user()->setFlash('<div class="alert alert-danger" role="alert">' . $error_message . '</div>');
        }

        // DÉFINTION DU FORMULAIRE D'INSCRIPTION
        $registration_form_builder = new RegistrationFormBuilder($member);
        $registration_form_builder->build();

        $form_registration = $registration_form_builder->form();

        $registration_form_handler = new FormHandler($form_registration, $this->managers->getManagerOf('Member'), $request);

        if ($registration_form_handler->process()) {
            $member->setMemberProfilePicturePath($member_profil_picture_path);
            $this->managers->getManagerOf('Member')->save($member);

            $this->app->user()->setFlash('<div class="alert alert-success" role="alert">Votre inscription est finalisé ! Bienvue parmi nous ! </div>');

            $this->app->httpResponse()->redirect('/registration');
        }


        // AFFECTATION DES VARIABLES
        $this->page->addVar('title', 'Inscription' . ' | ' . $this->page->vars()['title']);
        $this->page->addVar('form_registration', $form_registration->createView());
    }

    private function uploadFile($uploaded_file)
    {
        $storage = new \Upload\Storage\FileSystem(__DIR__ . '/../../../../Web/dist/images/member');
        $file = new \Upload\File('memberProfilePicturePath', $storage);

        $new_filename = uniqid();
        $file->setName($new_filename);

        $file->addValidations(array(
            new \Upload\Validation\Mimetype(array('image/png', 'image/gif', 'image/jpeg')),
            new \Upload\Validation\Size('5M')

        ));

        try {
            $file->upload();
        } catch (\Exception $e) {
            $errors = $file->getErrors();
        }

        return $file;
    }
}
