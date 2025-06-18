<?php

namespace instagram_clone\controllers;

use instagram_clone\models\Follow;
use instagram_clone\models\Post;
use instagram_clone\models\User;

require_once 'models/User.php';
require_once 'models/Post.php';
require_once 'models/Follow.php';

class UserController
{
    public function profile()
    {
        $username = $_GET['user'] ?? null;
        if (!$username) {
            header('Location: index.php');
            exit;
        }
        $user = User::findByUsername($username);
        if (!$user) {
            header('Location: index.php');
            exit;
        }
        $posts = Post::getByUserId($user['id']);
        $isFollowing = isset($_SESSION['user_id']) ? Follow::isFollowing($_SESSION['user_id'], $user['id']) : false;
        include 'views/profile.php';
    }

    public function follow()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
        Follow::follow($_SESSION['user_id'], $_POST['user_id']);
        header('Location: index.php?page=profile&user=' . urlencode($_POST['username']));
        exit;
    }

    public function unfollow()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
        Follow::unfollow($_SESSION['user_id'], $_POST['user_id']);
        header('Location: index.php?page=profile&user=' . urlencode($_POST['username']));
        exit;
    }
}
