<?php

namespace App\BackEnd;

use \SamplePHPFramework\Application;
use \DateTime;

/**
 * BackEndApplication
 */
class BackEndApplication extends Application
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->name  = 'BackEnd';
    }

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        //VÉRIFIER SI L'UTILISATEUR EST CONNECTÉ & DISPOSE DES DROTS SUFFISANT POUR ADMINISTRER LE SITE
        if (
            $this->user->isAuthenticated()
            && $this->user()->getAttribute('USER_INFO')->memberAdmin()
        ) {
            $controller = $this->getController();
            $controller->page()->addVar('title', 'TABLEAU DE BORD');
            $controller->page()->addVar('title_page', 'ADMINISTRATION');
            $controller->execute();

            // CONFIGURATION DE L'APPLICATION
            $current_date = new DateTime();
            $current_year = $current_date->format('Y');

            $controller->page()->addVar('copyright_date', $current_year);

            $user_session = $this->user->getAttribute('USER_INFO');
            $controller->page()->addVar('user_session', $user_session);
        } else {
            $this->http_response->redirect404();
        }

        $this->http_response->setPage($controller->page());
        $this->http_response->send();
    }
}
