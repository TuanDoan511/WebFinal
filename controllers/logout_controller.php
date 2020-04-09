<?php
    class LogoutController {
        public $user;

        function __construct()
        {
            $this->username = token_verify();
        }

        function logout() {
            setcookie(TOKEN_HEADER, "");
            redirect("login", "index");
        }
    }