<?php

/**
 * Connexion de l'utilisateur à l'administration
 * @param mysqli $c
 * @param string $login
 * @param string $pwd
 * @return bool|string
 */
function connectUsers(mysqli $c, string $login, string $pwd): bool|string
{
    // protections injections mysqli procédural
    $login = mysqli_real_escape_string($c,$login);

    $sql = "SELECT * FROM users WHERE usersname = '$login'";
    # $query = $c->prepare($sql);
    try {
        # $query->execute([$login]);
        $query = mysqli_query($c,$sql);
    } catch (Exception $e) {
        return $e->getMessage();
    }
    #if ($query->rowCount() === 1) {
    if(mysqli_num_rows($query)=== 1){
        $response = mysqli_fetch_assoc($query);
        #$response = $query->fetch(PDO::FETCH_ASSOC);
        // vérification du mot de passe crypté
        if (password_verify($pwd, $response['userspwd'])) {

            // création de la session
            $_SESSION[] = $response;
            unset($_SESSION['userspwd']);
            $_SESSION['myID'] = session_id();
            return true;
        } else {
            return "Login ou mot de passe incorrect 2";
        }
    } else {
        return "Login ou mot de passe incorrect 1";
    }
}

/**
 * déconnexion de l'utilisateur
 * @return bool
 */
function disconnectUsers():bool{
    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
    return true;
}