<?php

namespace App\Backend\Modules\News;

use \Entity\News;
use \FormBuilder\NewsFormBuilder;
use \SamplePHPFramework\Components\BackController;
use \SamplePHPFramework\Components\HTTPRequest;
use \SamplePHPFramework\Form\FormHandler;
use \League\HTMLToMarkdown\HtmlConverter;
use Michelf\Markdown;

/**
 * NewsController
 */
class NewsController extends BackController
{
    /**
     * ExecuteInsert
     *
     * @param HTTPRequest $request Request parameter
     * 
     * @return void
     */
    public function executeInsert(HTTPRequest $request): Void
    {
        // APPEL DE LA MÉTHODE UTILITAIRE POUR LE FORMULAIRE DES BILLETS DE BLOG
        $this->processForm($request);

        // AFFECTATION DES VARIABLES
        $this->page->addVar('title_page', 'Insertion pour les billets de blog');
    }

    /**
     * ExecuteUpdate
     *
     * @param HTTPRequest $request Request parameter
     * 
     * @return void
     */
    public function executeUpdate(HTTPRequest $request): Void
    {
        // APPEL DE LA MÉTHODE UTILITAIRE POUR LE FORMULAIRE DES BILLETS DE BLOG
        $this->processForm($request);

        // AFFECTATION DES VARIABLES
        $this->page->addVar('title_page', 'Mise à jour du post');
    }

    /**
     * ExecuteDelete
     *
     * @param HTTPRequest $request Request parameter
     * 
     * @return void
     */
    public function executeDelete(HTTPRequest $request): Void
    {
        $news_id = $request->getData('id');

        $news_title = $this->managers->getManagerOf('News')->getUnique($news_id)->newsTitle();

        $this->managers->getManagerOf('News')->delete($news_id);

        $this->managers->getManagerOf('Comment')->deleteFromNews($news_id);

        $this->app->user()->setFlash('<div class="alert alert-success" role="alert">Le billet de  blog "' . "$news_title" . '" a bien été supprimée !</div>');

        $this->app->httpResponse()->redirect('.');
    }

    /**
     * ProcessForm
     *
     * @param  HTTPRequest $request Request parameter
     * 
     * @return void
     */
    private function processForm(HTTPRequest $request): Void
    {
        // VARIABLES D'INITIALISATION
        $news_error_message = [];
        $converter = new HtmlConverter();

        if ($request->method() == 'POST') {
            $news = new News([
                'newsAuthorId' => $this->app->user()->getAttribute('USER_INFO')->id(),
                'newsTitle' =>  $request->postData('newsTitle'),
                'newsLeadParagraph' =>  $converter->convert($request->postData('newsLeadParagraph')),
                'newsContent' =>  $converter->convert($request->postData('newsContent')),
                'newsCategory' => $request->postData('newsCategory'),
            ]);

            if ($request->fileExists('newsCover') && $request->fileData('newsCover')['name'] !== '') {
                $news->setNewsCover($request->fileData('newsCover'));
            }

            if ($request->postData('newsArchive') !== null) {
                $news->setNewsArchive(true);
            }

            if ($request->getExists('id')) {
                $news->setId($request->getData('id'));
            }
        } else {
            if ($request->getExists('id')) {
                $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
                $news->setNewsLeadParagraph(Markdown::defaultTransform($news->newsLeadParagraph()));
                $news->setNewsContent(Markdown::defaultTransform($news->newsContent()));
            } else {
                $news = new News([
                    'newsCategory' => 'AUCUNE CATÉGORIE',
                ]);
            }
        }

        // DÉFINTION DU FORMULAIRE DES BILLETS DE BLOG
        $news_form_builder = new NewsFormBuilder($news);
        $news_form_builder->build();

        $form_news = $news_form_builder->form();

        $news_form_handler = new FormHandler($form_news, $this->managers->getManagerOf('News'), $request);

        if ($news_form_handler->process() && empty($news_error_message)) {
            if ($request->fileExists('newsCover') && $request->fileData('newsCover')['name'] !== '') {

                // UPLOAD PROFIL PICTURE
                $news_thumbnail = $this->uploadFile($request->fileData('newsCover'))->getNameWithExtension();

                $news->setNewsCover($news_thumbnail);
            }

            $this->managers->getManagerOf('News')->save($news);

            $this->app->user()->setFlash($news->isNew() ? '<div class="alert alert-success" role="alert">La news a bien été ajoutée !</div>' : '<div class="alert alert-success" role="alert">La news a bien été modifiée !</div>');

            if ($request->getExists('id')) {
                $this->app->httpResponse()->redirect('/admin/news-update-' . $request->getData('id'));
            } else {
                $this->app->httpResponse()->redirect('/admin/news-insert');
            }
        }

        $this->page->addVar('news', $news);
        $this->page->addVar('form', $form_news->createView());
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
        $storage = new \Upload\Storage\FileSystem(__DIR__ . '/../../../../Web/assets/src/images/blog');
        $file = new \Upload\File('newsCover', $storage);

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
