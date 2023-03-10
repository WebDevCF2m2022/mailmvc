<?php
# mailmvc\controller\publicController.php

# Librairies for Mailer
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

// création des variables pour l'envoi de mail
$transport = Transport::fromDsn(DNS_MAILER);
$mailer = new Mailer($transport);

// on veut se connecter
if (isset($_POST['username'], $_POST['password'])) {
    $user = htmlspecialchars(strip_tags(trim($_POST['username'])), ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($_POST['password'])), ENT_QUOTES);

    $connect = connectUsers($PDOConnect, $user, $pwd);

    if (is_string($connect)) {
        $message = $connect;
    } else {
        header("Location: ./");
        exit();
    }
}

// on veut envoyer un message
if (isset($_POST['messagesmail'], $_POST['messagestext'])) {
    $mail = filter_var(trim($_POST['messagesmail']), FILTER_VALIDATE_EMAIL);
    $messageDB = htmlspecialchars(strip_tags(trim($_POST['messagestext'])), ENT_QUOTES);
    $messageMail = strip_tags(trim($_POST['messagestext']));

    if ($mail == false || empty($messageDB)) {
        $message = "Mail et/ou message non valides, veuillez recommencer !";
    } else {
        $insert = insertMessages($PDOConnect, $mail, $messageDB);
        if (is_string($insert)) {
            $message = $insert;
        } else {
            $email = (new Email())
                ->from(MAIL_FROM)
                ->to(MAIL_ADMIN)
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Un nouveau message est arrivé sur votre site !')
                ->text('Un nouveau message est arrivé sur votre site !\r\n \r\n Posté par ' . $mail)
                ->html('<p>Un nouveau message est arrivé sur votre site !<br><br>Posté par ' . $mail . '</p>');

            $envoi = $mailer->send($email);

            $email = (new Email())
                ->from(MAIL_FROM)
                ->to($mail)
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Votre message a bien été posté !')
                ->text('Votre message a bien été posté !\r\n \r\n sur le site https://mailmvc.webdev-cf2m.be/')
                ->html('<p>Votre message a bien été posté !<br><br>sur le site  https://mailmvc.webdev-cf2m.be/</p>');


            $message = "Votre message à bien été envoyé!";

            $envoi2 = $mailer->send($email);

            /*
            $message = "Votre message à bien été envoyé!";
            // pour l'admin du site
            $mailMessage = "Mail envoyé par $mail \r\n \r\n " . $messageMail;
            $envoi = sendMail(MAIL_FROM, MAIL_ADMIN, "Message sur votre site", $mailMessage);
            // pour l'utilisateur du site
            $mailMessage = "Votre message a bien été envoyé sur le site http://mailmvc.webdev-cf2m.be/";
            $envoi2 = sendMail(MAIL_FROM, $mail, "Message du site mailmvc.webdev-cf2m.be", $mailMessage);
            if ($envoi === true && $envoi2 == true) {
                $message .= "<br>Félicitation";
            }
            */
        }
    }
}

require_once "../view/publicView.php";
