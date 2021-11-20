<?php

namespace Entity;

use SamplePHPFramework\Entity;

/**
 * Classe représentant une formulaire de contact.
 */
class Contact extends Entity
{
    /** @var string Le nom du commandaitaire. */
    protected ?String $contact_lastname = null;

    /** @var string Le prénom du commandaitaire. */
    protected ?String $contact_firstname = null;

    /** @var string L'adresse email du commandaitaire. */
    protected ?String $contact_email = null;

    /** @var string L'objet de l'email. */
    protected ?String $contact_subject = null;

    /** @var string Le message de l'email. */
    protected ?String $contact_message = null;

    /** @var int Retourne un code d'erreur si le nom du commandaitaire ne respecte pas les contraintes de validation attendues. */
    const INVALID_CONTACT_LASTNAME  = 1;

    /** @var int Retourne un code d'erreur si le prénom du commandaitaire respecte pas les contraintes de validation attendues. */
    const INVALID_CONTACT_FIRSTNAME = 2;

    /** @var int Retourne un code d'erreur si l'adresse email du commanditaire ne respecte pas les contraintes de validation attendues. */
    const INVALID_CONTACT_EMAIL = 3;

    /** @var int Retourne un code d'erreur si le sujet du messsage ne respecte pas les contraintes de validation attendues. */
    const INVALID_CONTACT_SUBJECT = 4;

    /** @var int Retourne un code d'erreur si le messsage ne respecte pas les contraintes de validation attendues. */
    const INVALID_CONTACT_MESSSAGE = 5;

    /**
     * Méthode permettant de s'assurer que l'ensemble des attributs soient valides après l'application ou non de restrictions au cas par cas.
     *
     * @return bool
     */
    public function isValid(): Bool
    {
        return !(empty($this->contact_lastname) || empty($this->contact_firstname) || empty($this->contact_email) ||
            empty($this->contact_subject) || empty($this->contact_message))
            && is_string($this->contact_lastname)  && is_string($this->contact_firstname)  && is_string($this->contact_email)
            && is_string($this->contact_subject)  && is_string($this->contact_subject);
    }

    /**
     * Obtenir la valeur de contact_lastname
     * 
     * @return string
     */
    public function contactLastName(): ?String
    {
        return $this->contact_lastname;
    }

    /**
     * Obtenir la valeur de contact_firstname
     * 
     * @return string
     */
    public function contactFirstName(): ?String
    {
        return $this->contact_firstname;
    }


    /**
     * Obtenir la valeur de contact_email
     * 
     * @return string
     */
    public function contactEmail(): ?String
    {
        return $this->contact_email;
    }


    /**
     * Obtenir la valeur de contact_subject
     * 
     * @return string
     */
    public function contactSubject(): ?String
    {
        return $this->contact_subject;
    }


    /**
     * Obtenir la valeur de contact_message
     * 
     * @return string
     */
    public function contactMessage(): ?String
    {
        return $this->contact_message;
    }

    /**
     * Définir la valeur de contact_lastname
     *
     * @param string $contact_lastname
     * @return  void
     */
    public function setContactLastName(String $contact_lastname): Void
    {
        if (!strlen($contact_lastname) >= 2 && !strlen($contact_lastname) <= 50) {
            $this->errors[] = self::INVALID_CONTACT_LASTNAME;
        }

        $this->contact_lastname = htmlspecialchars($contact_lastname);
    }

    /**
     * Définir la valeur de contact_firstname
     *
     * @param string $contact_firstname
     * @return  void
     */
    public function setContactFirstName(String $contact_firstname): Void
    {
        if (!strlen($contact_firstname) >= 2 && !strlen($contact_firstname) <= 30) {
            $this->errors[] = self::INVALID_CONTACT_FIRSTNAME;
        }

        $this->contact_firstname = htmlspecialchars($contact_firstname);
    }

    /**
     * Définir la valeur de contact_email
     *
     * @param string $contact_email
     * @return  void
     */
    public function setContactEmail(String $contact_email): Void
    {
        if (!strlen($contact_email) >= 2 && !strlen($contact_email) <= 30) {
            $this->errors[] = self::INVALID_CONTACT_EMAIL;
        }

        $this->contact_email = htmlspecialchars($contact_email);
    }

    /**
     * Définir la valeur de contact_subject
     *
     * @param string $contact_subject
     * @return  void
     */
    public function setContactSubject(String $contact_subject): Void
    {
        if (!strlen($contact_subject) >= 2 && !strlen($contact_subject) <= 255) {
            $this->errors[] = self::INVALID_CONTACT_SUBJECT;
        }

        $this->contact_subject = htmlspecialchars($contact_subject);
    }

    /**
     * Définir la valeur de contact_message
     *
     * @param string $contact_message
     * @return  void
     */
    public function setContactMessage(String $contact_message): Void
    {
        if (!strlen($contact_message) >= 5 && !strlen($contact_message) <= 50000) {
            $this->errors[] = self::INVALID_CONTACT_MESSSAGE;
        }

        $this->contact_message = htmlspecialchars($contact_message);
    }
}
