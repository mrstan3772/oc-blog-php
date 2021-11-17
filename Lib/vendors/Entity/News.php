<?php

namespace Entity;

use SamplePHPFramework\Entity;

class News extends Entity
{
    protected ?Int $news_author_id = null;
    protected ?String $news_title = null;
    protected ?String $news_lead_paragraph = null;
    protected ?String $news_category = null;
    protected Mixed $news_cover = null;
    protected ?String $news_content = null;
    protected ?Bool $news_archive = null;
    protected Mixed $news_added_date = null;
    protected Mixed $news_update_date = null;

    const INVALID_LEAD_PARAGRAPH = 1;
    const INVALID_TITLE = 2;
    const INVALID_CATEGORY = 3;
    const INVALID_COVER = 4;
    const INVALID_CONTENT = 5;
    const INVALID_ARCHIVE = 6;

    public function isValid()
    {
        return !(empty($this->news_author_id) || empty($this->news_lead_paragraph)
            || empty($this->news_title) || empty($this->news_category)
            || empty($this->news_content));
    }

    public function newsAuthorId()
    {
        return $this->news_author_id;
    }

    public function setNewsAuthorId(String $news_author_id): Self
    {
        $this->news_author_id = (int) $news_author_id;

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

        $this->news_lead_paragraph = $news_lead_paragraph;

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

        $this->news_title = $news_title;

        return $this;
    }

    public function newsCategory()
    {
        return $this->news_category;
    }

    public function setNewsCategory(String $news_category): Self
    {
        if (!is_string($news_category) || empty($news_category) || strlen($news_category) >= 3 && strlen($news_category) <= 50) {
            $this->errors[] = self::INVALID_CATEGORY;
        }

        $this->news_category = $news_category;

        return $this;
    }

    public function newsCover()
    {
        return $this->news_cover;
    }

    public function setNewsCover(Mixed $news_cover): Self
    {
        if (is_string($news_cover)) {
            if (empty($news_cover) || strlen($news_cover) >= 5 && strlen($news_cover) <= 255) {
                $this->errors[] = self::INVALID_COVER;
            }
        }

        $this->news_cover = $news_cover;

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

        $this->news_content = $news_content;

        return $this;
    }

    public function newsArchive()
    {
        return $this->news_archive;
    }

    public function setNewsArchive(Bool $news_archive): Self
    {
        if (!is_bool($news_archive)) {
            $this->errors[] = self::INVALID_ARCHIVE;
        }

        $this->news_archive = $news_archive;

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
