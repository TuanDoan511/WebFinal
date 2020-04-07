<?php
    require_once ("models/user.php");

    $test =  user::getUser("admin");
    print_r($test['password']);