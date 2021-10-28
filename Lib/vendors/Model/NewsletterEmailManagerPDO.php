<?php

namespace Model;

use \DateTime;
use \Entity\NewsletterEmail;
use \PDO;

/**
 * NewsletterEmailManagerPDO
 */
class NewsletterEmailManagerPDO extends NewsletterEmailManager
{
    protected function add(NewsletterEmail $newsletter_email): Void
    {
        $request = $this->dao->prepare('INSERT INTO blog."newsletter_email"(ne_adress, ne_registration_date) 
        VALUES(:ne_adress, NOW())');

        $request->bindValue(':ne_adress', $newsletter_email->neAdress(), PDO::PARAM_STR);
        // $request->bindValue(':ne_registration_date', $newsletter_email->neRgistrationDate(), PDO::PARAM_STR);

        $request->execute();

        $newsletter_email->setId($this->dao->lastInsertId());
    }

    public function getList(Int $start = -1, Int $limit = -1): Array
    {
        $sql = 'SELECT id, ne_adress, ne_registration_date FROM blog."newsletter_email" ORDER BY ne_registration_date ASC';

        if ($start != -1 || $limit != -1) {
            $sql .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->query($sql);

        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entity\NewsletterEmail');
        $newsletter_email_list = $request->fetchAll();

        foreach ($newsletter_email_list as $newsletter_email) {
            $newsletter_email->setNeReigstrationDate(new DateTime($newsletter_email->neRegistrationDate()));
        }

        return $newsletter_email_list;
    }

    public function getUnique(Int $id): NewsletterEmail
    {
        $request = $this->dao->prepare('SELECT id, ne_adress, ne_registration_date FROM blog."newsletter_email" WHERE id = :id');
        $request->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\NewsletterEmail');

        if ($newsletter_email = $request->fetch()) {
            $newsletter_email->setNeReigstrationDate(new DateTime($newsletter_email->neRegistrationDate()));

            return $newsletter_email;
        }

        return null;
    }

    public function count(): Int
    {
        return $this->dao->query('SELECT COUNT(*) FROM blog."newsletter_email"')->fetchColumn();
    }

    protected function modify(NewsletterEmail $newsletter_email): Void
    {
        $request = $this->dao->prepare(
            'UPDATE blog."newsletter_email" 
            SET ne_adress = :ne_adress
            WHERE id = :id'
        );

        $request->bindValue(':ne_adress', $newsletter_email->neAdress(), PDO::PARAM_STR);
        $request->bindValue(':id', $newsletter_email->id(), PDO::PARAM_INT);

        $request->execute();
    }

    public function delete(Int $id) : Void
    {
        $this->dao->exec('DELETE FROM blog."newsletter_email" WHERE id = ' . (int) $id);
    }
}
