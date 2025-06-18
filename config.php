<?php

namespace instagram_clone;
if (!class_exists('instagram_clone\DB')) {
    class DB
    {
        private static $instance = null;

        public static function getConnection()
        {
            if (self::$instance === null) {
                self::$instance = new PDO('mysql:host=localhost;dbname=instagram_clone;charset=utf8', 'root', '');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$instance;
        }

        public static function prepare($sql)
        {
            return self::getConnection()->prepare($sql);
        }
    }
}

