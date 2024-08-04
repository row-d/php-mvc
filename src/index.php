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
    '/' => [PAGES_DIR . '/index.php', ['title' => 'Home']],
    '/signup' => [PAGES_DIR . '/signup.php', ['title' => 'Sign up']],
    '/login' => [PAGES_DIR . '/login.php', ['title' => 'Sign in']],
    default => [PAGES_DIR . '/404.php', ['title' => 'Page not found']],
});