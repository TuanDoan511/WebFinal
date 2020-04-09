<?php

    function password_hashing($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    function token_generate($key) {
        return;
    }

    function redirect($controller, $action) {
        header("Location: http://" . HOST . "/Final/?controller=$controller&action=$action");
    }

    function token_verify() {
        //check if token exist
        if (isset($_COOKIE[TOKEN_HEADER])) {
            $token = _COOKIE[TOKEN_HEADER];
            $username = null;
            if ($username != null) {
                return $username;
            }
        }
        //
        redirect("login", "index");
        return null;
    }