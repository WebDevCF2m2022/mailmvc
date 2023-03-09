<?php

if (isset($_GET['disconnect'])) {
    if(disconnectUsers()){
        header("Location: ./");
        exit();
    }
}

if (isset($_POST['messagesmail'], $_POST['messagestext'])) {
    $user = filter_var(trim($_POST['messagesmail']), FILTER_VALIDATE_EMAIL);
    $pwd = htmlspecialchars(strip_tags(trim($_POST['messagestext'])), ENT_QUOTES);


}

require_once "../view/privateView.php";