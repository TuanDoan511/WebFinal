<?php

    function password_hashing($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    function token_generate($username) {
        $secret = json_encode(['secret'=>'this is a secret']);
        $header = json_encode(['typ'=>'JWT']);
        $payload = json_encode(['username'=>$username]);

        $base64Secret = base64_encode($secret);
        $base64Header = base64_encode($header);
        $base64Payload = base64_encode($payload);

        $signature = hash_hmac('sha256', $base64Secret . "." . $base64Header, true);
        $token = $base64Header . "." . $base64Payload . "." . $signature . "=";
        setcookie(TOKEN_HEADER, $token);
    }

    function redirect($controller, $action) {
        header("Location: http://" . HOST . "/Final/?controller=$controller&action=$action");
    }

    function token_verify() {
        //check if token exist
        if (isset($_COOKIE[TOKEN_HEADER])) {
            $token = $_COOKIE[TOKEN_HEADER];
            $tokenParts = explode('.', $token);

            if (sizeof($tokenParts) == 3) {
                $secret = json_encode(['secret'=>'this is a secret']);
                $base64Secret = base64_encode($secret);

                $payload = base64_decode($tokenParts[1]);
                $signatureProvided = str_replace("=", "", $tokenParts[2]);

                $signature = hash_hmac('sha256', $base64Secret . "." . $tokenParts[0], true);

                if ($signature === $signatureProvided) {
                    $payload = json_decode($payload);

                    $username = user::getUser($payload->username);
                    if ($username != null) {
                        return $username;
                    }
                }
            }
        }
        redirect("login", "index");
    }