<?php
require_once ("models/user.php");
require_once ("functions.php");

class ProfileController{

    public $username;

    function __construct()
    {
        $this->username = token_verify();
    }

    function index($alert="")
    {
        $user = $this->username;
        $alert = $alert;
        require_once("views/profile/index.php");
    }

    function change_password()
    {
        $old_password = $_POST["old_password"];
        $new_password = $_POST["new_password"];
        $confirm_password = $_POST["confirm_password"];

        if ($old_password == "" || $new_password == "" || $confirm_password == ""){
            return $this->index("Password not change: * field must not empty");
        }
        elseif (!password_verify($old_password, $this->username->password)){
            return $this->index("Password not change: Old password is wrong");
        }
        elseif ($new_password != $confirm_password){
            return $this->index("Password not change: Password and confirm password does not match");
        }

        user::updateUser($this->username->username, $new_password);
        return $this->index("Update password successfully");
    }

    function change_info()
    {
        $first_name = $_POST["first-name"];
        $last_name = $_POST["last-name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        if ($first_name == "" || $last_name == "" || $email == "" || $phone == ""){
            $this->index("Profile not change: * field must not empty");
        }

        user::updateUser($this->username->username, null, $first_name, $last_name, $email, $phone);
        $this->username = token_verify();
        return $this->index("Update profile successfully");
    }
}