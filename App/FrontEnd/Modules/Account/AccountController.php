<?php

namespace App\Frontend\Modules\Account;

use \Entity\Member;
use FormBuilder\ConnectionFormBuilder;
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
     * ExecuteRegistration
     *
     * @param HTTPRequest $request Request parameter
     * 
     * @return void
     */
    public function executeRegistration(HTTPRequest $request): Void
    {
        // VARIABLES D'INITIALISATION
        $member_profil_picture_path = null;
        $register_error_message = [];

        // VÉRIFICATION DE LA SIMILITUDE DES MOTS DE PASSE
        if ($request->postData('memberPassword') !== $request->postData('memberPasswordRepeat')) {
            $register_error_message[0] = 'Les deux mots de passe ne sont pas identiques !';
            // throw new \RuntimeException('Erreur mot de passe');
        }

        // RÉCUPÉRATION DU CONTENU ENVOYÉ PAR UNE REQUETE VIA LA MÉTHODE POST
        if ($request->postExists('memberPseudonym') && $request->fileExists('memberProfilePicturePath') && $request->fileData('memberProfilePicturePath')['name'] !== '') {
            if (
                $this->managers->getManagerOf('Member')->getUnique($request->postData('memberPseudonym')) === null
                || $this->managers->getManagerOf('Member')->getUnique($request->postData('memberEmailAddress'), 'member_email_address') === null
            ) {
                error_log(print_r('Level 1', true), 0);
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
            } else {
                error_log(print_r('Level 2', true), 0);
                $member = new Member;

                $register_error_message[1] = 'Un utilisateur avec le même nom ou la même adresse email existe déjà.';
            }
        } elseif (($request->postExists('memberPseudonym'))) {
            if (
                $this->managers->getManagerOf('Member')->getUnique($request->postData('memberPseudonym')) === null
                || $this->managers->getManagerOf('Member')->getUnique($request->postData('memberEmailAddress'), 'member_email_address') === null
            ) {
                error_log(print_r('Level 3', true), 0);
                $member = new Member([
                    'memberPseudonym' => $request->postData('memberPseudonym'),
                    'memberLastName' => $request->postData('memberLastName'),
                    'memberFirstName' => $request->postData('memberFirstName'),
                    'memberFirstName' => $request->postData('memberFirstName'),
                    'memberGender' => $request->postData('memberGender'),
                    'memberEmailAddress' => $request->postData('memberEmailAddress'),
                    'memberPassword' => $request->postData('memberPassword'),
                ]);
            } else {
                error_log(print_r('Level 4', true), 0);
                $member = new Member;

                $register_error_message[1] = 'Un utilisateur avec le même nom ou la même adresse email existe déjà.';
            }
        } else {
            error_log(print_r('Level 5', true), 0);
            $member = new Member;
        }

        // AFFICHAGE DES ERREURS
        $error_message = '<ul>';

        if (!empty($register_error_message)) {
            foreach ($register_error_message as $key => $message) {
                $error_message .= '<li><strong>Erreur : </strong> ' . $message . '</li>';
            }

            $error_message .= '</ul>';

            $this->app->user()->setFlash('<div class="alert alert-danger" role="alert">' . $error_message . '</div>');
        }

        // DÉFINTION DU FORMULAIRE D'INSCRIPTION
        $registration_form_builder = new RegistrationFormBuilder($member);
        $registration_form_builder->build();

        $form_registration = $registration_form_builder->form();

        $registration_form_handler = new FormHandler($form_registration, $this->managers->getManagerOf('Member'), $request);

        if ($registration_form_handler->process() && empty($register_error_message)) {
            if ($request->fileExists('memberProfilePicturePath') && $request->fileData('memberProfilePicturePath')['name'] !== '') {

                // UPLOAD PROFIL PICTURE
                $member_profil_picture_path = $this->uploadFile($request->fileData('memberProfilePicturePath'))->getNameWithExtension();

                $member->setMemberProfilePicturePath($member_profil_picture_path);
            }

            $this->managers->getManagerOf('Member')->save($member);

            $this->app->user()->setFlash('<div class="alert alert-success" role="alert">Votre inscription est finalisé ! Bienvue parmi nous ! </div>');

            $this->app->httpResponse()->redirect('/registration');
        }


        // AFFECTATION DES VARIABLES
        $this->page->addVar('title', 'Inscription' . ' | ' . $this->page->vars()['title']);
        $this->page->addVar('form_registration', $form_registration->createView());
    }

    /**
     * ExecuteConnection
     *
     * @param HTTPRequest $request Request parameter
     * 
     * @return void
     */
    public function executeConnection(HTTPRequest $request): Void
    {
        // VARIABLES D'INITIALISATION
        $register_error_message = [];

        // RÉCUPÉRATION DU CONTENU ENVOYÉ PAR UNE REQUETE VIA LA MÉTHODE POST
        if ($request->postExists('memberPseudonym') && $request->postExists('memberPassword')) {
            if (
                ($member = $this->managers->getManagerOf('Member')->getUnique($request->postData('memberPseudonym'))) === null
            ) {
                $member = new Member;

                $register_error_message[0] = 'Aucun utilisteur correspondant à ce nom, veuillez réessayez.';
            } else {
                if (password_verify($request->postData('memberPassword'), $member->memberPassword())) {
                    $this->app->user()->setAuthenticated(true);
                } else {
                    $member = new Member;

                    $register_error_message[0] = 'Le mot de passe est erroné, veuillez réessayez.';
                }
            }
        } else {
            $member = new Member;
        }

        $error_message = '<ul>';

        if (!empty($register_error_message)) {
            foreach ($register_error_message as $key => $message) {
                $error_message .= '<li><strong>Erreur : </strong> ' . $message . '</li>';
            }

            $error_message .= '</ul>';

            $this->app->user()->setFlash('<div class="alert alert-danger" role="alert">' . $error_message . '</div>');
        }

        // DÉFINTION DU FORMULAIRE DE CONNEXION
        $connection_form_builder = new ConnectionFormBuilder($member);
        $connection_form_builder->build();

        $form_connection = $connection_form_builder->form();

        $connection_form_handler = new FormHandler($form_connection, $this->managers->getManagerOf('Member'), $request);

        if ($connection_form_handler->process()) {
            if ($this->app->user()->isAuthenticated()) {
                $this->app->user()->setAttribute('USER_INFO', $member);

                $this->app->user()->setFlash('<div class="container text-center mx-auto alert alert-success" role="alert">Bienvenue ! ' . $this->app->user()->getAttribute('USER_INFO')->memberPseudonym() . '</div>');

                $this->app->httpResponse()->redirect('/connection');
            }
        }

        // AFFECTATION DES VARIABLES
        $this->page->addVar('title', 'Connexion' . ' | ' . $this->page->vars()['title']);
        $this->page->addVar('form_connection', $form_connection->createView());
    }

    /**
     * ExecuteIndex
     *
     * @param HTTPRequest $request Request parameter
     * 
     * @return void
     */
    public function executeIndex(HTTPRequest $request): Void
    {
        if (!$this->app->user()->isAuthenticated()) {
            $this->app->httpResponse()->redirect404();
        }

        $request_path = $this->app->httpRequest()->requestURI();
        $pattern = '/\/(\w+)\/(.+)/i';
        preg_match($pattern, $request_path, $matches);
        $request_path = $matches[2];

        if ($request_path != $this->app->user()->getAttribute('USER_INFO')->id()) {
            $this->app->httpResponse()->redirect404();
        }

        // AFFECTATION DES VARIABLES
        $this->page->addVar('title', 'MON ESPACE PERSO' . ' | ' . $this->page->vars()['title']);
    }

    /**
     * ExecuteDisconnection
     *
     * @param HTTPRequest $request Request parameter
     * 
     * @return void
     */
    public function executeDisconnection(HTTPRequest $request): Void
    {
        $this->app->user()->removeAttribute('USER_INFO');
        $this->app->user()->removeAttribute('auth');

        $this->app->httpResponse()->redirect('/');
    }

    /**
     * UploadFile
     *
     * @param  Array $uploaded_file
     * 
     * @return \Upload\File
     */
    private function uploadFile(array $uploaded_file): \Upload\File
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
