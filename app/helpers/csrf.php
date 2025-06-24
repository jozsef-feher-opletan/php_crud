<?php

class CSRF
{
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function generateToken()
    {
        self::start();
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function getTokenInputField()
    {
        return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars(self::generateToken()) . '">';
    }

    public static function validateToken($token)
    {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }

    public static function clearToken()
    {
        unset($_SESSION['csrf_token']);
    }
}