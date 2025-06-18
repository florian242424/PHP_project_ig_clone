<?php

namespace instagram_clone\models;

use instagram_clone\DB;

if (!class_exists('instagram_clone\models\User')) {
    class User
    {
        public static function findByUsername($username)
        {
            $stmt = DB::prepare('SELECT * FROM users WHERE username=?');
            $stmt->execute([$username]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public static function findById($id)
        {
            $stmt = DB::prepare('SELECT * FROM users WHERE id=?');
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public static function create($username, $email, $password)
        {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = DB::prepare('INSERT INTO users (username, email, password_hash, created_at) VALUES (?, ?, ?, NOW())');
            $stmt->execute([$username, $email, $hash]);
            return DB::getConnection()->lastInsertId();
        }
    }
}
