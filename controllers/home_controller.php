<?php
require_once ("models/user.php");
require_once ("functions.php");

class HomeController {

    public $username;

    function __construct()
    {
        $this->username = token_verify();
    }

    function index() {
        $user = $this->username;
        require_once ("views/home/index.php");
    }


}