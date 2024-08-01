<?php
require_once 'config.php';
require_once UTILS_DIR . '/render_page.php';

$route = strtok($_SERVER["REQUEST_URI"], '?');

// api
if (preg_match('/^\/api\/.*/', $route)) {
    header('Content-Type: application/json');
    require_once API_DIR . '/api.php';
    exit;
}

// frontend 
render_page(match ($route) {
    '/' => PAGES_DIR . '/index.php',
    default => PAGES_DIR . '/404.php'
});