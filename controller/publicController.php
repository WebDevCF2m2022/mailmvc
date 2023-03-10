<?php

// on veut se connecter
if(isset($_POST['username'],$_POST['password'])){
    $user = htmlspecialchars(strip_tags(trim($_POST['username'])),ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($_POST['password'])),ENT_QUOTES);

    $connect = connectUsers($MysqliConnect,$user,$pwd);

    if(is_string($connect)){
        $message = $connect;
    }else{
        header("Location: ./");
        exit();
    }
}

// on veut envoyer un message
if(isset($_POST['messagesmail'],$_POST['messagestext'])){
    $mail = filter_var(trim($_POST['messagesmail']),FILTER_VALIDATE_EMAIL);
    $messageDB = htmlspecialchars(strip_tags(trim($_POST['messagestext'])),ENT_QUOTES);
    $messageMail = strip_tags(trim($_POST['messagestext']));

    if($mail==false || empty($messageDB)){
        $message = "Mail et/ou message non valides, veuillez recommencer !";
    }else{
        $insert = insertMessages($MysqliConnect,$mail,$messageDB);
        if(is_string($insert)){
            $message = $insert;
        }else{
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
        }
    }

}

require_once "../view/publicView.php";
