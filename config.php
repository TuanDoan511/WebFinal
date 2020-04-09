<?php
    define("TOKEN_HEADER", "Token");
    define("HOST", "localhost");
    define("DB_NAME", "Final");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");

    class DB {
        public static $DB;

        static function connectDB() {
            self::$DB = new PDO("mysql:host=" . HOST . "; dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            self::$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }


        static function getDB() {
            if (self::$DB == null) {
                DB::connectDB();
            }
            return self::$DB;
        }
    }