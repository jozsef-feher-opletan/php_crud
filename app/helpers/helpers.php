<?php
function base_url(string $path = ''): string {
    // Get the base path dynamically
    $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

    // Concatenate base path and requested path
    return $basePath . '/' . ltrim($path, '/');
}
?>