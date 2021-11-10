<?php

namespace Model;

use \DateTime;
use \Entity\Member;
use \PDO;

/**
 * MemberManagerPDO
 */
class MemberManagerPDO extends MemberManager
{
    protected function add(Member $member): Void
    {
        $request = $this->dao->prepare(
            'INSERT INTO blog."member"(member_pseudonym, member_email_address, member_firstname, member_lastname, member_profile_picture_path, 
            member_home_address, member_zip_code, member_city_name_fr_fr, member_country_name_fr_fr, member_bio_fr_fr, member_date_of_birth, member_gender,
            member_phone_number, member_facebook_page_url, member_instagram_page_url, member_youtube_page_url, member_password) 
            VALUES(:member_pseudonym, :member_email_address, :member_firstname, :member_lastname, :member_profile_picture_path, :member_home_address,
            :member_zip_code, :member_city_name_fr_fr, :member_country_name_fr_fr, :member_bio_fr_fr, :member_date_of_birth, :member_gender, :member_phone_number,
            :member_facebook_page_url, :member_instagram_page_url, :member_youtube_page_url, :member_password)'
        );

        $request->bindValue(':member_pseudonym', $member->memberPseudonym(), PDO::PARAM_STR);
        $request->bindValue(':member_email_address', $member->memberEmailAddress(), PDO::PARAM_STR);
        $request->bindValue(':member_firstname', $member->memberFirstName(), PDO::PARAM_STR);
        $request->bindValue(':member_lastname', $member->memberLastName(), PDO::PARAM_STR);
        $request->bindValue(':member_profile_picture_path', $member->memberProfilePicturePath(), PDO::PARAM_STR);
        $request->bindValue(':member_home_address', $member->memberHomeAddress(), PDO::PARAM_STR);
        $request->bindValue(':member_zip_code', $member->memberZipCode(), PDO::PARAM_INT);
        $request->bindValue(':member_city_name_fr_fr', $member->memberCityNameFrFr(), PDO::PARAM_STR);
        $request->bindValue(':member_country_name_fr_fr', $member->memberCountryNameFrFr(), PDO::PARAM_STR);
        $request->bindValue(':member_bio_fr_fr', $member->memberBioFrFr(), PDO::PARAM_STR);
        $request->bindValue(':member_date_of_birth', $member->memberDateOfBirth(), PDO::PARAM_STR);
        $request->bindValue(':member_gender', $member->memberGender(), PDO::PARAM_STR);
        $request->bindValue(':member_phone_number', $member->memberPhoneNumber(), PDO::PARAM_INT);
        $request->bindValue(':member_facebook_page_url', $member->memberFacebookPageUrl(), PDO::PARAM_STR);
        $request->bindValue(':member_instagram_page_url', $member->memberInstagramPageUrl(), PDO::PARAM_STR);
        $request->bindValue(':member_youtube_page_url', $member->memberYoutubePageUrl(), PDO::PARAM_STR);
        $request->bindValue(':member_password', password_hash($member->memberPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);

        $request->execute();

        $member->setId($this->dao->lastInsertId());
    }

