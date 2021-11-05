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

        $this->http_response->setPage($controller->page());
        $this->http_response->send();
    }
}
