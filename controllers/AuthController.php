<?php

namespace instagram_clone\controllers;

use instagram_clone\models\User;

require 'models/User.php';

class AuthController
{
    public function showLogin()
    {
        include 'views/auth/login.php';
    }

    public function showRegister()
    {
        include 'views/auth/register.php';
    }

    public function login()
    {
        $user = User::findByUsername($_POST['username']);
        if ($user && password_verify($_POST['password'], $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid credentials';
            include 'views/auth/login.php';
        }
    }

    public function register()
    {
        if ($_POST['password'] !== $_POST['password_confirm']) {
            $error = 'Passwords do not match';
            include 'views/auth/register.php';
            return;
        }
        if (User::findByUsername($_POST['username'])) {
            $error = 'Username exists';
            include 'views/auth/register.php';
            return;
        }
        $id = User::create($_POST['username'], $_POST['email'], $_POST['password']);
        $_SESSION['user_id'] = $id;
        header('Location: index.php');
        exit;
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
