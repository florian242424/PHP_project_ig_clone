<?php
session_start();
require_once 'config.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/PostController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/LikeController.php';
// Simple router
$page = $_GET['page'] ?? 'feed';
$action = $_REQUEST['action'] ?? $page;
$controllerMap = [
    'feed' => 'PostController',
    'login' => 'AuthController',
    'register' => 'AuthController',
    'logout' => 'AuthController',
    'upload' => 'PostController',
    'profile' => 'UserController',
    'like' => 'LikeController'
];
$actionMap = [
    'feed' => 'feed',
    'login' => 'showLogin',
    'register' => 'showRegister',
    'logout' => 'logout',
    'authenticate' => 'login',
    'registerUser' => 'register',
    'upload' => 'upload',
    'profile' => 'profile',
    'follow' => 'follow',
    'unfollow' => 'unfollow',
    'like' => 'like'
];
if (!isset($controllerMap[$action])) {
    header('Location: index.php');
    exit;
}
$controllerName = $controllerMap[$action];
$method = $actionMap[$action];
$controller = new $controllerName();
$controller->$method();
