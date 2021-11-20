<?php

namespace Model;

use \Entity\Comment;
use \Entity\News;
use \PDO;

class CommentManagerPDO extends CommentManager
{
    protected function add(Comment $comment): Void
    {
        $q = $this->dao->prepare('INSERT INTO blog."comment"(comment_news_id, comment_news_author_id, "comment_content", comment_status, "comment_date") VALUES(:comment_news_id, :comment_news_author_id, :comment_content, :comment_status, NOW())');

        $q->bindValue(':comment_news_id', $comment->commentNewsId(), PDO::PARAM_INT);
        $q->bindValue(':comment_news_author_id', $comment->commentNewsAuthorId(), PDO::PARAM_INT);
        $q->bindValue(':comment_content', $comment->commentContent(), PDO::PARAM_STR);
        $q->bindValue(':comment_status', $comment->commentStatus(), PDO::PARAM_BOOL);

        $q->execute();

        $comment->setId($this->dao->lastInsertId());
    }

    public function getList(Int $start = -1, Int $limit = -1, Bool $status = false): array
    {
        if (!$status) {
            $sql = 'SELECT id, comment_news_id, comment_news_author_id, comment_content, "comment_date", comment_status FROM blog."comment" ORDER BY comment_date DESC';
        } else {
            $sql = 'SELECT id, comment_news_id, comment_news_author_id, comment_content, "comment_date", comment_status FROM blog."comment" WHERE comment_status = true ORDER BY comment_date DESC';
        }

        if ($start != -1 || $limit != -1) {
            $sql .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->query($sql);
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Comment');

        $comment_list = $request->fetchAll();

        foreach ($comment_list as $comment) {
            $comment->setCommentDate(new \DateTime($comment->commentDate()));
        }

        $request->closeCursor();

        return $comment_list;
    }

    public function getListOf(Int $comment_news_id): array
    {
        if (!is_numeric($comment_news_id)) {
            throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
        }

        $q = $this->dao->prepare('SELECT id, comment_news_id, comment_news_author_id, comment_content, "comment_date", comment_status FROM blog."comment" WHERE comment_news_id = :comment_news_id');
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
        $q = $this->dao->prepare('UPDATE blog."comment" SET comment_news_id = :comment_news_id, comment_news_author_id = :comment_news_author_id, "comment_content" = :comment_content, comment_status = :comment_status WHERE id = :id');

        $q->bindValue(':comment_news_id', $comment->commentNewsId(), PDO::PARAM_INT);
        $q->bindValue(':comment_news_author_id', $comment->commentNewsAuthorId(), PDO::PARAM_INT);
        $q->bindValue(':comment_content', $comment->commentContent(), PDO::PARAM_STR);
        $q->bindValue(':comment_status', $comment->commentStatus(), PDO::PARAM_BOOL);
        $q->bindValue(':id', $comment->id(), PDO::PARAM_INT);

        $q->execute();
    }

    public function getUnique(Int $id): ?Comment
    {
        $q = $this->dao->prepare('SELECT id, comment_news_id, comment_news_author_id, comment_content, "comment_date", comment_status FROM blog."comment" WHERE id = :comment_id');
        $q->bindValue(':comment_id', $id, PDO::PARAM_INT);
        $q->execute();

        $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

        if ($comment = $q->fetch()) {
            $comment->setCommentDate(new \DateTime($comment->commentDate()));
        }

        return $comment;
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
