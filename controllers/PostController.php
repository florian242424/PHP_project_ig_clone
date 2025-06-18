<?php

namespace instagram_clone\controllers;

use instagram_clone\models\Post;

require 'models/Post.php';

class PostController
{
    public function feed()
    {
        $posts = Post::getAll();
        include 'views/feed.php';
    }

    public function upload()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
        if (isset($_FILES['image'])) {
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['image']['tmp_name'], 'public/uploads/' . $filename);
            Post::create($_SESSION['user_id'], $filename, $_POST['caption']);
        }
        header('Location: index.php');
        exit;
    }
}
