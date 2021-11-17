<?php

namespace Model;

use \Entity\Comment;
use \Entity\News;
use \PDO;

class CommentManagerPDO extends CommentManager
{
    protected function add(Comment $comment): Void
    {
        $q = $this->dao->prepare('INSERT INTO blog."comment"(comment_news_id, comment_news_author_id, "comment_content", "commment_date") VALUES(:comment_news_id, :comment_news_author_id, :comment_content, NOW())');

        $q->bindValue(':comment_news_id', $comment->commentNewsId(), PDO::PARAM_INT);
        $q->bindValue(':comment_news_author_id', $comment->commentNewsAuthorId(), PDO::PARAM_INT);
        $q->bindValue(':comment_content', $comment->commentContent(), PDO::PARAM_STR);

        $q->execute();

        $comment->setId($this->dao->lastInsertId());
    }

    public function getListOf(Int $comment_news_id): array
    {
        if (!is_numeric($comment_news_id)) {
            throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
        }

        $q = $this->dao->prepare('SELECT id, comment_news_id, comment_news_author_id, comment_content, "comment_date" FROM blog."comment" WHERE comment_news_id = :comment_news_id');
        $q->bindValue(':comment_news_id', $comment_news_id, PDO::PARAM_INT);
        $q->execute();

        $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

        $comments = $q->fetchAll();

        foreach ($comments as $comment) {
            $comment->setCommentDate(new \DateTime($comment->commentDate()));
        }

        return $comments;
    }

    protected function modify(Comment $comment): Void
    {
        $q = $this->dao->prepare('UPDATE blog."comment" SET comment_news_author_id = :comment_news_author_id, "comment_content" = :comment_content WHERE id = :id');

        $q->bindValue(':comment_news_author_id', $comment->commentNewsAuthorId(), PDO::PARAM_INT);
        $q->bindValue(':comment_content', $comment->commentContent(), PDO::PARAM_STR);
        $q->bindValue(':id', $comment->id(), PDO::PARAM_INT);

        $q->execute();
    }

    public function get(Int $id): Comment
    {
        $q = $this->dao->prepare('SELECT id, comment_news_id, comment_news_author_id, "comment_content" FROM blog."comment" WHERE id = :id');
        $q->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $q->execute();

        $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

        return $q->fetch();
    }

    public function delete(Int $id): Void
    {
        $this->dao->exec('DELETE FROM blog."comment" WHERE id = ' . (int) $id);
    }

    public function deleteFromNews(Int $news_id): Void
    {
        $this->dao->exec('DELETE FROM blog."comment" WHERE comment_news_id = ' . (int) $news_id);
    }
}