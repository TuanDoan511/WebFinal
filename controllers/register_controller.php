<?php
require_once ("models/user.php");
require_once ("functions.php");

class RegisterController {

    function __construct()
    {

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
            $rootDir = "/asset/user_file/" . $username;

            $user = user::addUser($username, $password, $email, $phone, $firstName, $lastName, $rootDir);
            if ($user == null) {
                $register_alert = "Username already exist";
                $this->index($register_alert, $username, $email, $phone, $firstName, $lastName);
            }
            else {
                //set token and navigate to home page when user are successfully created
                redirect("home", "index");
            }

        }
    }
}