<?php
require_once ("models/user.php");
require_once ("functions.php");
require_once ("models/liked_post.php");

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
        $liked_post = liked_post::getAllPost($user->username);
        foreach ($liked_post as $test){
            $root_liked_post = explode("/", $test->path)[0];
            if ($root_liked_post != "My Drive"){
                unset($liked_post[array_search($test,$liked_post)]);
                continue;
            }
            $test->path = str_replace($root_liked_post . "/", "", $test->path);
        }
        $root = $this->root;
        $dir_path = $root . $dir;
        require_once("views/home/index.php");
    }

    function shared($dir="", $alert="") {
        $user = $this->username;
        if (isset($_GET["dir"])) {
            $dir = "/" . $_GET["dir"];
        }
        if (isset($_GET["alert"])) {
            $alert = $_GET["alert"];
            $alert = "<script type='text/javascript'>alert('$alert');</script>";
        }
        $root = str_replace("/My Drive", "/Share With Me", $this->root);
        $dir_path = $root . $dir;
        require_once("views/home/index.php");
    }

    function note($dir="", $alert=""){
        require_once ("models/liked_post.php");
        $user = $this->username;
        $files = liked_post::getAllPost($user->username);
        require_once("views/note/index.php");
    }

    function create_dir() {
        if (isset($_GET["dir"]) && isset($_GET["new_folder_name"])) {
            $dir = $_GET["dir"];
            if ($_GET["new_folder_name"] == ""){
                redirect("home", "index", array("dir"=>$dir, "alert"=>'Folder name must not empty'));
                return;
            }
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
            else{
                redirect("home", "index", array("dir"=>$_POST["dir"]));
            }
        }
        else{
            $alert = "Upload failed";
            redirect("home", "index", array("dir"=>$_POST["dir"], "alert"=>$alert));
        }
    }

    function remove() {
        $dir = $this->root . '/' . $_POST["data"];
        if (is_dir($dir)) {
            $objects = scandir($dir);

            foreach ($objects as $object)
            {
                if ($object != '.' && $object != '..')
                {
                    if (filetype($dir.'/'.$object) == 'dir') {rmdir($dir.'/'.$object);}
                    else {unlink($dir.'/'.$object);}
                }
            }

            reset($objects);
            rmdir($dir);
        }
        else{
            unlink($dir);
        }
    }

    function like() {
        $path = $_POST["data"];
        $owner = $_POST["owner"];
        $curr_status = $_POST["curr_status"];
        
        if ($curr_status == "unchecked"){
            liked_post::addPost($path, $owner);
        }
        else {
            liked_post::deletePost($path, $owner);
        }
        
    }
}