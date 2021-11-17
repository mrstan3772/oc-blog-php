<?php

namespace Model;

use \SamplePHPFramework\Manager;
use \Entity\Comment;
use \Entity\News;

abstract class CommentManager extends Manager
{
	/**
	 * Méthode permettant d'ajouter un commentaire
	 * @param $comment Le commentaire à ajouter
	 * @return void
	 */
	abstract protected function add(Comment $comment) : Void;

	/**
	 * Méthode permettant d'enregistrer un commentaire.
	 * @param $comment Le commentaire à enregistrer
	 * @return void
	 */
	public function save(Comment $comment) : Void
	{
		if ($comment->isValid()) {
			$comment->isNew() ? $this->add($comment) : $this->modify($comment);
		} else {
			throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
		}
	}


	/**
	 * Méthode permettant de récupérer une liste de commentaires.
	 * @param $news La news sur laquelle on veut récupérer les commentaires
	 * @return array
	 */
	abstract public function getListOf(Int $news) : Array;

	/**
	 * Méthode permettant de modifier un commentaire.
	 * @param $comment Le commentaire à modifier
	 * @return void
	 */
	abstract protected function modify(Comment $comment) : Void;

	/**
	 * Méthode permettant d'obtenir un commentaire spécifique.
	 * @param $id L'identifiant du commentaire
	 * @return Comment
	 */
	abstract public function get(Int $id) : Comment;

	/**
	 * Méthode permettant de supprimer un commentaire.
	 * @param $id L'identifiant du commentaire à supprimer
	 * @return void
	 */
	abstract public function delete(Int $id) : Void;

	/**
	 * Méthode permettant de supprimer tous les commentaires liés à une news
	 * @param $news L'identifiant de la news dont les commentaires doivent être supprimés
	 * @return void
	 */
	abstract public function deleteFromNews(Int $news_id) : Void;
}
