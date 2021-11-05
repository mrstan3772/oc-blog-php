<?php

namespace App\Frontend\Modules\Work;

use \Entity\NewsletterEmail;
use \Entity\Contact;
use \FormBuilder\NewsletterFormBuilder;
use \FormBuilder\ContactFormBuilder;
use \FormBuilder\ProductionRequestFormBuilder;
use \SamplePHPFramework\Components\BackController;
use \SamplePHPFramework\Components\HTTPRequest;
use \SamplePHPFramework\Form\FormHandler;
use \DateTime;

/**
 * WorkController
 */
class WorkController extends BackController
{
    /**
     * ExecuteShow
     *
     * @param HTTPRequest $request Request parameter
     * 
     * @return void
     */
    public function executeShow(HTTPRequest $request): Void
    {
        $request_path = $this->app->httpRequest()->requestURI();
        $pattern = '/\/(\w+)\/(.+)/i';
        preg_match($pattern, $request_path, $matches);
        $request_path = $matches[2];
        $request_path = str_replace('-', '_', $request_path);

        $work = $this->app->config()->get('work_list')->$request_path;

        if (isset($work)) {
            $this->page->addVar('work', $work);
        } else {
            $this->app->httpResponse()->redirect404();
        }

        // AFFECTATION DES VARIABLES
        $this->page->addVar('title', $work->title . ' | ' . $this->page->vars()['title']);
    }
}
