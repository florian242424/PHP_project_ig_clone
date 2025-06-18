<?php

namespace instagram_clone\models;

use instagram_clone\DB;

require 'config.php';

class Follow
{
    public static function follow($follower, $followed)
    {
        $stmt = DB::prepare('INSERT IGNORE INTO follows (follower_id, followed_id, since) VALUES (?, ?, NOW())');
        $stmt->execute([$follower, $followed]);
    }

    public static function unfollow($follower, $followed)
    {
        $stmt = DB::prepare('DELETE FROM follows WHERE follower_id=? AND followed_id=?');
        $stmt->execute([$follower, $followed]);
    }

    public static function isFollowing($follower, $followed)
    {
        $stmt = DB::prepare('SELECT 1 FROM follows WHERE follower_id=? AND followed_id=?');
        $stmt->execute([$follower, $followed]);
        return (bool)$stmt->fetch();
    }
}
