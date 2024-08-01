<?php

define('LOG_DIR', __DIR__ . '/logs');
define('VIEWS_DIR', __DIR__ . '/views');
define('LAYOUTS_DIR', __DIR__ . '/views/layouts');
define('PAGES_DIR', __DIR__ . '/views/pages');
define('UTILS_DIR', __DIR__ . '/utils');
$route = strtok($_SERVER["REQUEST_URI"], '?');
$method = $_SERVER['REQUEST_METHOD'];

set_exception_handler(function ($throwable) {
  global $content;
  $logFile = LOG_DIR . '/error.log';
  $message = date('Y-m-d H:i:s') . ' - Error: ' . $throwable->getMessage() . ' in ' . $throwable->getFile() . ' on line ' . $throwable->getLine() . PHP_EOL;
  file_put_contents($logFile, $message, FILE_APPEND);
  $content = "An unexpected error occurred. Please check the logs for more information." . PHP_EOL;
});