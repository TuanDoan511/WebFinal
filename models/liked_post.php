<?php
    require_once ("config.php");
    class liked_post {
        public $id;
        public $path;
        public $owner;
        
        function __construct($id, $path, $owner) {
            $this->id = $id;
            $this->path = $path;
            $this->owner = $owner;
        }

        static function getAllPost($owner){
            $db = DB::getDB();
            $sql = "SELECT * FROM Like_item WHERE owner='$owner'";
            $stm = $db->query($sql);
            $list = array();
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $item) {
                $list[] = new liked_post($item['id'], $item['file_des'], $item['owner']);
            }
            return $list;
        }

        static function getPost($path, $owner){
            $db = DB::getDB();
            $sql = "SELECT * FROM Like_item WHERE file_des='$path' AND owner='$owner'";
            $stm = $db->query($sql);
            $post = null;
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $item) {
                $post = new liked_post($item['id'], $item['file_des'], $item['owner']);
                break;
            }
            return $post;
        }

        static function deletePost($path, $owner) {
            if (self::getPost($path, $owner) != null) {
                $db = DB::getDB();
                $sql = "DELETE FROM Like_item WHERE file_des='$path' AND owner='$owner'";
                $stm = $db->query($sql);
                if ($stm == true) {
                    return;
                }
            }
            return null;
        }

        static function addPost($path, $owner){
            if (self::getPost($path, $owner) == null){
                $db = DB::getDB();
                $sql = "INSERT INTO Like_item (file_des ,owner) VALUES ('$path', '$owner')";
                $stm = $db->query($sql);
                if ($stm == true) {
                    return;
                }
            }
            return null;
        }
    }
?>