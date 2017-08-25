<?php

class Auth {

    public static function handleLogin() {
        @session_start();
        $logged = $_SESSION['loggedIn'];
        if ($logged == false) {
            session_destroy();
            header('location: ../login');
            exit;
        }
    }

    public static function securityLevel() {
        @session_start();
        $logged = $_SESSION['loggedIn'];
        if ($logged == true) {
            if ($_SESSION['tipoUsuario'] >= 1) {
                session_destroy();
                header('location: ../login');
                exit;
            }
        }
    }

}

?>
