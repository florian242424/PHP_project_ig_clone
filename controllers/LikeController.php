<?php

namespace instagram_clone\controllers;

use instagram_clone\models\Like;

require 'models/Like.php';

class LikeController
{
    public function like()
    {
        header('Content-Type: application/json');
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false]);
            exit;
        }
        $postId = $_POST['post_id'];
        $liked = Like::toggle($_SESSION['user_id'], $postId);
        $count = Like::countByPost($postId);
        echo json_encode(['success' => true, 'liked' => $liked, 'count' => $count]);
    }
}
