<?php

namespace Entity;

use DateTime;
use SamplePHPFramework\Entity;

/**
 * Classe qui va être exploité afin constituer un membre de l'orchestre.
 */
class Member extends Entity
{
    /** @var string La bio du membre. */
    protected ?String $member_bio_fr_fr = null;

    /** @var string Le nom de la ville où habite le membre. */
    protected ?String $member_city_name_fr_fr = null;

    /** @var string Le nom du pays dont le membre est ressortissant. */
    protected ?String $member_country_name_fr_fr = null;

    /** @var mixed La date de naissance du membre. */
    protected Mixed $member_date_of_birth = null;

    /** @var string L'addresse email du membre. */
    protected ?String $member_email_address = null;

    /** @var string L'URL de la page de profile Facebook du membre. */
    protected ?String $member_facebook_page_url = null;

    /** @var string Le prénom du membre. */
    protected ?String $member_firstname = null;

    /** @var string Le genre du membre. */
    protected String $member_gender = 'M';

    /** @var string L'addresse email du membre. */
    protected ?String $member_home_address = null;

    /** @var string L'URL de la page de profile Instagram du membre. */
    protected ?String $member_instagram_page_url = null;

    /** @var string Le nom de famille du membre. */
    protected ?String $member_lastname = null;

    /** @var int Le numéro de téléphone du membre. */
    protected ?Int $member_phone_number = null;

    /** @var string La photo de profile du membre. */
    protected Mixed $member_profile_picture_path = null;

    /** @var string Le pseudonyme du membre. */
    protected ?String $member_pseudonym = null;

    /** @var string L'URL associé à la chaine Youtube du membre. */
    protected ?String $member_youtube_page_url = null;

    /** @var int Le code postal du membre. */
    protected ?Int $member_zip_code = null;

    /** @var int Le mot de passe du membre. */
    protected ?String $member_password = null;

    /** @var bool Le type de compte du membre c.a.d utilisateur standard ou administrateur. */
    protected Bool $member_admin = false;

    /** @var mixed La date d'enregistrement du membre. */
    protected Mixed $member_registration_date = null;

    /** @var int Retourne un code d'erreur si la bio du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_BIO = 1;

    /** @var int Retourne un code d'erreur si le nom de la ville du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_CITY_NAME = 2;

    /** @var int Retourne un code d'erreur si le nom du pays du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_COUNTRY_NAME = 3;

    /** @var int Retourne un code d'erreur si la date de naissance du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_DATE_OF_BIRTH = 4;

    /** @var int Retourne un code d'erreur si l'email du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_EMAIL = 5;

    /** @var int Retourne un code d'erreur si la page Facebook du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_FACEBOOK_PAGE = 6;

    /** @var int Retourne un code d'erreur si le nom du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_FIRSTNAME = 7;

    /** @var int Retourne un code d'erreur si le genre du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_GENDER = 8;

    /** @var int Retourne un code d'erreur si l'addresse du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_HOME_address = 9;

    /** @var int Retourne un code d'erreur si la page Instagram du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_INSTAGRAM_PAGE = 10;

    /** @var int Retourne un code d'erreur si le nom de famille du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_LASTNAME = 11;

    /** @var int Retourne un code d'erreur si le numéro de téléphone du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_PHONE_NUMBER = 12;

    /** @var int Retourne un code d'erreur si le lien source de l'image de profile du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_PROFILE_PICTURE_PATH = 13;

    /** @var int Retourne un code d'erreur si le pseudonyme du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_PSEUDONYM = 14;

    /** @var int Retourne un code d'erreur si la page Youtube du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_YOUTUBE_PAGE = 15;

    /** @var int Retourne un code d'erreur si l'addresse postale du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_ZIP_CODE = 16;

    /** @var int Retourne un code d'erreur si le mot de passe du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_PASSWORD = 17;

    /** @var int Retourne un code d'erreur si le type de compte du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_ADMIN = 18;

    /** @var int Retourne un code d'erreur si la date d'enregistrement du membre ne respecte pas les contraintes de validation attendues. */
    const INVALID_MEMBER_REGISTRATION_DATE = 19;


