<?php

namespace instagram_clone\models;

use instagram_clone\DB;

require 'config.php';

class Like
{
    public static function toggle($user, $postId)
    {
        $stmt = DB::prepare('SELECT 1 FROM likes WHERE user_id=? AND post_id=?');
        $stmt->execute([$user, $postId]);
        if ($stmt->fetch()) {
            DB::prepare('DELETE FROM likes WHERE user_id=? AND post_id=?')->execute([$user, $postId]);
            return false;
        } else {
            DB::prepare('INSERT INTO likes (user_id, post_id, created_at) VALUES (?, ?, NOW())')->execute([$user, $postId]);
            return true;
        }
    }

    public static function countByPost($postId)
    {
        $stmt = DB::prepare('SELECT COUNT(*) as count FROM likes WHERE post_id=?');
        $stmt->execute([$postId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }
}
