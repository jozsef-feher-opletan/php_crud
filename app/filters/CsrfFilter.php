<?php
require_once '../app/helpers/csrf.php';

class CsrfFilter
{
    public static function handle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';

            if (!CSRF::validateToken($token)) {
                http_response_code(403);
                die('CSRF token validation failed.');
            }
        }
    }
}