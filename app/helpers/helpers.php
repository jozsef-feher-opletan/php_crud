<?php
function base_url(string $path = ''): string {
    // Get the base path dynamically
    $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

    if ($path === '') {
        return $basePath ?: '/'; // fallback to '/' if empty
    }

    // Concatenate base path and requested path
    return $basePath . '/' . ltrim($path, '/');
}
?>