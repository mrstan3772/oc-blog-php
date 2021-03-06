<?php

namespace Model;

use \Entity\News;
use \PDO;

class NewsManagerPDO extends NewsManager
{
    protected function add(News $news): Void
    {
        if ($news->newsCover()) {
            $request = $this->dao->prepare('INSERT INTO blog."news"(news_author_id, news_lead_paragraph, news_title, news_category, news_cover, news_content, news_archive) VALUES(:news_author_id, :news_lead_paragraph, :news_title, :news_category, :news_cover, :news_content, :news_archive)');
            $request->bindValue(':news_cover', $news->newsCover(), PDO::PARAM_STR);
        } else {
            $request = $this->dao->prepare('INSERT INTO blog."news"(news_author_id, news_lead_paragraph, news_title, news_category, news_content, news_archive) VALUES(:news_author_id, :news_lead_paragraph, :news_title, :news_category, :news_content, :news_archive)');
        }

        $request->bindValue(':news_title', $news->newsTitle(), PDO::PARAM_STR);
        $request->bindValue(':news_lead_paragraph', $news->newsLeadParagraph(), PDO::PARAM_STR);
        $request->bindValue(':news_author_id', $news->newsAuthorId(), PDO::PARAM_INT);
        $request->bindValue(':news_category', $news->newsCategory(), PDO::PARAM_STR);
        $request->bindValue(':news_content', $news->newsContent(), PDO::PARAM_STR);
        $request->bindValue(':news_archive', $news->newsArchive(), PDO::PARAM_STR);

        $request->execute();
    }

    public function getList(Int $start = -1, Int $limit = -1, Bool $archive = false): array
    {
        if (!$archive) {
            $sql = 'SELECT id, news_author_id, news_lead_paragraph, news_title, news_category, news_cover, "news_content", news_archive, "news_added_date", "news_update_date" FROM blog."news" ORDER BY news_added_date DESC';
        } else {
            $sql = 'SELECT id, news_author_id, news_lead_paragraph, news_title, news_category, news_cover, "news_content", news_archive, "news_added_date", "news_update_date" FROM blog."news" WHERE news_archive = true ORDER BY news_added_date DESC';
        }

        if ($start != -1 || $limit != -1) {
            $sql .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->query($sql);
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\News');

        $news_list = $request->fetchAll();

        foreach ($news_list as $news) {
            $news->setNewsAddedDate(new \DateTime($news->newsAddedDate()));
            $news->setNewsUpdateDate(new \DateTime($news->newsUpdateDate()));
        }

        $request->closeCursor();

        return $news_list;
    }

    public function getUnique(Int $id): News
    {
        $request = $this->dao->prepare('SELECT id, news_author_id, news_lead_paragraph, news_title, news_category, news_cover, "news_content", news_archive, "news_added_date", "news_update_date" FROM blog."news" WHERE id = :id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');

        if ($news = $request->fetch()) {
            $news->setNewsAddedDate(new \DateTime($news->newsAddedDate()));
            $news->setNewsUpdateDate(new \DateTime($news->newsUpdateDate()));

            return $news;
        }


        return null;
    }

    public function count(): Int
    {
        return $this->dao->query('SELECT COUNT(*) FROM blog."news"')->fetchColumn();
    }

    protected function modify(News $news): Void
    {
        if ($news->newsCover()) {
            $request = $this->dao->prepare(
                'UPDATE blog."news" SET news_author_id = :news_author_id, news_title = :news_title, 
                news_lead_paragraph = :news_lead_paragraph, news_category = :news_category, news_cover = :news_cover, 
                news_content = :news_content, news_update_date = NOW(), news_archive = :news_archive  WHERE id = :id'
            );
            $request->bindValue(':news_cover', $news->newsCover(), PDO::PARAM_STR);
        } else {
            $request = $this->dao->prepare(
                'UPDATE blog."news" SET news_author_id = :news_author_id, news_title = :news_title,
                news_lead_paragraph = :news_lead_paragraph, news_category = :news_category, 
                news_content = :news_content, news_update_date = NOW(), news_archive = :news_archive  WHERE id = :id'
            );
        }

        $request->bindValue(':news_title', $news->newsTitle(), PDO::PARAM_STR);
        $request->bindValue(':news_lead_paragraph', $news->newsLeadParagraph(), PDO::PARAM_STR);
        $request->bindValue(':news_author_id', $news->newsAuthorId(), PDO::PARAM_INT);
        $request->bindValue(':news_category', $news->newsCategory(), PDO::PARAM_STR);
        $request->bindValue(':news_content', $news->newsContent(), PDO::PARAM_STR);
        $request->bindValue(':news_archive', $news->newsArchive(), PDO::PARAM_BOOL);
        $request->bindValue(':id', $news->id(), PDO::PARAM_INT);

        $request->execute();
    }

    public function delete($id): Void
    {
        $this->dao->exec('DELETE FROM blog."news" WHERE id = ' . (int) $id);
    }
}
