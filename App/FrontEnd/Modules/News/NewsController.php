<?php

namespace App\Frontend\Modules\News;

use \Entity\NewsletterEmail;
use \Entity\Contact;
use \FormBuilder\NewsletterFormBuilder;
use \FormBuilder\ContactFormBuilder;
use \FormBuilder\ProductionRequestFormBuilder;
use \SamplePHPFramework\Components\BackController;
use \SamplePHPFramework\Components\HTTPRequest;
use \SamplePHPFramework\Form\FormHandler;
use \DateTime;

class NewsController extends BackController
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
		$news_index_list_number = $this->app->config()->get('news_index_list_number');
		$characters_number = $this->app->config()->get('characters_number');

		$member_manager = $this->managers->getManagerOf('Member');
		$news_manager = $this->managers->getManagerOf('News');

		$news_list = null;

		$author_list = [];

		$current_page = 1;

		if ($request->getExists('page')) {
			$current_page = $request->getData('page');

			if ($current_page === '1') {
				$this->app->httpResponse()->redirect('/news');
			} else {
				$news_list = $this->managers->getManagerOf('News')->getList(($request->getData('page') - 1) * $news_index_list_number, $news_index_list_number);
			}

			if (empty($news_list)) {
				$this->app->httpResponse()->redirect404();
			}
		} else {
			$news_list = $news_manager->getList(0, $news_index_list_number);
		}

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
		$this->page->addVar('page_number', $news_manager->count() / $news_index_list_number + 1);
		$this->page->addVar('current_page', $current_page);
	}

	/**
	 * ExecuteShow
	 *
	 * @param HTTPRequest $request Request parameter
	 * 
	 * @return void
	 */
	public function executeShow(HTTPRequest $request)
	{
		$news_index_list_number = $this->app->config()->get('news_index_list_number');
		$news_list = $this->managers->getManagerOf('News')->getList(0, $news_index_list_number);
		$news_archive_list = $this->managers->getManagerOf('News')->getList(0, $news_index_list_number, true);
		
		$news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
		if (empty($news)) {
			$this->app->httpResponse()->redirect404();
		}

		$member_manager = $this->managers->getManagerOf('Member');
		$comment_list = $this->managers->getManagerOf('Comments')->getListOf($news->id());

		$author_list = [];

		foreach ($comment_list as $comment) {
			$author_list[$comment->id()] = $member_manager->getUnique($news->newsAuthorId());
		}

		$this->page->addVar('news', $news);
		$this->page->addVar('recent_news', $news_list);
		$this->page->addVar('archive_news', $news_archive_list);
		$this->page->addVar('author', $this->managers->getManagerOf('Member')->getUnique($news->newsAuthorId()));
		$this->page->addVar('author_list', $author_list);
		$this->page->addVar('comments', $comment_list);
	}

	// public function executeInsertComment(HTTPRequest $request)
	// {
	//   if ($request->method() === 'POST') {
	//     $comment = new Comment([
	//       'news' => $request->getData('news'),
	//       'author' => $request->postData('author'),
	//       'content' => $request->postData('content')
	//     ]);
	//   } else {
	//     $comment = new Comment;
	//   }

	//   $formBuilder = new CommentFormBuilder($comment);
	//   $formBuilder->build();

	//   $form = $formBuilder->form();

	//   // On récupère le gestionnaire de formulaire (le paramètre de getManagerOf() est bien entendu à remplacer).
	//   $formHandler = new \OCFram\FormHandler($form, $this->managers->getManagerOf('Comments'), $request);
	//   if ($formHandler->process()) {
	//     $this->managers->getManagerOf('Comments')->save($comment);
	//     $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
	//     $this->app->httpResponse()->redirect('news-' . $request->getData('news'));
	//   }

	//   /* if ($comment->isValid())
	//       {
	//         $this->managers->getManagerOf('Comments')->save($comment);

	//         $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');

	//         $this->app->httpResponse()->redirect('news-'.$request->getData('news'));
	//       }
	//       else
	//       {
	//         $this->page->addVar('erreurs', $comment->errors());
	//       } */

	//   $this->page->addVar('comment', $comment);
	//   $this->page->addVar('form', $form->createView()); // On passe le formulaire généré à la vue.
	//   $this->page->addVar('title', 'Ajout d\'un commentaire');
	// }
}
