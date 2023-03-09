<?php

if (isset($_GET['disconnect'])) {
    if(disconnectUsers()){
        header("Location: ./");
        exit();
    }
}


$responseMessages = getAllMessages($MysqliConnect);

if(is_string($responseMessages)){
    $message = $responseMessages;
}

require_once "../view/privateView.php";