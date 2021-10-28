<?php

namespace Model;

use \Entity\Comment;
use Entity\News;

class CommentsManagerPDO extends CommentsManager
{
    protected function add(Comment $comment) : Void
    {
        $q = $this->dao->prepare('INSERT INTO blog."comments"(comment_news_id, comment_news_author_id, "commment_content", "commment_date") VALUES(:comment_news_id, :comment_news_author_id, :commment_content, NOW())');

        $q->bindValue(':comment_news_id', $comment->commentNewsId(), \PDO::PARAM_INT);
        $q->bindValue(':comment_news_author_id', $comment->commentNewsAuthor());
        $q->bindValue(':commment_content', $comment->commentContent());

        $q->execute();

        $comment->setId($this->dao->lastInsertId());
    }

    public function getListOf(Int $comment_news_id) : Array
    {
        if (!is_numeric($comment_news_id)) {
            throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
        }

        $q = $this->dao->prepare('SELECT id, comment_news_id, comment_news_author_id, commment_content, "commment_date" FROM blog."comments" WHERE comment_news_id = :comment_news_id');
        $q->bindValue(':comment_news_id', $comment_news_id, \PDO::PARAM_INT);
        $q->execute();

        $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

        $comments = $q->fetchAll();

        foreach ($comments as $comment) {
            $comment->setDate(new \DateTime($comment->date()));
        }

        return $comments;
    }

    protected function modify(Comment $comment) : Void
    {
        $q = $this->dao->prepare('UPDATE blog."comments" SET comment_news_author_id = :comment_news_author_id, "commment_content" = :commment_content WHERE id = :id');

        $q->bindValue(':comment_news_author_id', $comment->commentNewsAuthor());
        $q->bindValue(':commment_content', $comment->commentContent());
        $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);

        $q->execute();
    }

    public function get(Int $id) : Comment
    {
        $q = $this->dao->prepare('SELECT id, comment_news_id, comment_news_author_id, "commment_content" FROM blog."comments" WHERE id = :id');
        $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $q->execute();

        $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

        return $q->fetch();
    }

    public function delete(Int $id) : Void
    {
        $this->dao->exec('DELETE FROM blog."comments" WHERE id = ' . (int) $id);
    }

    public function deleteFromNews(Int $news_id) : Void
    {
        $this->dao->exec('DELETE FROM blog."comments" WHERE comment_news_id = ' . (int) $news_id);
    }
}
