<?php

namespace Model;

use \Entity\Member;
use \SamplePHPFramework\Manager;


/**
 * MemberManager
 */
abstract class MemberManager extends Manager
{
    /**
     * Méthode permettant d'ajouter un membre.
     * 
     * @param $member Member Membre à ajouter.
     * @return void
     */
    abstract protected function add(Member $member): Void;

    /**
     * Méthode renvoyant le nombre de membres total.
     * 
     * @return int
     */
    abstract public function count() : Int;

    /**
     * Méthode permettant de supprimer un membre.
     * 
     * @param $id int L'identifiant du membre à supprimer.
     * @return void
     */
    abstract public function delete(Int $id) : Void;

    /**
     * Méthode retournant une liste de membres demandée.
     * 
     * @param $start int Le premier membre à sélectionner.
     * @param $limite int Le nombre de membres à sélectionner.
     * @return array La liste des membres. Chaque entrée est une instance de s.
     */
    abstract public function getList(Int $start = -1, Int $limit = -1) : Array;

    /**
     * Méthode retournant un membre précis.
     * 
     * @param $info mixed L'identifiant du membre à récupérer ou alors son pseudonyme.
     * @return Member Membre demandé.
     */
    abstract public function getUnique($info) : Member;

    /**
     * Méthode permettant de modifier un membre.
     * 
     * @param $member Member Membre à modifier.
     * @return void
     */
    abstract protected function modify(Member $member): Void;

    /**
     * Méthode permettant d'enregistrer un membre.
     * 
     * @param $member Member Membre à enregistrer.
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(Member $member) : Void
    {
        if ($member->isValid()) {
            $member->isNew() ? $this->add($member) : $this->modify($member);
        } else {
            throw new \RuntimeException('Le membre doit être valide pour être enregistré.');
        }
    }
}