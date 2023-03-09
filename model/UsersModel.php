<?php

/**
 * Connexion de l'utilisateur à l'administration
 * @param PDO $c
 * @param string $login
 * @param string $pwd
 * @return bool|string
 */
function connectUsers(PDO $c, string $login, string $pwd): bool|string{
    $sql = "SELECT * FROM users WHERE username = ?";
    $query = $c->prepare($sql);
    try{
        $query->execute([$login]);
    }catch (Exception $e){
        return $e->getMessage();
    }
    if($query->rowCount()===1){
        $response = $query->fetch(PDO::FETCH_ASSOC);
        if(password_verify($pwd,$response['userpwd'])){
            $_SESSION[]=$response;
            unset($_SESSION['userspwd']);
            $_SESSION['myID'] = session_id();
            return true;
        }else{
            return "Login ou mot de passe incorrect 2";
        }
    }else{
        return "Login ou mot de passe incorrect 1";
    }
}
