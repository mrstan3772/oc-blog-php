<?php

namespace App\FrontEnd;

use \SamplePHPFramework\Application;

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
    public function run() {
        $controller = $this->getController();
        $controller->execute();

        $this->http_response->setPage($controller->page());
        $this->http_response->send();
    }
}