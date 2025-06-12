<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/helpers.php';
require '../config/database.php';

use App\Controllers\UserController;

$scriptName = dirname($_SERVER['SCRIPT_NAME']);
$uri = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), strlen($scriptName));

if ($uri === '') {
    $uri = '/';
}
$uri = base_url($uri);

$method = $_SERVER['REQUEST_METHOD'];
$controller = new UserController($pdo);


if ($uri === base_url('/') && $method === 'GET') {
    echo "Welcome to the home page!";
    echo '<a href="' . base_url("users") . '">Users List</a>';
    // Or call a HomeController, or redirect somewhere else
} elseif ($uri === base_url('/users') && $method === 'GET') {
    $controller->index();
} elseif ($uri === base_url('/users/create') && $method === 'GET') {
    $controller->create();
} elseif ($uri === base_url('/users') && $method === 'POST') {
    $controller->store();
} elseif (preg_match('#^' . base_url('') . 'users/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
    $controller->edit($matches[1]);
} elseif (preg_match('#^' . base_url('') . 'users/(\d+)$#', $uri, $matches) && $method === 'POST') {
    $controller->update($matches[1]);
} elseif (preg_match('#^' . base_url('') . 'users/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
    $controller->delete($matches[1]);
} else {
    http_response_code(404);
    echo "404 Not Found";
}