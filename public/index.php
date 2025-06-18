<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/helpers.php';
require_once __DIR__ . '/../templates/header.php';
require '../config/database.php';

use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\CommentController;

$scriptName = dirname($_SERVER['SCRIPT_NAME']);
$uri = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), strlen($scriptName));

if ($uri === '') {
    $uri = '/';
}
$uri = base_url($uri);

$method = $_SERVER['REQUEST_METHOD'];
$user_controller = new UserController($pdo);
$post_controller = new PostController($pdo);
$comment_controller = new CommentController($pdo);


if ($uri === base_url('/') && $method === 'GET') {
    echo "Welcome to the home page!";
    echo '<br><a href="' . base_url("users") . '" class="button-link">Users List</a>';
    echo '<br><a href="' . base_url("posts") . '" class="button-link">Posts List</a>';
    echo '<br><a href="' . base_url("comments") . '" class="button-link">Comments List</a>';

} elseif ($uri === base_url('/users') && $method === 'GET') {
    $user_controller->index();
} elseif ($uri === base_url('/users/create') && $method === 'GET') {
    $user_controller->create();
} elseif ($uri === base_url('/users') && $method === 'POST') {
    $user_controller->store();
} elseif (preg_match('#^' . base_url('') . 'users/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    $user_controller->edit($matches[1]);
} elseif (preg_match('#^' . base_url('') . 'users/(\d+)$#', $uri, $matches) && $method === 'POST') {
    $user_controller->update($matches[1]);
} elseif (preg_match('#^' . base_url('') . 'users/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    $user_controller->delete($matches[1]);

} elseif ($uri === base_url('/posts') && $method === 'GET') {
    $post_controller->index();
} elseif ($uri === base_url('/posts/create') && $method === 'GET') {
    $post_controller->create();
} elseif ($uri === base_url('/posts') && $method === 'POST') {
    $post_controller->store();
} elseif (preg_match('#^' . base_url('') . 'posts/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    $post_controller->edit($matches[1]);
} elseif (preg_match('#^' . base_url('') . 'posts/(\d+)$#', $uri, $matches) && $method === 'POST') {
    $post_controller->update($matches[1]);
} elseif (preg_match('#^' . base_url('') . 'posts/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    $post_controller->delete($matches[1]);

} elseif ($uri === base_url('/comments') && $method === 'GET') {
    $comment_controller->index();
} elseif ($uri === base_url('/comments/create') && $method === 'GET') {
    $comment_controller->create();
} elseif ($uri === base_url('/comments') && $method === 'POST') {
    $comment_controller->store();
} elseif (preg_match('#^' . base_url('') . 'comments/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    $comment_controller->edit($matches[1]);
} elseif (preg_match('#^' . base_url('') . 'comments/(\d+)$#', $uri, $matches) && $method === 'POST') {
    $comment_controller->update($matches[1]);
} elseif (preg_match('#^' . base_url('') . 'comments/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    $comment_controller->delete($matches[1]);

} else {
    http_response_code(404);
    echo "404 Not Found";
}

require_once __DIR__ . '/../templates/footer.php';
?>