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

        // AFFECTATION DES VARIABLES
        $this->page->addVar('title_page', 'Acceuil');
        $this->page->addVar('news_list', $news_list);
        $this->page->addVar('author_list', $author_list);
    }
}
