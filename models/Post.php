<?php

namespace instagram_clone\models;

use instagram_clone\DB;

require 'config.php';

class Post
{
    public static function create($userId, $imagePath, $caption)
    {
        $stmt = DB::prepare('INSERT INTO posts (user_id, image_path, caption, created_at) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$userId, $imagePath, $caption]);
    }

    public static function getAll()
    {
        $stmt = DB::prepare('SELECT p.*, u.username FROM posts p JOIN users u ON p.user_id=u.id ORDER BY p.created_at DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByUserId($userId)
    {
        $stmt = DB::prepare('SELECT * FROM posts WHERE user_id=? ORDER BY created_at DESC');
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
