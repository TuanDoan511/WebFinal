<?php
require_once ("models/user.php");
require_once ("functions.php");

class RegisterController {

    function __construct()
    {
        if (isset($_COOKIE[TOKEN_HEADER])) {
            redirect("home", "index");
        }
    }

    function index($register_alert="", $username="", $email="",$phone ="", $firstName="", $lastName="") {
        $register_alert;
        $username;
        $email;
        $phone;
        $firstName;
        $lastName;
        require_once ("views/register/index.php");
    }

    function register() {
        //processing register
        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["firstName"]) && isset($_POST["lastName"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $firstName = $_POST["lastName"];
            $lastName = $_POST["firstName"];
            $rootDir = "Final/user_files" . "/" . $username;

            if ($username == "" || $password == "" || $email == "" || $phone == "" || $firstName == "" || $lastName == "") {
                $register_alert = "* fields must not empty";
                $this->index($register_alert, $username, $email, $phone, $firstName, $lastName);
            }

            $user = user::addUser($username, $password, $email, $phone, $firstName, $lastName, $rootDir);
            if ($user == null) {
                $register_alert = "Username already exist";
                $this->index($register_alert, $username, $email, $phone, $firstName, $lastName);
            }
            else {

                $dir = $_SERVER["DOCUMENT_ROOT"] . "/" . $rootDir;
                if (!file_exists($_SERVER["DOCUMENT_ROOT"] . '/' . "Final/user_files")) {
                    mkdir($_SERVER["DOCUMENT_ROOT"] . '/' . "Final/user_files", 0777, true);
                }
                if (!file_exists($dir)) {
                    print_r($dir);
                    mkdir($dir, 0777, true);
                    mkdir($dir . "/" . "My Drive", 0777, true);
                    mkdir($dir . "/" . "Share With Me", 0777, true);
                }

                //set token and navigate to home page when user are successfully created
                token_generate($username);
                redirect("home", "index");
            }

        }
    }
}