    /**
     * Méthode permettant de s'assurer que l'ensemble des attributs soient valides après l'application ou non de restrictions au cas par cas.
     *
     * @return bool
     */
    public function isValid(): Bool
    {
        return !($this->member_email_address === null || $this->member_firstname === null || $this->member_gender === null
            || $this->member_lastname === null || $this->member_pseudonym === null
            || $this->member_password === null)
            && (is_string($this->member_bio_fr_fr) || $this->member_bio_fr_fr === null)
            && (is_string($this->member_city_name_fr_fr) || $this->member_city_name_fr_fr === null)
            && (is_string($this->member_country_name_fr_fr) ||  $this->member_country_name_fr_fr === null)
            && (is_string($this->member_date_of_birth) || $this->member_date_of_birth instanceof DateTime || $this->member_date_of_birth === null)
            && is_string($this->member_email_address)
            && (is_string($this->member_facebook_page_url) || $this->member_facebook_page_url === null)
            && is_string($this->member_firstname)
            && is_string($this->member_gender)
            && (is_string($this->member_home_address) || $this->member_home_address === null)
            && (is_string($this->member_instagram_page_url) || $this->member_instagram_page_url === null)
            && is_string($this->member_lastname)
            && (is_int($this->member_phone_number) || $this->member_phone_number === null)
            && (is_string($this->member_profile_picture_path) || $this->member_profile_picture_path === null)
            && is_string($this->member_pseudonym)
            && (is_string($this->member_youtube_page_url) || $this->member_youtube_page_url === null)
            && (is_int($this->member_zip_code) || $this->member_zip_code === null)
            && is_string($this->member_password)
            && is_bool($this->member_admin)
            && (is_string($this->member_registration_date) || $this->member_registration_date instanceof DateTime || $this->member_registration_date === null);
    }

    /**
     * Obtenir la valeur de member_bio_fr_fr
     * 
     * @return string
     */
    public function memberBioFrFr(): ?String
    {
        return $this->member_bio_fr_fr;
    }

    /**
     * Obtenir la valeur de member_city_name_fr_fr
     * 
     * @return string
     */
    public function memberCityNameFrFr(): ?String
    {
        return $this->member_city_name_fr_fr;
    }

    /**
     * Obtenir la valeur de member_country_name_fr_fr
     * 
     * @return string
     */
    public function memberCountryNameFrFr(): ?String
    {
        return $this->member_country_name_fr_fr;
    }

    /**
     * Obtenir la valeur de member_date_of_birth
     * 
     * @return mixed
     */
    public function memberDateOfBirth(): Mixed
    {
        return $this->member_date_of_birth;
    }

    /**
     * Obtenir la valeur de member_email_address
     * 
     * @return string
     */
    public function memberEmailAddress(): ?String
    {
        return $this->member_email_address;
    }

    /**
     * Obtenir la valeur de member_facebook_page_url
     * 
     * @return string
     */
    public function memberFacebookPageUrl(): ?String
    {
        return $this->member_facebook_page_url;
    }

    /**
     * Obtenir la valeur de member_firstname
     * 
     * @return string
     */
    public function memberFirstName(): ?String
    {
        return $this->member_firstname;
    }

    /**
     * Obtenir la valeur de member_gender
     * 
     * @return string
     */
    public function memberGender(): ?String
    {
        return $this->member_gender;
    }

    /**
     * Obtenir la valeur de member_home_address
     * 
     * @return string
     */
    public function memberHomeAddress(): ?String
    {
        return $this->member_home_address;
    }

    /**
     * Obtenir la valeur de member_instagram_page_url
     * 
     * @return string
     */
    public function memberInstagramPageUrl(): ?String
    {
        return $this->member_instagram_page_url;
    }

    /**
     * Obtenir la valeur de member_lastname
     * 
     * @return string
     */
    public function memberLastName(): ?String
    {
        return $this->member_lastname;
    }

    /**
     * Obtenir la valeur de member_phone_number
     * 
     * @return int
     */
    public function memberPhoneNumber(): ?Int
    {
        return $this->member_phone_number;
    }

    /**
     * Obtenir la valeur de member_profile_picture_path
     * 
     * @return string
     */
    public function memberProfilePicturePath(): Mixed
    {
        return $this->member_profile_picture_path;
    }

    /**
     * Obtenir la valeur de member_pseudonym
     * 
     * @return string
     */
    public function memberPseudonym(): ?String
    {
        return $this->member_pseudonym;
    }

    /**
     * Obtenir la valeur de member_youtube_page_url
     * 
     * @return string
     */
    public function memberYoutubePageUrl(): ?String
    {
        return $this->member_youtube_page_url;
    }

