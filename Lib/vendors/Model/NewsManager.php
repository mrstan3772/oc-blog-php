<?php

namespace Model;

use SamplePHPFramework\Manager;
use \Entity\News;
use \Entity\Member;

abstract class NewsManager extends Manager
{
    /**
     * Méthode permettant d'ajouter une news.
     * @param $news News La news à ajouter
     * @return void
     */
    abstract protected function add(News $news): Void;

    /**
     * Méthode permettant d'enregistrer une news.
     * @param $news News la news à enregistrer
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(News $news): Void
    {
        if ($news->isValid()) {
            $news->isNew() ? $this->add($news) : $this->modify($news);
        } else {
            throw new \RuntimeException('La news doit être validée pour être enregistrée');
        }
    }

    /**
     * Méthode retournant une liste de news demandée
     * @param $debut int La première news à sélectionner
     * @param $limite int Le nombre de news à sélectionner
     * @param $archive bool Détermine si la news est archivé
     * @return array La liste des news. Chaque entrée est une instance de News.
     */
    abstract public function getList(Int $debut = -1, Int $limit = -1, Bool $archive = false): array;

    /**
     * Méthode retournant une news précise.
     * @param $id int L'identifiant de la news à récupérer
     * @return News La news demandée
     */
    abstract public function getUnique(Int $id): News;

    /**
     * Méthode renvoyant le nombre de news total.
     * @return int
     */
    abstract public function count(): Int;

    /**
     * Méthode permettant de modifier une news.
     * @param $news news la news à modifier
     * @return void
     */
    abstract protected function modify(News $news): Void;

    /**
     * Méthode permettant de supprimer une news.
     * @param $id int L'identifiant de la news à supprimer
     * @return void
     */
    abstract public function delete(Int $id): Void;
}
