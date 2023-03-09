<?php

/**
 * fonction qui récupère les messages pour l'administrateur
 * @param PDO $c
 * @return array|string
 */
function getAllMessages(PDO $c): array|string
{
    $sql = "SELECT * FROM messages ORDER BY messagesdate DESC";
    try {
        $query = $c->query($sql);
        if($query->rowCount()==0){
            return "Pas encore de messages";
        }else{
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

    } catch (Exception $e) {
        return $e->getMessage();
    }
}

/**
 * Insertion d'un message dans la DB
 * @param mysqli $c
 * @param string $mail
 * @param string $message
 * @return bool|string
 */
function insertMessages(mysqli $c, string $mail, string $message): bool|string{
    $mail = mysqli_real_escape_string($c,$mail);
    $message = mysqli_real_escape_string($c,$message);
    $sql = "INSERT INTO `messages` (`messagesmail`, `messagestext`) VALUES ('$mail', '$message');";
    #$sql = "INSERT INTO `messages` (`messagesmail`, `messagestext`) VALUES (?, ?);";
    #$query = $c->prepare($sql);
    try {
        mysqli_query($c,$sql);
        #$query->execute([$mail,$message]);
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}