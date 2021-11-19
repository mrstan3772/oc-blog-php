<?php

namespace Model;

use \Entity\Contact;
use \SamplePHPFramework\Manager;

/**
 * ContactManager
 */
abstract class ContactManager extends Manager
{
    /**
     * Méthode permettant de vérifier la validité des champs du formulaire de contact.
     * 
     * @param $contact Contact Contact à vérifier.
     * @return bool
     */
    public function sendMail(Contact $contact): ?Bool
    {
        if ($contact->isValid()) {
            $content = '<html><head><title>BLOG LOUIS JEAN STANLEY</title></head><body>';
            $content .= '<p>Bonjour, vous avez reçu un message de <strong>' . $contact->contactFirstName() . ' ' . $contact->contactLastName() . '</strong>.</p>';
            $content .= '<p><strong>Email</strong>: ' . $contact->contactEmail() . '</p>';
            $content .= '<p><strong>Message</strong>: ' . $contact->contactMessage() . '</p>';
            $content .= '</body></html>';

            $mail = $this->pmm;

            $mail->Subject = $contact->contactSubject();
            $mail->Body    = $content;

            $mail->CharSet = 'UTF-8';

            $mail->send();

            return true;
        } else {
            throw new \RuntimeException('Le message doit être valide pour être envoyé.');
        }
    }
}
