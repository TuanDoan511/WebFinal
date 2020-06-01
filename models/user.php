<?php
    require_once ("config.php");
    class user {
        public $username;
        public $password;
        public $email;
        public $phone;
        public $first_name;
        public $last_name;
        public $rootDir;

        function __construct($username, $password, $email, $phone, $first_name, $last_name, $rootDir)
        {
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->phone = $phone;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->rootDir = $rootDir;
        }

        static function getAllUsers() {
            $db = DB::getDB();
            $sql = "SELECT * FROM Users";
            $stm = $db->query($sql);
            $list = array();
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $item) {
                $list[] = new user($item['username'], $item['password'], $item['email'], $item['phone'], $item['firstName'], $item['lastName'], $item['rootDir']);
            }
            return $list;
        }

        static function getUser($username) {
            $db = DB::getDB();
            $sql = "SELECT * FROM Users WHERE username = '$username'";
            $stm = $db->query($sql);
            $user = null;
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $item) {
                $user = new user($item['username'], $item['password'], $item['email'], $item['phone'], $item['firstName'], $item['lastName'], $item['rootDir']);
                break;
            }
            return $user;
        }

        static function addUser($username, $password, $email, $phone, $first_name, $last_name, $rootDir) {
            if (self::getUser($username) == null){
                $password = password_hashing($password);
                $db = DB::getDB();
                $sql = "INSERT INTO Users (username, password, email, phone, firstName, lastName, rootDir) VALUES ('$username', '$password', '$email', $phone, '$first_name', '$last_name', '$rootDir')";
                $stm = $db->query($sql);
                if ($stm == true) {
                    return new user($username, $password, $email, $phone, $first_name, $last_name, $rootDir);
                }
            }
            return null;
        }

        static function updateUser($username, $password="", $first_name="", $last_name="", $email="", $phone=""){
            $db = DB::getDB();
            if ($password != "")
            {
                $password = password_hashing($password);
                $sql = "UPDATE Users SET password='$password' WHERE username='$username'";
                $stm = $db->query($sql);
            }
            else
            {
                $sql = "UPDATE Users SET firstName='$first_name', lastName='$last_name', email='$email', phone='$phone' WHERE username='$username'";
                $stm = $db->query($sql);
            }
        }
    }