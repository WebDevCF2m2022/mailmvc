<?php

if(isset($_POST['messagesmail'],$_POST['messagestext'])){
$user = filter_var(trim($_POST['messagesmail']),FILTER_VALIDATE_EMAIL);
$pwd = htmlspecialchars(strip_tags(trim($_POST['messagestext'])),ENT_QUOTES);


$connect = connectUsers($PDOConnect,$user,$pwd);

if(is_string($connect)){
$message = $connect;
}else{
header("Location: ./");
exit();
}

}

require_once "../view/publicView.php";