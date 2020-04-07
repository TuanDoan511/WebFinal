<?php
    require_once ("config.php");
    require_once ("functions.php");

    $support_controller = array(
        "login" => array("index", "login", "logout", "error"),
        "home" => array("index", "error"),
        "register" => array("index", "register"),
    );

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        switch ($_POST["type"]) {
            case "login_form":
                $controller = "login";
                $action = "login";
                break;
            case "register_form":
                $controller = "register";
                $action = "register";
                break;
        }
    }
    else if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
        if (isset($_GET['action'])) {
            $action = $_GET["action"];
        }
    }
    else {
        $controller = "home";
        $action = "index";
    }

    if (!array_key_exists($controller, $support_controller) || !in_array($action, $support_controller[$controller])) {
        $controller = "home";
        $action = "error";
    }

    include_once("controllers/" . $controller . "_controller.php");
    $className = ucfirst($controller)."Controller";

    $obj = new $className();
    $obj->$action();