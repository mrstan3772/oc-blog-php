<?php

namespace App\FrontEnd;

use \SamplePHPFramework\Application;
use \DateTime;

/**
 * FrontEndApplication
 */
class FrontEndApplication extends Application
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->name  = 'FrontEnd';
    }

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        $controller = $this->getController();
        $controller->page()->addVar('title', 'BLOG STANLEY LOUIS JEAN');
        $controller->page()->addVar('title_page', 'STANLEY BLOG');
        $controller->execute();

        // CONFIGURATION DE L'APPLICATION
        $current_date = new DateTime();
        $current_year = $current_date->format('Y');

        $controller->page()->addVar('copyright_date', $current_year);

        //VÉRIFIER SI L'UTILISATEUR EST CONNECTÉ
        if ($this->user->isAuthenticated()) {
            $user_session = $this->user->getAttribute('USER_INFO');
            $controller->page()->addVar('user_session', $user_session);

            if (
                $this->http_request->requestURI() === '/registration' || $this->http_request->requestURI() === '/registration/'
                || $this->http_request->requestURI() === '/connection' ||  $this->http_request->requestURI() === '/connection/'
            ) {
                $this->http_response->redirect('/user/'.$user_session->id());
            }
        }

        $this->http_response->setPage($controller->page());
        $this->http_response->send();
    }
}