    public function getList(Int $start = -1, Int $limit = -1): array
    {
        $sql = 'SELECT id, member_pseudonym, member_email_address, member_firstname, member_lastname, member_profile_picture_path, 
        member_home_address, member_zip_code, member_city_name_fr_fr, member_country_name_fr_fr, member_bio_fr_fr, member_date_of_birth, member_gender,
        member_phone_number, member_facebook_page_url, member_instagram_page_url, member_youtube_page_url, member_password
        FROM blog."member" 
        ORDER BY id ASC';

        if ($start != -1 || $limit != -1) {
            $sql .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->query($sql);

        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entity\Member');
        $member_list = $request->fetchAll();

        foreach ($member_list as $member) {
            $member->setMemberDateOfBirth(new DateTime($member->memberDateOfBirth()));
        }

        return $member_list;
    }

    public function getUnique(Mixed $info, String $field = null): ?Member
    {
        $sql = 'SELECT id, member_pseudonym, member_email_address, member_firstname, member_lastname, member_profile_picture_path, 
        member_home_address, member_zip_code, member_city_name_fr_fr, member_country_name_fr_fr, member_bio_fr_fr, member_date_of_birth, member_gender,
        member_phone_number, member_facebook_page_url, member_instagram_page_url, member_youtube_page_url, member_password
        FROM blog."member"';

        if (is_int($info)) {
            $sql .= ' WHERE id = :id';

            $request = $this->dao->prepare($sql);
            $request->bindValue(':id', (int) $info, PDO::PARAM_INT);
        } else if ($field === null) {
            $sql .= ' WHERE member_pseudonym = :member_pseudonym';

            $request = $this->dao->prepare($sql);
            $request->bindValue(':member_pseudonym', (string) $info, PDO::PARAM_STR);
        } else {
            $sql .= ' WHERE ' . $field . ' = :' . $field;

            $request = $this->dao->prepare($sql);
            $request->bindValue(':' . $field, (string) $info, PDO::PARAM_STR);
        }

        $request->execute();

        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Member');

        if ($member = $request->fetch()) {
            $member->setMemberDateOfBirth(new DateTime($member->memberDateOfBirth()));

            return $member;
        }

        return null;
    }

    public function count(): Int
    {
        return $this->dao->query('SELECT COUNT(*) FROM blog."member"')->fetchColumn();
    }

    protected function modify(Member $member): Void
    {
        $request = $this->dao->prepare(
            'UPDATE blog."member" 
            SET member_pseudonym = :member_pseudonym, member_email_address = :member_email_address, member_firstname = :member_firstname, 
            member_lastname = :member_lastname, member_profile_picture_path = :member_profile_picture_path, member_home_address = :member_home_address, 
            member_zip_code = :member_zip_code, member_city_name_fr_fr = :member_city_name_fr_fr, member_country_name_fr_fr = :member_country_name_fr_fr, 
            member_bio_fr_fr = :member_bio_fr_fr, member_date_of_birth = :member_date_of_birth, member_gender = :member_gender, member_phone_number = :member_phone_number, 
            member_facebook_page_url = :member_facebook_page_url, member_instagram_page_url = :member_instagram_page_url , member_youtube_page_url = :member_youtube_page_url,
            member_password = :member_password
            WHERE id = :id'
        );

        $request->bindValue(':member_pseudonym', $member->memberPseudonym(), PDO::PARAM_STR);
        $request->bindValue(':member_email_address', $member->memberEmailAddress(), PDO::PARAM_STR);
        $request->bindValue(':member_firstname', $member->memberFirstName(), PDO::PARAM_STR);
        $request->bindValue(':member_lastname', $member->memberLastName(), PDO::PARAM_STR);
        $request->bindValue(':member_profile_picture_path', $member->memberProfilePicturePath(), PDO::PARAM_STR);
        $request->bindValue(':member_home_address', $member->memberHomeAddress(), PDO::PARAM_STR);
        $request->bindValue(':member_zip_code', $member->memberZipCode(), PDO::PARAM_INT);
        $request->bindValue(':member_city_name_fr_fr', $member->memberCityNameFrFr(), PDO::PARAM_STR);
        $request->bindValue(':member_country_name_fr_fr', $member->memberCountryNameFrFr(), PDO::PARAM_STR);
        $request->bindValue(':member_bio_fr_fr', $member->memberBioFrFr(), PDO::PARAM_STR);
        $request->bindValue(':member_date_of_birth', $member->memberDateOfBirth(), PDO::PARAM_STR);
        $request->bindValue(':member_gender', $member->memberGender(), PDO::PARAM_STR);
        $request->bindValue(':member_phone_number', $member->memberPhoneNumber(), PDO::PARAM_INT);
        $request->bindValue(':member_facebook_page_url', $member->memberFacebookPageUrl(), PDO::PARAM_STR);
        $request->bindValue(':member_instagram_page_url', $member->memberInstagramPageUrl(), PDO::PARAM_STR);
        $request->bindValue(':member_youtube_page_url', $member->memberYoutubePageUrl(), PDO::PARAM_STR);
        $request->bindValue(':member_password', $member->memberPassword(), PDO::PARAM_STR);
        $request->bindValue(':id', $member->id(), PDO::PARAM_INT);

        $request->execute();
    }

    public function delete(Int $id): Void
    {
        $this->dao->exec('DELETE FROM blog."member" WHERE id = ' . (int) $id);
    }
}
