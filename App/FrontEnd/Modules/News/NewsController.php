<?php

namespace App\Frontend\Modules\News;

use Entity\Comment;
use FormBuilder\CommentFormBuilder;
use \SamplePHPFramework\Components\BackController;
use \SamplePHPFramework\Components\HTTPRequest;
use \SamplePHPFramework\Form\FormHandler;
use Michelf\Markdown;

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

		// AFFECTATION DES VARIABLES
		$this->page->addVar('title', 'LISTE DES BILLETS DE BLOG' . ' | ' . $this->page->vars()['title']);
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
	public function executeShow(HTTPRequest $request): Void
	{
		$news_index_list_number = $this->app->config()->get('news_index_list_number');
		$news_list = $this->managers->getManagerOf('News')->getList(0, $news_index_list_number);
		$news_archive_list = $this->managers->getManagerOf('News')->getList(0, $news_index_list_number, true);

		$news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
		$news->setNewsLeadParagraph(Markdown::defaultTransform($news->newsLeadParagraph()));
		$news->setNewsContent(Markdown::defaultTransform($news->newsContent()));
		if (empty($news)) {
			$this->app->httpResponse()->redirect404();
		}

		$member_manager = $this->managers->getManagerOf('Member');
		$comment_list = $this->managers->getManagerOf('Comment')->getListOf($news->id());

		$author_list = [];

		$comment_count = 0;

		foreach ($comment_list as $comment) {
			$author_list[$comment->id()] = $member_manager->getUnique($comment->commentNewsAuthorId());
			if ($comment->commentStatus()) {
				$comment_count++;
			}
		}

		//VÉRIFIER SI L'UTILISATEUR EST CONNECTÉ
		if ($this->app->user()->isAuthenticated()) {
			// RÉCUPÉRATION DU CONTENU ENVOYÉ PAR UNE REQUETE VIA LA MÉTHODE POST
			if ($request->method() === 'POST') {
				$comment = new Comment([
					'commentNewsId' => $request->getData('id'),
					'commentNewsAuthorId' => $this->app->user()->getAttribute('USER_INFO')->id(),
					'commentContent' => $request->postData('commentContent')
				]);
			} else {
				$comment = new Comment;
			}


			$form_builder = new CommentFormBuilder($comment);
			$form_builder->build();

			$comment_form = $form_builder->form();

			$form_hanlder = new FormHandler($comment_form, $this->managers->getManagerOf('Comment'), $request);

			if ($form_hanlder->process()) {
				$this->managers->getManagerOf('Comment')->save($comment);
				$this->app->user()->setFlash('<div class="alert alert-success" role="alert">Le commentaire a bien été ajouté, merci !</div>');
				$this->app->httpResponse()->redirect('/news/' . $request->getData('id'));
			}

			$comment_form = $comment_form->createView();
		} else {
			$comment_form = '<div class="alert alert-warning" role="alert"><a href="/connection" title="Se connecter" class="text-danger text-decoration-underline">Connectez-vous</a> pour poster un message.</div>';
		}

		// AFFECTATION DES VARIABLES
		$this->page->addVar('title', $news->newstitle() . ' | ' . $this->page->vars()['title']);
		$this->page->addVar('news', $news);
		$this->page->addVar('recent_news', $news_list);
		$this->page->addVar('archive_news', $news_archive_list);
		$this->page->addVar('author', $this->managers->getManagerOf('Member')->getUnique($news->newsAuthorId()));
		$this->page->addVar('author_list', $author_list);
		$this->page->addVar('comment_count', $comment_count);
		$this->page->addVar('comments', $comment_list);
		$this->page->addVar('comment_form', $comment_form);
	}

	/**
	 * ExecuteDeleteComment
	 *
	 * @param HTTPRequest $request Request parameter
	 * 
	 * @return void
	 */
	public function executeDeleteComment(HTTPRequest $request): Void
	{
		$comment = $this->managers->getManagerOf('Comment')->getUnique($request->getData('id'));

		$this->managers->getManagerOf('Comment')->delete($request->getData('id'));

		$this->app->user()->setFlash('<div class="alert alert-success" role="alert">Le commentaire a bien été supprimé !</div>');

		$this->app->httpResponse()->redirect('/news/' . $comment->commentNewsId());
	}
}
