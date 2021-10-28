<?php

namespace Entity;

use SamplePHPFramework\Entity;

class News extends Entity
{
    protected $news_author;
    protected $news_title;
    protected $news_lead_paragraph;
    protected $news_content;
    protected $news_added_date;
    protected $news_update_date;

    const INVALID_AUTHOR = 1;
    const INVALID_LEAD_PARAGRAPH = 2;
    const INVALID_TITLE = 3;
    const INVALID_CONTENT = 4;

    public function isValid()
    {
        return !(empty($this->news_author) || empty($this->news_lead_paragraph) || empty($this->news_title) || empty($this->news_content));
    }

    public function newsAuthor()
    {
        return $this->news_author;
    }

    public function setNewsAuthor(String $news_author): Self
    {
        if (!is_string($news_author) || empty($news_author || strlen($news_author) >= 2 && strlen($news_author) <= 30)) {
            $this->errors[] = self::INVALID_AUTHOR;
        }

        $this->news_author = htmlspecialchars($news_author);

        return $this;
    }

    public function newsLeadParagraph()
    {
        return $this->news_lead_paragraph;
    }

    public function setNewsLeadParagraph(String $news_lead_paragraph): Self
    {
        if (!is_string($news_lead_paragraph) || empty($news_lead_paragraph) || strlen($news_lead_paragraph) >= 30 && strlen($news_lead_paragraph) <= 1000) {
            $this->errors[] = self::INVALID_TITLE;
        }

        $this->news_lead_paragraph = htmlspecialchars($news_lead_paragraph);

        return $this;
    }

    public function newsTitle()
    {
        return $this->news_title;
    }

    public function setNewsTitle(String $news_title): Self
    {
        if (!is_string($news_title) || empty($news_title) || strlen($news_title) >= 3 && strlen($news_title) <= 100) {
            $this->errors[] = self::INVALID_TITLE;
        }

        $this->news_title = htmlspecialchars($news_title);

        return $this;
    }

    public function newsContent()
    {
        return $this->news_content;
    }

    public function setNewsContent(String $news_content): Self
    {
        if (!is_string($news_content) || empty($news_content) || strlen($news_content) >= 5 && strlen($news_content) <= 50000) {
            $this->errors[] = self::INVALID_CONTENT;
        }

        $this->news_content = htmlspecialchars($news_content);

        return $this;
    }

    public function newsAddedDate()
    {
        return $this->news_added_date;
    }

    public function setNewsAddedDate(\DateTime $news_added_date)
    {
        $this->news_added_date = $news_added_date;

        return $this;
    }

    public function newsUpdateDate()
    {
        return $this->news_update_date;
    }

    public function setNewsUpdateDate(\DateTime $news_update_date)
    {
        $this->news_update_date = $news_update_date;

        return $this;
    }
}
