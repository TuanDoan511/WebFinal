<?php
    require_once ("models/user.php");
    require_once ("functions.php");

    class LoginController {

        function __construct()
        {

        }

        function index($login_alert="", $username="") {
            if (isset($_COOKIE[TOKEN_HEADER])) {
                redirect("home", "index");
            }
            $login_alert;
            $username;
            require_once ("views/login/index.php");
        }

        function login() {
            //processing login
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                if ($username == "" || $password == "") {
                    //invalid username or password
                    $login_alert = "invalid username or password";
                    $this->index($login_alert, $username);
                    return;
                }

                $user = $this->user_verify($username, $password);
                if ($user != null) {
                    //navigate to home page when user are validated
                    redirect("home", "index");
                }

                //invalid username or password
                $login_alert = "invalid username or password";
                $this->index($login_alert, $username);
                return;
            }
            else {
                $this->index();
            }
        }

        function user_verify($username, $password) {
            //validation username and password of user login
            $user = user::getUser($username);
            if ($user != null) {
                //set token and return user if true
                if (password_verify($password, $user->password)) {
                    token_generate($username);
                    return $user;
                }
            }
            return null;
        }
    }