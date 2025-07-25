<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error logging setup
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/error.log');
error_reporting(E_ALL);
ini_set('display_errors', 0); // Disable on production to avoid exposing details

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/helpers/helpers.php';
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../app/helpers/csrf.php';
require_once __DIR__ . '/../app/filters/CsrfFilter.php';
require '../config/database.php';

CSRF::start();
CsrfFilter::handle();

use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\CommentController;


$scriptName = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove base path from URI
if (strpos($requestUri, $scriptName) === 0) {
    $uri = substr($requestUri, strlen($scriptName));
} else {
    $uri = $requestUri;
}

$uri = rtrim($uri, '/') ?: '/'; // normalize

$method = $_SERVER['REQUEST_METHOD'];

$user_controller = new UserController($pdo);
$post_controller = new PostController($pdo);
$comment_controller = new CommentController($pdo);


// === ROUTES ===
try {

    // Home
    if ($uri === '/' && $method === 'GET') {
        echo '
        <div style="text-align: center; margin-top: 12px;">
            <div style="margin: 10px;">
                <a href="' . base_url("users") . '" class="button-link">User List</a>
            </div>
            <div style="margin: 10px;">
                <a href="' . base_url("posts") . '" class="button-link">Post List</a>
            </div>
            <div style="margin: 10px;">
                <a href="' . base_url("comments") . '" class="button-link">Comment List</a>
            </div>
        </div>';

    // === User routes ===
    } elseif ($uri === '/users' && $method === 'GET') {
        $user_controller->index();
    } elseif ($uri === '/users/create' && $method === 'GET') {
        $user_controller->create();
    } elseif ($uri === '/users' && $method === 'POST') {
        $user_controller->store();
    } elseif (preg_match('#^/users/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
        $user_controller->edit($matches[1]);
    } elseif (preg_match('#^/users/(\d+)$#', $uri, $matches) && $method === 'POST') {
        $user_controller->update($matches[1]);
    } elseif (preg_match('#^/users/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
        $user_controller->delete($matches[1]);

    // === Post routes ===
    } elseif ($uri === '/posts' && $method === 'GET') {
        $post_controller->index();
    } elseif ($uri === '/posts/create' && $method === 'GET') {
        $post_controller->create();
    } elseif ($uri === '/posts' && $method === 'POST') {
        $post_controller->store();
    } elseif (preg_match('#^/posts/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
        $post_controller->edit($matches[1]);
    } elseif (preg_match('#^/posts/(\d+)$#', $uri, $matches) && $method === 'POST') {
        $post_controller->update($matches[1]);
    } elseif (preg_match('#^/posts/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
        $post_controller->delete($matches[1]);

    // === Comment routes ===
    } elseif ($uri === '/comments' && $method === 'GET') {
        $comment_controller->index();
    } elseif ($uri === '/comments/create' && $method === 'GET') {
        $comment_controller->create();
    } elseif ($uri === '/comments' && $method === 'POST') {
        $comment_controller->store();
    } elseif (preg_match('#^/comments/(\d+)/edit$#', $uri, $matches) && $method === 'GET') {
        $comment_controller->edit($matches[1]);
    } elseif (preg_match('#^/comments/(\d+)$#', $uri, $matches) && $method === 'POST') {
        $comment_controller->update($matches[1]);
    } elseif (preg_match('#^/comments/(\d+)/delete$#', $uri, $matches) && $method === 'POST') {
        $comment_controller->delete($matches[1]);

    // === 404 ===
    } else {
        http_response_code(404);
        echo "Error: 404 Not Found";
    }

} catch (Throwable $e) {
    http_response_code(500);
    echo "An internal server error occurred." . $e->getMessage();
    // or load a 500 template
}

require_once __DIR__ . '/../templates/footer.php';
?>
