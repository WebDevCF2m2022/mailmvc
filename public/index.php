<?php
# PHP SESSION CONNECT
session_start();

# PHP ini_set mail
ini_set('SMTP', MAIL_SERVER);
ini_set('smtp_port', MAIL_PORT);
ini_set('sendmail_from', MAIL_FROM);

# Dependencies
require_once "../config.php"; # DB
require_once "../model/UsersModel.php"; # table users
require_once "../model/MessagesModel.php"; # table messages
require_once "../model/MailModel.php"; # send mail


# Connexion
try {
    $PDOConnect = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET . ';port=' . DB_PORT, DB_LOGIN, DB_PWD);
} catch (Exception $e) {
    exit($e->getMessage());
}

# Router

// connected
if (isset($_SESSION['myID']) && $_SESSION['myID'] == session_id()) {
    require_once "../controller/privateController.php";

    // public
} else {
    require_once "../controller/publicController.php";
}
