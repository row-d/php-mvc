<?php
$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

define('LOG_DIR', '/logs');

set_exception_handler(function ($throwable) {
    global $content;
    $logFile = __DIR__ . LOG_DIR . '/error.log';
    $message = date('Y-m-d H:i:s') . ' - Error: ' . $throwable->getMessage() . ' in ' . $throwable->getFile() . ' on line ' . $throwable->getLine() . PHP_EOL;
    file_put_contents($logFile, $message, FILE_APPEND);
    $content = "An unexpected error occurred. Please check the logs for more information." . PHP_EOL;
});

// api
if (preg_match('/^\/api\/.*/', $route)) {
    header('Content-Type: application/json');
    require_once __DIR__ . '/api.php';
    exit;
}
// views 
require __DIR__ . '/views/_layout.php';
ob_start();
$content = ob_get_clean();
match ($route) {
    '/', '' => require __DIR__ . '/views/home.php',
    default => require __DIR__ . '/views/404.php',
};