    /**
     * Obtenir la valeur de member_zip_code
     * 
     * @return int
     */
    public function memberZipCode(): ?Int
    {
        return $this->member_zip_code;
    }

    /**
     * Obtenir la valeur de member_password
     * 
     * @return string
     */
    public function memberPassword(): ?String
    {

        return $this->member_password;
    }

    /**
     * Obtenir la valeur de member_admin
     * 
     * @return bool
     */
    public function memberAdmin(): Bool
    {
        return $this->member_admin;
    }

    /**
     * Obtenir la valeur de member_registration_date
     * 
     * @return mixed
     */
    public function memberRegistrationDate(): Mixed
    {
        return $this->member_registration_date;
    }

    /**
     * Définir la valeur de member_bio_fr_fr
     *
     * @param string $member_bio_fr_fr
     * @return  void
     */
    public function setMemberBioFrFr(String $member_bio_fr_fr): Void
    {
        if (!strlen($member_bio_fr_fr) >= 100 && !strlen($member_bio_fr_fr) <= 9000) {
            $this->errors[] = self::INVALID_MEMBER_BIO;
        }

        $this->member_bio_fr_fr = $member_bio_fr_fr;
    }

    /**
     * Définir la valeur de member_city_name_fr_fr
     *
     * @param string $member_city_name_fr_fr
     * @return  void
     */
    public function setMemberCityNameFrFr(String $member_city_name_fr_fr): Void
    {
        if (!strlen($member_city_name_fr_fr) >= 2 && !strlen($member_city_name_fr_fr) <= 50) {
            $this->errors[] = self::INVALID_MEMBER_CITY_NAME;
        }

        $this->member_city_name_fr_fr = $member_city_name_fr_fr;
    }

    /**
     * Définir la valeur de member_country_name_fr_fr
     *
     * @param string $member_country_name_fr_fr
     * @return  void
     */
    public function setMemberCountryNameFrFr(String $member_country_name_fr_fr): Void
    {
        if (!strlen($member_country_name_fr_fr) >= 3 && !strlen($member_country_name_fr_fr) <= 50) {
            $this->errors[] = self::INVALID_MEMBER_COUNTRY_NAME;
        }

        $this->member_country_name_fr_fr = $member_country_name_fr_fr;
    }

    /**
     * Définir la valeur de member_date_of_birth
     *
     * @param mixed $member_date_of_birth
     * @return  void
     */
    public function setMemberDateOfBirth(Mixed $member_date_of_birth): Void
    {
        $this->member_date_of_birth = $member_date_of_birth;
    }

    /**
     * Définir la valeur de member_email_address
     *
     * @param string $member_email_address
     * @return  void
     */
    public function setMemberEmailAddress(String $member_email_address): Void
    {
        if (!strlen($member_email_address) >= 6 && !strlen($member_email_address) <= 100) {
            $this->errors[] = self::INVALID_MEMBER_EMAIL;
        }

        $this->member_email_address = $member_email_address;
    }

    /**
     * Définir la valeur de member_facebook_page_url
     *
     * @param string $member_facebook_page_url
     * @return  void
     */
    public function setMemberFacebookPageUrl(String $member_facebook_page_url): Void
    {
        if (!strlen($member_facebook_page_url) >= 25 && !strlen($member_facebook_page_url) <= 255) {
            $this->errors[] = self::INVALID_MEMBER_FACEBOOK_PAGE;
        }

        $this->member_facebook_page_url = $member_facebook_page_url;
    }

    /**
     * Définir la valeur de member_firstname
     *
     * @param string $member_firstname
     * @return  void
     */
    public function setMemberFirstname(String $member_firstname): Void
    {
        if (!strlen($member_firstname) >= 2 && !strlen($member_firstname) <= 30) {
            $this->errors[] = self::INVALID_MEMBER_FIRSTNAME;
        }

        $this->member_firstname = $member_firstname;
    }

    /**
     * Définir la valeur de member_gender
     *
     * @param string $member_gender
     * @return  void
     */
    public function setMemberGender(String $member_gender): Void
    {
        strlen($member_gender) > 30 || strlen($member_gender) < 1  ? $this->errors[] = self::INVALID_MEMBER_GENDER : $this->member_gender = $member_gender;
    }

    /**
     * Définir la valeur de member_home_address
     *
     * @param string $member_home_address
     * @return  void
     */
    public function setMemberHomeAddress(String $member_home_address): Void
    {
        if (!strlen($member_home_address) >= 5 && !strlen($member_home_address) <= 100) {
            $this->errors[] = self::INVALID_MEMBER_HOME_address;
        }

        $this->member_home_address = $member_home_address;
    }

