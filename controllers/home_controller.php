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

    function index($dir="", $alert="") {
        $user = $this->username;
        if (isset($_GET["dir"])) {
            $dir = "/" . $_GET["dir"];
        }
        if (isset($_GET["alert"])) {
            $alert = $_GET["alert"];
            $alert = "<script type='text/javascript'>alert('$alert');</script>";
        }
        $root = $this->root;
        $dir_path = $root . $dir;
        require_once("views/home/index.php");
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
                redirect("home", "index", array("dir"=>$dir, "alert"=>'File already exist'));
            }
            else
            {
                mkdir($new_folder, 0777, true);
                redirect("home", "index", array("dir"=>$dir));
            }
        }
    }

    function up_load_files() {
        if (!empty($_FILES["myFile"]["name"][0]) && isset($_POST["dir"])) {
            $failed = array();
            $dir = $this->root . "/" . $_POST["dir"];
            $files = $_FILES["myFile"];
            foreach ($files["name"] as $position => $fileName){
                $fileTmp = $files["tmp_name"][$position];
                $fileError = $files["error"][$position];
                $fileExt = explode(".", $fileName);
                $fileExt = end($fileExt);
                if ($fileError === 0) {
                    $upload_dir = $dir . "/" . $fileName;
                    if (!file_exists($upload_dir)){
                        move_uploaded_file($fileTmp, $upload_dir);
                    }
                    else {
                        $failed[$position] = "$fileName has already exists";
                    }
                }
                else{
                    $failed[$position] = "$fileName $fileError";
                }
            }
            if (!empty($failed)) {
                $str_fail = "";
                foreach ($failed as $fail) {
                    if ($fail != "") {
                        $str_fail = $str_fail . $fail . '\n';
                    }
                }
                redirect("home", "index", array("dir"=>$_POST["dir"], "alert"=>$str_fail));
            }
        }
        else{
            $alert = "Upload failed";
            redirect("home", "index", array("dir"=>$_POST["dir"], "alert"=>$alert));
        }
    }
}