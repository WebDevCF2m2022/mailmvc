<?php

/**
 * fonction pour envoyer des mails
 * @param string $mailfrom
 * @param string $mailto
 * @param string $subject
 * @param string $message
 * @return bool
 */
function sendMail(string $mailfrom, string $mailto, string $subject, string $message): bool {


    // création des entêtes
    $headers = array(
        'From' => $mailfrom,
        'Reply-To' => $mailfrom,
        'X-Mailer' => 'PHP/' . phpversion()
    );

    // envoi réel du mail
    $envoi = @mail($mailto, $subject, $message, $headers);
    // mail envoyé
    if($envoi){
        // message de réussite de l'envoi
        return true;
    }else {
        // problème de la fonction mail, erreur personnalisée
        return false;
    }
}