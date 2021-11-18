<?php

namespace Entity;

use \SamplePHPFramework\Entity;

class Comment extends Entity
{
    protected ?Int $comment_news_id = null;
    protected ?Int $comment_news_author_id = null;
    protected ?String $comment_content = null;
    protected Mixed $comment_date = null;
    protected Bool $comment_status = false;

    const INVALID_NEWS = 1;
    const INVALID_AUTHOR = 2;
    const INVALID_CONTENT = 3;
    const INVALID_DATE = 4;
    const INVALID_STATUS = 5;

    public function isValid()
    {
        return !(empty($this->comment_news_author_id) || empty($this->comment_content) || empty($this->comment_news_id));
    }

    public function setCommentNewsId(Int $comment_news_id): Void
    {
        if (!is_int($comment_news_id) || empty($comment_news_id)) {
            $this->erreurs[] = self::INVALID_NEWS;
        }

        $this->comment_news_id = $comment_news_id;
    }

    public function setCommentNewsAuthorId(Int $comment_news_author_id): Void
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

        $this->comment_content = $comment_content;
    }

    public function setCommentDate(\DateTime $comment_date): Void
    {
        if (!$comment_date instanceof \DateTime) {
            $this->erreurs[] = self::INVALID_DATE;
        }

        $this->comment_date = $comment_date;
    }

    public function setCommentStatus(Bool $comment_status): Void
    {
        if (!is_bool($comment_status)) {
            $this->erreurs[] = self::INVALID_STATUS;
        }

        $this->comment_status = $comment_status;
    }

    public function commentNewsId(): Int
    {
        return $this->comment_news_id;
    }

    public function commentNewsAuthorId(): ?Int
    {
        return $this->comment_news_author_id;
    }

    public function commentContent(): ?String
    {
        return $this->comment_content;
    }

    public function commentDate(): Mixed
    {
        return $this->comment_date;
    }

    public function commentStatus(): ?Bool
    {
        return $this->comment_status;
    }
}
