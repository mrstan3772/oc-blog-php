<?php

namespace Entity;

use SamplePHPFramework\Entity;

/**
 * Classe représentant une adresse email destiné à une newsletter.
 */
class NewsletterEmail extends Entity
{
    /** @var string Une adresse email pour tenir informer les utilisateurs ayant souscrit à la newsletter. */
    protected ?String $ne_adress = null;

    /** @var mixed La date précise à compté de l'instant ou l'adresse email sera ajoutée à l'index. */
    protected $ne_registration_date;

    /** @var int Retourne un code d'erreur si l'adresse email ne respecte pas les contraintes de validation attendues. */
    const INVALID_NE_EMAIL = 1;

    /**
     * Méthode permettant de s'assurer que l'ensemble des attributs soient valides après l'application ou non de restrictions au cas par cas.
     *
     * @return bool
     */
    public function isValid(): Bool
    {
        return !empty($this->ne_adress) && is_string($this->ne_adress);
    }

    /**
     * Obtenir la valeur de ne_adress
     * 
     * @return string
     */
    public function neAdress(): ?String
    {
        return $this->ne_adress;
    }

    /**
     * Obtenir la valeur de ne_registration_date
     * 
     * @return mixed
     */
    public function neRgistrationDate()
    {
        return $this->ne_registration_date;
    }

    /**
     * Définir la valeur de ne_adress
     *
     * @param string $ne_adress
     * @return  void
     */
    public function setNeAdress(String $ne_adress): Void
    {
        if (!strlen($ne_adress) >= 6 && !strlen($ne_adress) <= 100) {
            $this->errors[] = self::INVALID_NE_EMAIL;
        }

        $this->ne_adress = $ne_adress;
    }

    /**
     * Définir la valeur de ne_registration_date
     *
     * @param mixed $ne_registration_date
     * @return  void
     */
    public function setNeRegistrationDate($ne_registration_date): Void
    {
        $this->ne_registration_date = $ne_registration_date;
    }
}
