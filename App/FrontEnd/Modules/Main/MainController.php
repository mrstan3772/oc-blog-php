<?php

namespace App\Frontend\Modules\Main;

use Entity\NewsletterEmail;
use FormBuilder\NewsletterFormBuilder;
use FormBuilder\ProductionRequestFormBuilder;
use \SamplePHPFramework\Components\BackController;
use \SamplePHPFramework\Components\HTTPRequest;
use \SamplePHPFramework\Form\FormHandler;
use \DateTime;

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
        $current_date = new DateTime();
        $current_year = $current_date->format('Y');

        $this->app->user()->selectDefaultLanguage();

        $lang_abbr = preg_replace_callback(
            '/^(.+)(_)(.+)$/',
            function ($matches) {
                return ucfirst($matches[1]) . ucfirst($matches[3]);
            },
            $this->app->user()->getAttribute('lang')
        );


        if ($request->postExists('neAdress')) {
            $newsletter = new NewsletterEmail([
                'neAdress' => $request->postData('neAdress'),
            ]);
        } else {
            $newsletter = new NewsletterEmail;
        }

        $form_builder = new NewsletterFormBuilder($newsletter);
        $form_builder->build();

        $form_newsletter = $form_builder->form();

        $form_handler = new FormHandler($form_newsletter, $this->managers->getManagerOf('NewsletterEmail'), $request);

        if ($form_handler->process()) {
            $this->managers->getManagerOf('NewsletterEmail')->save($newsletter);
            $this->app->user()->setFlash('L\'adresse email a bien été enregistré, merci de vous êtres abonné.');
            $this->app->http_response()->redirect('/#footer');
        }

        $this->page->addVar('title', 'NOU LA BA ZOT !');
        $this->page->addVar('c_lg', $lang_abbr);
        $this->page->addVar('copyright_date', $current_year);
        $this->page->addVar('form_newsletter', $form_newsletter->createView());
    }
}