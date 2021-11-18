<?php

namespace Model;

use \Entity\NewsletterEmail;
use \SamplePHPFramework\Manager;

/**
 * NewsletterEmailManager
 */
abstract class NewsletterEmailManager extends Manager
{
    /**
     * Méthode permettant d'ajouter un mail.
     * 
     * @param $newsletter_email NewsletterEmail Mail à ajouter.
     * @return void
     */
    abstract protected function add(NewsletterEmail $newsletter_email): Void;

    /**
     * Méthode renvoyant le nombre d'emails total.
     * 
     * @return int
     */
    abstract public function count() : Int;

    /**
     * Méthode permettant de supprimer un mail.
     * 
     * @param $id int L'identifiant du mail à supprimer.
     * @return void
     */
    abstract public function delete(Int $id) : Void;

    /**
     * Méthode retournant une liste d'emails demandée.
     * 
     * @param $start int Le premier mail à sélectionner.
     * @param $limite int Le nombre de mails à sélectionner.
     * @return array La liste des mails. Chaque entrée est une instance de NewsletterEmail.
     */
    abstract public function getList(Int $start = -1, Int $limit = -1) : Array;

    /**
     * Méthode retournant un mail précis.
     * 
     * @param $id int L'identifiant du mail à récupérer.
     * @return NewsletterEmail Mail demandé.
     */
    abstract public function getUnique(Int $id) : NewsletterEmail;

    /**
     * Méthode permettant de modifier un mail.
     * 
     * @param $newsletter_email NewsletterEmail Mail à modifier.
     * @return void
     */
    abstract protected function modify(NewsletterEmail $newsletter_email): Void;

    /**
     * Méthode permettant d'enregistrer un mail.
     * 
     * @param $newsletter_email NewsletterEmail Mail à enregistrer.
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(NewsletterEmail $newsletter_email) : Void
    {
        if ($newsletter_email->isValid()) {
            $newsletter_email->isNew() ? $this->add($newsletter_email) : $this->modify($newsletter_email);
        } else {
            throw new \RuntimeException('Le mail doit être valide pour être enregistré.');
        }
    }
}