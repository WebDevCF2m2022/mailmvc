<?php

/**
 * Connexion de l'utilisateur à l'administration
 * @param PDO $c
 * @param string $login
 * @param string $pwd
 * @return bool|string
 */
function connectUsers(PDO $c, string $login, string $pwd): bool|string
{
    $sql = "SELECT * FROM users WHERE usersname = ?";
    $query = $c->prepare($sql);
    try {
        $query->execute([$login]);
    } catch (Exception $e) {
        return $e->getMessage();
    }
    if ($query->rowCount() === 1) {
        $response = $query->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pwd, $response['userspwd'])) {
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