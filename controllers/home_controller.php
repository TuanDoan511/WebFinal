<?php
require_once ("models/user.php");
require_once ("functions.php");

class HomeController {

    public $username;
    public $root;

    function __construct()
    {
        $this->username = token_verify();
        $this->root = $_SERVER["DOCUMENT_ROOT"] . "/" . $this->username->rootDir . "/My Drive";
    }

    function index($dir="") {
        $user = $this->username;
        if (isset($_GET["dir"])) {
            $dir = "/" . $_GET["dir"];
        }
        $root = $this->root;
        $dir_path = $root . $dir;
        require_once ("views/home/index.php");
    }

    function create_dir() {
        if (isset($_GET["dir"]) && isset($_GET["new_folder_name"])) {
            $dir = $_GET["dir"];
            if ($dir == "") {
                $new_folder = $this->root . "/" . $_GET["new_folder_name"];
            }
            else
            {
                $new_folder = $this->root . "/" . $dir . "/" . $_GET["new_folder_name"];
            }

            if (is_dir($new_folder)) {
                echo "<script type='text/javascript'>alert('File already exist');</script>";
            }
            else
            {
                mkdir($new_folder, 0777, true);
                redirect("home", "index", array("dir"=>$dir));
            }
        }
    }


}