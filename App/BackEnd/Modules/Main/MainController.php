<?php

namespace App\Backend\Modules\Main;

use \SamplePHPFramework\Components\BackController;
use \SamplePHPFramework\Components\HTTPRequest;
use \SamplePHPFramework\Form\FormHandler;

/**
 * MainController
 */
class MainController extends BackController
{
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

        

        // AFFECTATION DES VARIABLES
        $this->page->addVar('title', 'Administration' . ' | ' . $this->page->vars()['title']);
    }
}
