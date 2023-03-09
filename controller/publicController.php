<?php

if(isset($_POST['username'],$_POST['password'])){
    $user = htmlspecialchars(strip_tags(trim($_POST['username'])),ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($_POST['password'])),ENT_QUOTES);

    $connect = connectUsers($PDOConnect,$user,$pwd);

    if(is_string($connect)){
        $message = $connect;
    }else{
        header("Location: ./");
        exit();
    }

}

require_once "../view/publicView.php";