    /**
     * Définir la valeur de member_instagram_page_url
     *
     * 
     * @param string $member_instagram_page_url
     * @return  void
     */
    public function setMemberInstagramPageUrl(String $member_instagram_page_url): Void
    {
        if (!strlen($member_instagram_page_url) >= 25 && !strlen($member_instagram_page_url) <= 255) {
            $this->errors[] = self::INVALID_MEMBER_INSTAGRAM_PAGE;
        }

        $this->member_instagram_page_url = $member_instagram_page_url;
    }

    /**
     * Définir la valeur de member_lastname
     *
     * @param string $member_lastname
     * @return  void
     */
    public function setMemberLastname(String $member_lastname): Void
    {
        if (!strlen($member_lastname) >= 2 && !strlen($member_lastname) <= 50) {
            $this->errors[] = self::INVALID_MEMBER_LASTNAME;
        }

        $this->member_lastname = $member_lastname;
    }

    /**
     * Définir la valeur de member_phone_number
     *
     * @param int $member_phone_number
     * @return  void
     */
    public function setMemberPhoneNumber(Int $member_phone_number): Void
    {
        strlen($member_phone_number) !== 10  ? $this->errors[] = self::INVALID_MEMBER_PHONE_NUMBER : $this->member_phone_number = $member_phone_number;
    }

    /**
     * Définir la valeur de member_profile_picture_path
     *
     * @param string $member_profile_picture_path
     * @return  void
     */
    public function setMemberProfilePicturePath(Mixed $member_profile_picture_path): Void
    {
        if (is_string($member_profile_picture_path)) {
            if (!strlen($member_profile_picture_path) >= 5 && !strlen($member_profile_picture_path) <= 255) {
                $this->errors[] = self::INVALID_MEMBER_PROFILE_PICTURE_PATH;
            }
        }

        $this->member_profile_picture_path = $member_profile_picture_path;
    }

    /**
     * Définir la valeur de member_pseudonym
     *
     * @param string $member_pseudonym
     * @return  void
     */
    public function setMemberPseudonym(String $member_pseudonym): Void
    {
        if (!strlen($member_pseudonym) >= 3 && !strlen($member_pseudonym) <= 50) {
            $this->errors[] = self::INVALID_MEMBER_PSEUDONYM;
        }

        $this->member_pseudonym = $member_pseudonym;
    }

    /**
     * Définir la valeur de member_youtube_page_url
     *
     * @param string $member_youtube_page_url
     * @return  void
     */
    public function setMemberYoutubePageUrl(String $member_youtube_page_url): Void
    {
        if (!strlen($member_youtube_page_url) >= 25 && !strlen($member_youtube_page_url) <= 255) {
            $this->errors[] = self::INVALID_MEMBER_YOUTUBE_PAGE;
        }

        $this->member_youtube_page_url = $member_youtube_page_url;
    }

    /**
     * Définir la valeur de member_zip_code
     *
     * @param int $member_zip_code
     * @return  void
     */
    public function setMemberZipCode(Int $member_zip_code): Void
    {
        strlen($member_zip_code) !== 5  ? $this->errors[] = self::INVALID_MEMBER_ZIP_CODE : $this->member_zip_code = $member_zip_code;
    }

    /**
     * Définir la valeur de member_password
     *
     * @param string $member_password
     * 
     * @return void
     */
    public function setMemberPassword(String $member_password): Void
    {
        if (!strlen($member_password) >= 3 && !strlen($member_password) <= 50) {
            $this->errors[] = self::INVALID_MEMBER_PASSWORD;
        }

        $this->member_password = $member_password;
    }

    /**
     * Définir la valeur de member_admin
     *
     * @param bool $member_admin
     * 
     * @return void
     */
    public function setMemberAdmin(Bool $member_admin): Void
    {
        if (!is_bool($member_admin)) {
            $this->errors[] = self::INVALID_MEMBER_ADMIN;
        }

        $this->member_admin = $member_admin;
    }


    /**
     * Définir la valeur de member_registration_date
     *
     * @param mixed $member_registration_date
     * @return  void
     */
    public function setMemberRegistrationDate(Mixed $member_registration_date): Void
    {
        $this->member_registration_date = $member_registration_date;
    }
}
