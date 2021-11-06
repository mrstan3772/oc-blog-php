<?php

namespace App\Frontend\Modules\Main;

use \Entity\NewsletterEmail;
use \Entity\Contact;
use \FormBuilder\NewsletterFormBuilder;
use \FormBuilder\ContactFormBuilder;
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
        // CONFIGURATION DE LA VUE
        $this->app->user()->selectDefaultLanguage();

        $lang_abbr = preg_replace_callback(
            '/^(.+)(_)(.+)$/',
            function ($matches) {
                return ucfirst($matches[1]) . ucfirst($matches[3]);
            },
            $this->app->user()->getAttribute('lang')
        );


        // RÉCUPÉRATION DU CONTENU ENVOYÉ PAR UNE REQUETE VIA LA MÉTHODE POST
        if ($request->postExists('contactLastName')) {
            $contact = new Contact([
                'contactLastName' => $request->postData('contactLastName'),
                'contactFirstName' => $request->postData('contactFirstName'),
                'contactEmail' => $request->postData('contactEmail'),
                'contactSubject' => $request->postData('contactSubject'),
                'contactMessage' => $request->postData('contactMessage'),
            ]);
        } else {
            $contact = new Contact;
        }

        if ($request->postExists('neAdress')) {
            $newsletter = new NewsletterEmail(
                ['neAdress' => $request->postData('neAdress'),]
            );
        } else {
            $newsletter = new NewsletterEmail;
        }

        // GESTION DES PROJETS
        $works = $this->app->config()->get('work_list');
        $this->page->addVar('works', $works);

        // GESTION DES NEWS
        $news_number = $this->app->config()->get('news_number');
        $characters_number = $this->app->config()->get('characters_number');

        $member_manager = $this->managers->getManagerOf('Member');
        $news_manager = $this->managers->getManagerOf('News');

        $news_list = $news_manager->getList(0, $news_number);

        $author_list = [];

        foreach ($news_list as $news) {
            if (strlen($news->newsLeadParagraph()) > $characters_number) {
                $start = substr($news->newsLeadParagraph(), 0, $characters_number);
                $start = substr($start, 0, strrpos($start, ' ')) . '...';
                $news->setNewsLeadParagraph($start);
            }
            $author_list[$news->id()] = $member_manager->getUnique($news->newsAuthorId());
        }

        $this->page->addVar('news_list', $news_list);
        $this->page->addVar('author_list', $author_list);


        // DÉFINITION DU FORMULAIRE DE LA NEWSLETTER
        $nsl_form_builder = new NewsletterFormBuilder($newsletter);
        $nsl_form_builder->build();

        $form_newsletter = $nsl_form_builder->form();

        $nsl_form_handler = new FormHandler($form_newsletter, $this->managers->getManagerOf('NewsletterEmail'), $request);

        if ($nsl_form_handler->process()) {
            $this->managers->getManagerOf('NewsletterEmail')->save($newsletter);
            $this->app->user()->setFlash('L\'adresse email a bien été enregistré, merci de vous êtres abonné.');
            $this->app->httpResponse()->redirect('/#footer');
        }


        // DÉFINTION DU FORMULAIRE DE CONTACT
        $contact_form_builder = new ContactFormBuilder($contact);
        $contact_form_builder->build();

        $form_contact = $contact_form_builder->form();

        $contact_form_handler = new FormHandler($form_contact, $this->managers->getManagerOf('Contact'), $request);

        if ($contact_form_handler->process()) {
            $send_mail = $this->managers->getManagerOf('Contact')->sendMail($contact);
            if ($send_mail) {
                $this->app->user()->setFlash('<div class="alert alert-success" role="alert">Le message a bien été reçu  5/5, nous vous réponderons dans les plus briefs délais.</div>');
            } else {
                $this->app->user()->setFlash('<div class="alert alert-danger" role="alert">Une erreur est survenu dans l\'envoi du formulaire.</div>');
            }
            $this->app->httpResponse()->redirect('/#contact');
        }


        // AFFECTATION DES VARIABLES
        $this->page->addVar('c_lg', $lang_abbr);
        $this->page->addVar('form_newsletter', $form_newsletter->createView());
        $this->page->addVar('form_contact', $form_contact->createView());
    }
}
