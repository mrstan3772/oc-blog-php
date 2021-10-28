<?php

namespace Entity;

use \SamplePHPFramework\Entity;

class Comment extends Entity
{
    protected $comment_news_id,
        $comment_news_author_id,
        $commment_content,
        $comment_date;

    const INVALID_AUTHOR = 1;
    const INVALID_CONTENT = 2;

    public function isValid()
    {
        return !(empty($this->comment_news_author_id) || empty($this->commment_content));
    }

    public function setCommentNewsId(Int $comment_news_id): Void
    {
        $this->comment_news_id = (int) $comment_news_id;
    }

    public function setCommentNewsAuthor(Int $comment_news_author_id): Void
    {
        if (!is_string($comment_news_author_id) || empty($comment_news_author_id)) {
            $this->erreurs[] = self::INVALID_AUTHOR;
        }

        $this->comment_news_author_id = $comment_news_author_id;
    }

    public function setCommentContent(String $comment_content): Void
    {
        if (!is_string($comment_content) || empty($comment_content)) {
            $this->erreurs[] = self::INVALID_CONTENT;
        }

        $this->commment_content = $comment_content;
    }

    public function setCommentDate(\DateTime $comment_date): Void
    {
        $this->comment_date = $comment_date;
    }

    public function commentNewsId(): Int
    {
        return $this->comment_news_id;
    }

    public function commentNewsAuthor(): Int
    {
        return $this->comment_news_author_id;
    }

    public function commentContent(): String
    {
        return $this->commment_content;
    }

    public function commentDate(): Mixed
    {
        return $this->comment_date;
    }
}
