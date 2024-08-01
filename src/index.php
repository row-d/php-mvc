<?php
require_once 'config.php';
require_once UTILS_DIR . '/render_page.php';

// api
if (preg_match('/^\/api\/.*/', $route)) {
    header('Content-Type: application/json');
    require_once __DIR__ . '/api.php';
    exit;
}

// frontend 
render_page(match ($route) {
    '/' => PAGES_DIR . '/index.php',
    default => PAGES_DIR . '/404.php',
});